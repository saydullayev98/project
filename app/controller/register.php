<?php
    if (isset($_POST['user'])) {
        $user_name = $_POST['user'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        
        include('../../model/config.php'); 

        $sql = mysqli_query($db,"INSERT INTO `users`(`id`, `name`, `email`, `password`) VALUES (NULL,'$user_name','$email','$password')");

        if ($sql) {
            $_SESSION['login-success'] = '1';
            $_SESSION['arr'] = [
                "name"  => $user_name,
                "email" => $email 
            ];

            header("location: ../../view/index.php");
        }else{
            $_SESSION['error'] = "Ro'yhatdan o'tishdagi hatolik, qaytadan urining";
            header("location: ../../view/auth/register.php");
        }
    } else {
        $_SESSION['error'] = "Ruxsatsiz kirish";
        header("location: ../../view/auth/login.php");
    }
?>