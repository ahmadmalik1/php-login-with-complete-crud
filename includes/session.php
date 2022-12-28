<?php
session_start();
if(basename($_SERVER['SCRIPT_FILENAME']) != 'login.php'){
    if($_SESSION['user'] != 'ok'){
        header("Location: login.php");
    }
}
?>