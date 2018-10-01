<?php
session_start();
include 'config/config.php';
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])) {
    $target_dir = "gallery/";
//    var_dump(uniqid());die;
    $target_name = $_FILES['img']['name'];
    $target_file = $target_dir.$target_name;


    foreach ($_FILES as $value) {
        for ($i = 0; $i < count($value['name']); $i++) {
            $a = uniqid().$value['name'][$i];
            $imageFileType = strtolower(pathinfo($target_dir.$a, PATHINFO_EXTENSION));
            if ($value["size"][$i] > 5000000) {
                $_SESSION['file_large'] ="Sorry, your file is too large.";
                header('location:gallery.php');die;}
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                $_SESSION['file_type'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                header('location:gallery.php');die;
            }
            if (move_uploaded_file($value['tmp_name'][$i], $target_dir.$a)) {

                $insert = "INSERT INTO `gallery` (`user_id`,img) VALUES ('$user_id','$a')";
                $query = mysqli_query($connect,$insert);
                if(!$query){
                    $_SESSION['upload_error'] = "upload failed";
                    header('location:gallery.php');die;
                }
            } else {
                $_SESSION['upload_file_error'] = "upload failed";

                header('location:gallery.php');die;
            }


        }
        $_SESSION['upload'] = "Success";
        header('location:gallery.php');die;
    }
}










