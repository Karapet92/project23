<?php
include 'config/config.php';
if(isset($_POST['user'])){
    $email = $_POST['user'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $newEmail = "SELECT `email` FROM `users` WHERE `email` = '$email'";
        $query1 = mysqli_query($connect,$newEmail);
        $row = mysqli_num_rows($query1);
        if($row){


            $arr = [
                'error'=>'this email has already been registered!'
            ];
        }

    } else{

        $arr = [
            'error'=>"$email is not a valid email address!"
        ];
    }


}



echo json_encode($arr);die;