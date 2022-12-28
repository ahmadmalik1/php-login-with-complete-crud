<?php
session_start();
// for deleting this value from browser side 
unset($_SESSION['user']);
// redirect to login page
header("Location: login.php");
?>