<?php
session_start();
include 'config/config.php';
$user_id = $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $target_dir = "images/";
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
        $update = "UPDATE `users`  SET `avatar`='$target_name' WHERE `id`='$user_id'";
        $query = mysqli_query($connect,$update);
        if((isset($_POST['currentImage'])) && !empty($_POST['currentImage']) ){
            $currentImage = $_POST['currentImage'];
            if(file_exists($target_dir.$currentImage)){

                unlink($target_dir.$currentImage);
            }
        }
        if($query){
            header('location:profile.php');
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}

