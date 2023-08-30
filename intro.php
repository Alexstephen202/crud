<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>


<style>
body {
  background-color: blue;
}



</style>



<body>
    <div class="container">
        <div class="row">
            <div class="col-10"></div>
            <div class="col-2">
<a href="adview.php" tite="Add" class="btn btn-success"><i style="font-size:24px" class="fa">&#xf067;</i><a>

<a href="logout.php" type="button"  class="btn btn-secondary" tite="Logout"><i style="font-size:24px" class="fa">&#xf08b;</i>
<a></div></div>

</div>
    <section style="margin: 50px 0;">
        <div class="container">
            <table class="table table-secondary">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">student_name</th>
                    <th scope="col">e_mail</th>
                    <th scope="col">age</th>
                    <th scope="col">gender</th>
                    <th scope="col">food</th>
                     <th scope="col">file_upload</th> 
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    <th scope="col">View</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "conn.php";
                        $sql_query = "SELECT * FROM foods";
                        if ($result = $conn ->query($sql_query)) {
                            while ($row = $result -> fetch_assoc()) { 
                                $id = $row['id'];
                                $student_name= $row['student_name'];
                                $e_mail = $row['e_mail'];
                                $age = $row['age'];
                                $Gender=$row['gender'];
                                $food=$row['food'];
                                 $file_upload=$row['file_upload'];
                    ?>
                    
                    <tr class="trow">
                        <td><?php echo $id; ?></td>
                        <td><?php echo $student_name; ?></td>
                        <td><?php echo $e_mail; ?></td>
                        <td><?php echo $age; ?></td>
                        <td><?php echo $Gender; ?></td>
                        <td><?php echo $food; ?></td>
                        
                        <td><img width="10%" height="10%" src="images/<?php echo $file_upload ?>"/></td>
                      

                        <td><a href="edit.php?id=<?php echo $id; ?>" data-toggle="tooltip" data-placement="top" title="Edit" >   <span class="glyphicon">&#x270f;</span></a>
                    
                        </td>
                        <td><a href="deletedata.php?id=<?php echo $id; ?>" onclick="myFunction()" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="font-size:30px;color:red"></i></a>
                        <script>
                        function myFunction() {
                        alert("Are sure you want to delete!");
                        }
                        </script>
                    </td>
                        <td><a href="veiw.php?id=<?php echo $id; ?>"data-toggle="tooltip" data-placement="top" title="Veiw"><i class="fa fa-eye" style="font-size:30px;color:blue"></i></a></td>

                    </tr>
                    
                    <?php
                            } 
                        } 
                    ?>
                </tbody>
              </table>
        </div>
    </section>
</body>

</html>
