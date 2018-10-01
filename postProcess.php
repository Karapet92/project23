<?php
include 'config/config.php';
session_start();
$us_id = $_SESSION['user_id'];
$title = $_POST['post_title'];
$text = $_POST['post_text'];
$img = $_POST['image_file'];

if(isset($_POST['submit'])){
    $target_dir = "postImg/";
    $target_name = uniqid().basename($_FILES["image_file"]["name"]);
    $target_file = $target_dir.$target_name ;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check file size
    if ($_FILES["image_file"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        die;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        die;
    }

    if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
        $insert = "INSERT INTO `post` (`user_id`, `post_title`, `post_text`,`post_img`) VALUES ('$us_id','$title','$text','$target_name')";
        $query = mysqli_query($connect,$insert);
        if((isset($_POST['currentImage'])) && !empty($_POST['currentImage']) ){
            $currentImage = $_POST['currentImage'];
            if(file_exists($target_dir.$currentImage)){

                unlink($target_dir.$currentImage);
            }
        }
        if($query){
            header('location:post.php');
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}







