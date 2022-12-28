<?php
include "includes/session.php";
include "dbconfig/config.php";
error_reporting(~E_ALL);

$id = $_GET['id'];
$query = "select * from students where id='$id'";
$query_run = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($query_run);


$std_img = $_FILES['std_img']['name'];
// $size = getimagesize("assets/uploads/".$row['img']);
// print_r($size);
//die;
$std_name = $_POST['std_name'];
$std_address = $_POST['std_address'];



if (isset($_POST['update'])) {
    if ($std_img) {
        $update_query = "update students set img='$std_img', name='$std_name', address='$std_address'";
        mysqli_query($con, $update_query);
        // delete old
        unlink("assets/uploads/".$row['img']);
        //add new
        move_uploaded_file($_FILES['std_img']['tmp_name'], 'assets/uploads/' . $std_img);
        header("Location: view.php");
    } else {
        $update_query = "update students set name='$std_name', address='$std_address'";
        mysqli_query($con, $update_query);
        header("Location: view.php");
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
<?php include "includes/header.php";?>
    <div class="container">
        <div class="card text-dark bg-light m-5">
            <div class="card-header">
                Update Student profile <a href="view.php">View Record</a>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <label for="image">Student Image</label>
                                <input type="file" class="form-control" name="std_img">
                            </div>
                            <div class="col-2">
                                <h6><?php echo $row['img'] ?> </h6>
                                <img src="assets/uploads/<?php echo $row['img'] ?>" width="100px" alt="loading">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Student Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="std_name">

                    </div>
                    <div class="form-group">
                        <label for="address">Student Address</label>
                        <textarea class="form-control" rows="5" name="std_address"><?php echo $row['address'] ?></textarea>

                    </div>
                    <div class="form-group">

                        <input type="submit" class="btn btn-success" name="update" value="Update data">
                    </div>
                </form>

            </div>
        </div>


    </div>

    <script src="" async defer></script>
</body>

</html>