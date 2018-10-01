<?php
session_start();
include 'config/config.php';

$email = $_POST['email'];
$password = $_POST['password'];

$select = "SELECT * FROM `users` WHERE `email`='$email'";
$query = mysqli_query($connect,$select);
$data = mysqli_fetch_assoc($query);

$row = mysqli_num_rows($query);
if($row){
    if(password_verify($password,$data['password'])){

            $_SESSION['user_id'] = $data['id'];
            header('location:profile.php');
    }
    else{
        $_SESSION['log_pas'] = 'Invalid password';
        header('location:login.php');die;
    }

}
else{
    $_SESSION['em_pas'] = 'this email is not registered';
    header('location:login.php');die;
}
