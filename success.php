<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css">

</head>

<body>

    <a href="form.php">Back</a>
    <?php
    session_start();
    error_reporting(~E_ALL);
    echo "<h2 style='color:green'>" . $_SESSION['status'] . "</h2>";
    ?>

    <script src="" async defer></script>
</body>

</html>