<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>
<style>
    @import url(https://fonts.googleapis.com/css?family=Montserrat:400,700);

    html{    background:url(http://thekitemap.com/images/feedback-img.jpg) no-repeat;
  background-size:cover;
  height:100px;
  
}

#form-div {
	background-color:rgba(72,72,72,0.4);
	padding-left:35px;
	padding-right:35px;
	padding-top:35px;
	padding-bottom:50px;
	width: 750px;
	float: left;
	left: 50%;
	position: absolute;
  margin-top:30px;
	margin-left: -260px;
  -moz-border-radius: 7px;
  -webkit-border-radius: 7px;

}

.submit:hover {
	color: #3498db;
}

.submit:hover .ease{
  width:100%;
  background-color:white;
}

    </style>


<?php
// define variables and set to empty values
$stunameErr =   $genderErr = $emailErr = $foodErr = $fileErr =   "";
$stuname =   $gender = $email = $phone = $food = $file =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["student_name"])) {
    $stunameErr = "Name is required";
  } else {
    $stuname = test_input($_POST["student_name"]);
  }
  
  if (empty($_POST["e_mail"])) {
    $emailErr = "";
  } else {
    $email = test_input($_POST["e_mail"]);
  }
  
  

  
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

   

 
  if (empty($_POST["Food"])) {
    $foodErr = "";
  } else {
    $food = test_input($_POST["Food"]);
  }

  if (empty($_POST["file_upload"])) {
    $fileErr = "file is required";
  } else {
    $file = test_input($_POST["file_upload"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<body>
   
    <section>
        <h1 style="text-align: center;margin: 50px 0;">PHP CRUD operations with MySQL</h1>
        <div class="container align-center">
        <div id="form-div">
            <form action="adddata.php" method="post" enctype="multipart/form-data">
               <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="" class="text-info">Student Name <span class="error">*<?php echo $stunameErr;?></span></label>
                        <input type="text" name="student_name" id="name" class="form-control" required><br>
                  
                    <label for="" class="text-info">Email<span class="error">*<?php echo $emailErr;?></span></label>
                        <input type="text" name="e_mail" id="name" class="form-control" required><br>
                             
                        <label for="" class="text-info">Age</label>
                        <input type="number" name="age" id="age" class="form-control" required><br>
                    
                        <label for="" class="text-info">Gender:<span class="error">*<?php echo $genderErr;?></span></label>
                        
                        <input type="radio" name="gender" value="Male" >Male
                        <input type="radio" name="gender" value="Female" >Female
                        <input type="radio" name="gender" value="Other" >Other<br><br>
                  
                        <label for="" class="text-info">Food<span class="error">*<?php echo $foodErr;?></span></label>
                        <select name="food" id="food" class="form-control" required>
                            <option value="">Select a Food</option>
                            <option value="idle">idle</option>
                            <option value="buri">buri</option>
                            <option value="pongal">pongal</option>
                            <option value="vada">vada</option>
                            <option value="dosa">dosa</option>
                        </select>
                <br>

                     <label class="text-info">file upload<span class="error">*<?php echo $fileErr;?></span></label> 
                    
                      <input type="file" name="file_upload" id="file_upload" class="form-control" multiple>
  
                    <br> 

                   
<div class="row">

    <div class="col-sm-3">
                    
                    
                        <input type="submit" name="submit" id="submit" class="btn btn-primary"></div>
                        <div class="col-sm-3">
                        <input type="button"  class="btn btn-dark" value="Go Back!" onclick="history.go(-1)"></div>
                    </div>
             
            </form>
        </div>
        </div>
    </section>
    

   