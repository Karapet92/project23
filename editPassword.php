<?php
include 'config/config.php';
session_start();
$id = $_SESSION['user_id'];

if(isset($_POST['updatepass']))
{
    $result = $connect->query("SELECT * from `users` WHERE `id` ='$id' ");
    $row=mysqli_fetch_assoc($result);

    $pass_encrypt=mysqli_real_escape_string($connect,$_POST['defaultcurrentPass']);
    $newPass=mysqli_real_escape_string($connect,$_POST['changenewPass']);
    $confPass=mysqli_real_escape_string($connect,$_POST['RetypePassword']);

    if(password_verify($pass_encrypt,$row['password'])) {
        if($newPass==$confPass){
            $newPass=crypt($newPass);
            $str=$connect->query("UPDATE `users` set `password` ='$newPass' WHERE `id` ='$id'");
            if($str){
                $message = "You have successfully changed your password.";
                header('location:profile.php');die;
            }
        } else{
            header('location:profile.php');die;
        }

    } else
    {
        $message = "Current Password is not correct";
        header('location:profile.php');die;
    }
}

?>