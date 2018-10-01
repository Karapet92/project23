<?php
include('config/config.php');
foreach ($_POST as $key =>$value) {
    $$key = $value;
}
if(isset($submit)){


//    var_dump('gallery'.DIRECTORY_SEPARATOR.$file_name);die;

    $delete = "DELETE FROM `gallery` WHERE `id` = '$id'";
    $query = mysqli_query($connect,$delete);
    if($query){
        if(unlink('gallery'.DIRECTORY_SEPARATOR.$file_name)){
            header('location: gallery.php');
        }
    }


};