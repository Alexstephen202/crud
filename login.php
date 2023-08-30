


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
 
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;

}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 14px 20px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
.avatar{
    width: 30%;
    height: 30%;
}
img.avatar {
 
  border-radius: 50%;
  
}

.container {
    align: center;
  padding: 16px;
  background-color: gray;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  
}



</style>
</head>
<body>
  <?php
    session_start();
   
   $message = "";
    if(count($_POST)>0) {
        $con = mysqli_connect('localhost','root','','crud') or die('Unable To connect');
        $result = mysqli_query($con,"SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '". $_POST["password"]."'");
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            header("Location:intro.php");
        } else {
           $message = "Invalid Username or Password!";
        }
    }
  
  
?>

<div class="container">

<h2 align="center">Login Form</h2>

<form name="frmUser" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" autocomplete="false" align="center">

 <div class="message"><?php  if($message!=""){ echo $message;}  ?>
 </div>

  <div class="imgcontainer">
    <img src="icon2.png" alt="Avatar" class="avatar" style="width:20%; height:20%;" >
  </div>
  <div>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" autocomplete="kjk87"  name="user_name" class="Form-control" required><br>

   
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" autocomplete="bjb76"  name="password" class="Form-control" required><br>

  

    <button type="submit" class="Form-control" >Login</button>
    &nbsp<button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
 </div>
 
</form>


</body>
</html>

