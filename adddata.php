<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){

       print_r($_POST);

        $student_name = $_POST['student_name'];
        $e_mail = $_POST['e_mail'];
        $age = $_POST['age'];
        $Gender = $_POST['gender'];
        $food = $_POST['food'];
        $file_upload=$_POST['file_upload'];
        $file_upload=$_FILES['file_upload']['name'];

        if(isset($_FILES['file_upload'])){
            $errors= array();
            $file_name = $_FILES['file_upload']['name'];
            $file_size =$_FILES['file_upload']['size'];
            $file_tmp =$_FILES['file_upload']['tmp_name'];
            $file_type=$_FILES['file_upload']['type'];
            $file_ext=strtolower(end(explode('.',$_FILES['file_upload']['name'])));
            
            $extensions= array("jpeg","jpg","png");
            
            if(in_array($file_ext,$extensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
            
            if($file_size > 2097152){
               $errors[]='File size must be excately 2 MB';
            }
            
            if(empty($errors)==true){
               move_uploaded_file($file_tmp,"images/".$file_name);
               
            }else{
               print_r($errors);
            }
         }
$file_upload = $file_name;


        
        if($student_name != "" && $e_mail != "" && $age != "" && $Gender != "" && $food != ""){
            

            $sql = "INSERT INTO foods (student_name, e_mail, age ,gender,food,file_upload) VALUES ('$student_name', '$e_mail', '$age', '$Gender','$food','$file_upload')";
            if (mysqli_query($conn, $sql)) {
                header("location: intro.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        }else{
            echo "studentname,email,age,gender,food and fileupload cannot be empty!";
        }
    }
?>