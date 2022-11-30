<?php 
    session_start();
    if (isset($_POST['email'])) {
        include('../../model/config.php'); 
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $l = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $sql = mysqli_query($db,$l);
        if(mysqli_num_rows($sql) > 0){
            $_SESSION['login-success'] = '1';

            $y = mysqli_fetch_assoc($sql);
            $_SESSION['arr'] = [
                "name"  => $y['name'],
                "email" => $email 
            ];

            header("location: ../../view/index.php");
        }else{
            $_SESSION['error'] = "Bunday nomli foydalanuvchi yo'q";
            header("location: ../../view/auth/login.php");
        }
    } else {
        $_SESSION['error'] = "Ruxsatsiz kirish";
        header("location: ../../view/auth/login.php");
    }
    
?>