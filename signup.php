<?php
session_start();
error_reporting(~E_ALL);
include "dbconfig/config.php";



if (isset($_POST['signup'])) {
    $n = $_POST['name'];
    $e = $_POST['email'];
    $p = $_POST['password'];
    $query = "insert into signup (name, email, password) values('$n','$e','$p')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        
        header("Location: login.php");
    } else {
        echo "<br> Error in query";
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">

    <style>
        span {
            color: red;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="card text-dark bg-light m-5">
            <div class="card-header">
                Signup | <a href="login.php">Login</a>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="image">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" required>

                    </div>
                    <div class="form-group">
                        <label for="address">Password</label>
                        <input type="password" class="form-control" name="password" required>

                    </div>
                    <div class="form-group">

                        <input type="submit" class="btn btn-success" name="signup" value="SignUp">
                    </div>
                </form>

            </div>
        </div>


    </div>

    <script src="" async defer></script>
</body>

</html>