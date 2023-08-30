<?php
    require_once "conn.php";
    $id = $_GET["id"];
    $query = "DELETE FROM foods WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        header("location: intro.php");
    } else {
         echo "Something went wrong. Please try again later.";
    }
?>