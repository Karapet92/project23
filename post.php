<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
include('layout/header.php');
include('config/config.php');

$us_id = $_SESSION['user_id'];

$select = "SELECT * FROM `post`  WHERE `user_id`='$us_id'";
$query = mysqli_query($connect,$select);
$count_posts = 3;
$count_rows = mysqli_num_rows($query);
$count_nav = ceil($count_rows/$count_posts);


if(!isset($_GET['page'])){
    $page = 1;
}else{
    $page = $_GET['page'];
}

$offset = $count_posts*( $page-1);
$select1 = "SELECT * FROM `post`  WHERE `user_id`='$us_id' LIMIT  $count_posts OFFSET $offset";
$query1 = mysqli_query($connect,$select1);

?>

    <form  method="post" action="postProcess.php" id="postUpload" enctype="multipart/form-data" >
        <div class="form-group">
            <label for="usr">Title:</label>
            <input type="text" class="form-control" id="usr" name="post_title">
            <div class="form-group">
                <label for="comment">Content:</label>
                <textarea class="form-control" rows="5" id="comment" name="post_text"></textarea>
            </div>
            <input type="file" name="image_file" id="post_file" multiple>
            <input type="submit" value="POST" id="subPost" class="btn btn-primary" name="submit">
    </form>


    <!--<div id="postText"></div>
    <div id="postImg"></div>-->
<div id="div">

        <?php while ($r=mysqli_fetch_assoc($query1)){?>

    <div class="row information" id="<?php echo $r['id']; ?>">
        <div class="col-sm-3 ">
            <div class="post-img text-center">
                <img src="postImg/<?php echo $r['post_img']; ?>" alt="">
            </div>
        </div>
        <div class="col-sm-9" style="margin-bottom: 15px">
                <div class="title" id="ptitle<?php echo $r['id']; ?>">
                    <?php echo $r['post_title']; ?>
                </div>
                <div class="posttext" id="ptext<?php echo $r['id']; ?>">
                    <?php echo $r['post_text']; ?>
                </div>
            </div>
        <form class="deletepost" action="deletePost.php" method="post">
            <input type="hidden" name="post_id" value="<?php echo $r['id']; ?>">
            <input type="submit" name="submit" class="btn btn-danger btn2" value="Delete" id="<?php echo $r['id']; ?>">
        </form>

            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary btn1" data-toggle="modal" data-target="#myModal<?php echo $r['id']; ?>">
                Edit Post
            </button>

            <!-- The Modal -->
            <div class="modal fade" id="myModal<?php echo $r['id']; ?>">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div style="margin-left: 15px; margin-top: 10px"><h2>Edit Post</h2></div>
                        <!-- Modal body -->
                        <div class="modal-body" >
                            <form action="editPost.php" method="post" enctype="multipart/form-data" class="myPost">
                                <input type="text" name="newTitle" value="<?php echo $r['post_title'] ?>" class="form-control">
                                <input type="text" name="newText" value="<?php echo $r['post_text'] ?>" class="form-control">
                                <input type="hidden" name="post_id" value="<?php echo $r['id']; ?>">
                                <input type="file" name="img" value="<?php echo $r['post_img']; ?>">
                                <input type="submit" value="Save" id="editPost" name="submit" class="btn btn-danger">
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


    </div>
        <?php }?>

</div>
    <p id="pagination">
        <?php for($page=1;$page<=$count_nav;$page++){
            ?>
           <a class="a" href="post.php?page=<?php echo $page ?>" data-page="<?php echo  $page ?>" ><?php echo $page ?></a>
       <?php } ?>
    </p>



<?php

include('layout/footer.php');
