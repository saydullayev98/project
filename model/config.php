<?php
    session_start();

    $host     = "localhost";
    $user     = "root";
    $password = "";
    $db       = "project";

    $db = mysqli_connect($host,$user,$password,$db);

    if (!isset($_SESSION['login-success'])) {
       header("location: ../view/auth/login.php"); 
    }
?>