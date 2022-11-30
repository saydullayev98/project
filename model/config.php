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

    function route()
    {  
        $route = explode('/',$_SERVER['REQUEST_URI']);

        $file_name = explode('.',$route[count($route) - 1])[0];
        return $file_name;
    }
    
?>