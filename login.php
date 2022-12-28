<?php
session_start();
error_reporting(~E_ALL);
include "dbconfig/config.php";

if (isset($_POST['login'])) {
    $e = $_POST['email'];
    $p = $_POST['password'];
    $query = "select * from signup where email='$e' and password='$p'";
    $query_run = mysqli_query($con, $query);
    // check your record in row of table i.e: signup
    $result = mysqli_num_rows($query_run);
     
    if ($result > 0) {
        // to store value on browser side for login
        $_SESSION['user'] = 'ok';
        // redirect to main page
        header("Location: view.php");
    } else {
        $msg = "Email/Password don't matched";
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
                Login | <a href="signup.php">Signup</a>
                <span> <?php echo $msg;?> </span>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="email" class="form-control" name="email" required>

                    </div>
                    <div class="form-group">
                        <label for="address">Password</label>
                        <input type="password" class="form-control" name="password" required>

                    </div>
                    <div class="form-group">

                        <input type="submit" class="btn btn-success" name="login" value="login">
                    </div>
                </form>

            </div>
        </div>


    </div>

    <script src="" async defer></script>
</body>

</html>