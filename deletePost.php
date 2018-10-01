<?php
include 'config/config.php';
session_start();
$us_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
$select2 = "SELECT * FROM `post` WHERE `user_id` = '$us_id' AND `id` = '$post_id'";
$query2 = mysqli_query($connect,$select2);

$row2 = mysqli_fetch_assoc($query2);

$newArr = [
    'iddd'=>$row2['id']
];



if($row2){
    $delete = "DELETE FROM `post` WHERE `user_id` = '$us_id' AND `id` = '$post_id' ";
    $query = mysqli_query($connect,$delete);
}



echo json_encode($newArr);die;



