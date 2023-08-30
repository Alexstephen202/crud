<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if(isset($_POST["student_name"]) && isset($_POST["e_mail"]) && isset($_POST["age"]) && isset($_POST["gender"]) && isset($_POST["food"])){
        $student_name = $_POST['student_name'];
        $E_mail = $_POST['e_mail'];
        $Age = $_POST['age'];
        $Gender = $_POST['gender'];
        $Food = $_POST['food'];
        $sql = "UPDATE foods SET `student_name`= '$student_name', `e_mail`= '$E_mail', `age`= '$Age' , `gender`= '$Gender', `food`= '$Food' WHERE id= ".$_GET["id"];
        if (mysqli_query($conn, $sql)) {
            header("location: intro.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Abel');

body, html {
  color: #fff;
  font-family: 'Abel', sans-serif;
  margin: 0;
  padding: 0;
  background-color: transparent;
}

body {
  font-size: 1.2em;
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(https://wallpapercave.com/wp/Fdh76FQ.jpg) center no-repeat fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -ms-background-size: cover;
  background-size: cover;
}



.text-box {
  background-color: rgba(230, 126, 34,0.8);
  border-radius: 20px;
  margin: 2em auto;
  padding: 20px;
  width: 90%;
}

h1 {
  margin: 0;
  padding: 0;
  font-size: 2.8em;
  color: #fff;
  text-align: center;
  letter-spacing: 2px;
  word-spacing: 5px;
  line-height: 1em;
  font-weight: bold;
}


.container {
  background-color: rgba(22, 160, 133,0.7);
  border-radius: 20px;
  margin: auto;
  width: 90%;
  padding: 1em;
  
}
    </style>

<body>


<header>
  <div class="text-box">
    <h1 id="title">Update the data</h1><hr>
      
  </div>

    <section>
       
        <div class="container">
            <?php 
                require_once "conn.php";
                $sql_query = "SELECT * FROM foods WHERE id = ".$_GET["id"];
                if ($result = $conn ->query($sql_query)) {
                    while ($row = $result -> fetch_assoc()) { 
                        $id = $row['id'];
                        $student_name= $row['student_name'];
                        $E_mail = $row['e_mail'];
                        $Age = $row['age'];
                        $Gender = $row['gender'];
                        $Food = $row['food'];
                        $file_upload=$row['file_upload'];
            ?>
                            <form action="updatedata.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="">student name</label>
                                            <input type="text" name="student_name" id="name" class="form-control" value="<?php echo $student_name ?>" required>
                                       
                                            <label for="">Email</label>
                                            <input type="text" name="e_mail" id="name" class="form-control" value="<?php echo $E_mail ?>" required>
                                  
                                            <label for="">Age</label>
                                            <input type="number" name="age" id="age" class="form-control" value="<?php echo $Age ?>" required>
                                    
                                        <label for="">Gender:</label>
                        
                                        <input type="radio" name="gender" value="Male"<?php echo ($Gender == 'Male')?'checked':''?> >Male
                                        <input type="radio" name="gender" value="Female"<?php echo ($Gender == 'Female')?'checked':''?> >Female
                                        <input type="radio" name="gender" value="Other"<?php echo ($Gender == 'Other')?'checked':''?> >Other
                                  
                                      <label for="">Food</label>
                                      <select name="food" id="food" class="form-control" required>
                                      <option>Select a Food</option>
                                      <option value="idle"<?php if($Food == "idle"){ echo "Selected"; } ?>>idle</option>
                                      <option value="buri"<?php if($Food == "buri"){ echo "Selected"; } ?>>buri</option>
                                      <option value="pongal"<?php if($Food == "pongal"){ echo "Selected"; } ?>>pongal</option>
                                      <option value="vada"<?php if($Food == "vada"){ echo "Selected"; } ?>>vada</option>
                                      <option value="dosa"<?php if($Food == "dosa"){ echo "Selected"; } ?>>dosa</option>
                                   </select>
                               
                                 
                                        
                     <label>file upload</label> 
                    
                    <input type="file" name="file_upload" id="file_upload" class="form-control" multiple>
                    <img width="10%" height="20%" src="images/<?php echo $file_upload ?>"/>
                                      <br> 
                                      </div>
                                        <div class="form-group" style="display: grid;align-items:  flex-end;">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update"><br>

                                            <input type="button"  class="btn btn-dark" value="Go Back!" onclick="history.go(-1)">
                                        </div>
                                </div>
                            </form>
            <?php 
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>