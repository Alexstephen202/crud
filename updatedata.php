
<?php
    require_once "conn.php";
    if(isset($_POST["student_name"]) && isset($_POST["e_mail"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["food"]) ){
        $student_name = $_POST['student_name'];
        $E_mail = $_POST['e_mail'];
        $Age = $_POST['age'];
        $Gender = $_POST['gender'];
        $Food = $_POST['food'];

        $image = basename($_FILES["file_upload"]["name"]);
        if (isset($_FILES["file_upload"])) {
           
            $target_dir = "images/"; // Directory where images are stored
            $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
            // Check if the file is an actual image
            $check = getimagesize($_FILES["file_upload"]["tmp_name"]);
            if ($check === false) {
                echo "File is not an image.";
                exit;
            }
      
    
        // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file_upload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["file_upload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
        }
     


        $sql = "UPDATE foods SET `student_name`= '$student_name', `e_mail`= '$E_mail', `age`= '$Age' , `gender`= '$Gender', `food`= '$Food',`file_upload`='$image'  WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: intro.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>


