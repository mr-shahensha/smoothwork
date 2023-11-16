<?php
session_start();
if($_SESSION['id']==""){
    die(header("location:home.php"));
}
?>

