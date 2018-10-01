<?php
session_start();
include 'config/config.php';
$id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];
$nTitle = $_POST['newTitle'];
$nText = $_POST['newText'];

$target_dir = "postImg/";
$target_name = uniqid().basename($_FILES["img"]["name"]);
$target_file = $target_dir .$target_name ;

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check file size
if ($_FILES["img"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    die;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    die;
}

if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {

    $update = "UPDATE `post` SET `post_title` = '$nTitle', `post_text` = '$nText',`post_img`='$target_name' WHERE `user_id` = '$id' AND `id` = '$post_id' ";
    $query1 = mysqli_query($connect, $update);


    $select = "SELECT * FROM `post` WHERE `user_id` = '$id' AND `id` = '$post_id' ";
    $query = mysqli_query($connect, $select);
    $r = mysqli_fetch_assoc($query);


    $array = [
        'nTitle' => $r['post_title'],
        'nText' => $r['post_text'],
        'img'=>$r['post_img'],
        'id' => $r['id']
    ];
}


echo json_encode($array);die;
