<?php
include 'config/config.php';
session_start();
    $newName = $_POST['newName'];
    $newSurname = $_POST['newSurname'];
    $newDate = $_POST['newDate'];
    $profId = $_SESSION['user_id'];

    $update = "UPDATE `users` SET `name`='$newName', `surname` = '$newSurname', `date` = '$newDate'  WHERE `id` = '$profId'";
    $query2 = mysqli_query($connect,$update);
    $select = "SELECT * FROM `users` WHERE `id` = '$profId'";
    $query1 = mysqli_query($connect,$select);

    $row1 = mysqli_fetch_assoc($query1);
        $newArr = [
            'newN'=>$row1['name'],
            'newS'=>$row1['surname'],
            'newD'=>$row1['date'],
            
        ];




echo json_encode($newArr);die;
