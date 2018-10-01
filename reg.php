<?php
session_start();


include 'config/config.php';
    //var_dump($emRes);
if(isset($_POST['submit'])){
    $password2 = $_POST['password2'];
    $ip= $_SERVER['SERVER_ADDR'];
    if(isset($_POST['name']) && !empty($_POST['name'])){
        $name = $_POST['name'];
        $_SESSION['f_error']=$name;

    }else{
        $_SESSION['f1_error'] ='name is missing!';
        header('location:index.php');die;

    }
    if(isset($_POST['surname']) && !empty($_POST['surname'])){
        $_SESSION['f_error']=$name;
        $surname = $_POST['surname'];
    }else{
        $_SESSION['s_error'] ='surname is missing!';
        header('location:index.php');die;

    }
    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['e_error'] =  "$email is not a valid email address!";
            header('location:index.php');die;
        }

        $newEmail = "SELECT `email` FROM `users` WHERE `email` = '$email'";
        $query1 = mysqli_query($connect,$newEmail);
       $row = mysqli_num_rows($query1);
       if($row){
           $_SESSION['e1_error'] = 'this email has already been registered!';
           header('location:index.php');die;
       }

    }else{
        $_SESSION['e_error'] ='email is missing!';
        header('location:index.php');die;

    }



    if(isset($_POST['password1']) && !empty($_POST['password1'])){
        $password1 = $_POST['password1'];
    }else{
        $_SESSION['p_error'] ='password is missing!';
        header('location:index.php');die;

    }
    if(isset($_POST['optradio']) && !empty($_POST['optradio'])){
        $gender = $_POST['optradio'];
    }else{
        $_SESSION['g_error'] ='gender is missing!';
        header('location:index.php');die;

    }
    if(isset($_POST['date']) && !empty($_POST['date'])){
        $date = $_POST['date'];
    }else{
        $_SESSION['d_error'] ='date is missing!';
        header('location:index.php');die;

    }

    if($password1==$password2){
        $password1=crypt($password1);
        $insert = "INSERT INTO `users` (`name`,`surname`,`email`,`password`,`date`,`gender`,`ip`) VALUES ('$name','$surname','$email','$password1','$date','$gender','$ip')";

        $query = mysqli_query($connect,$insert);
        if($query){
            header('location:login.php');

        }
        else{
            header('location:index.php');die;
        }

    }else{
        $_SESSION['p1_error']='Wrong Password!!!';
        header('location:index.php');die;
    }


}


    ?>