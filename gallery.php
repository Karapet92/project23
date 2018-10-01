<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
include 'layout/header.php';
include  'config/config.php';
$id = $_SESSION['user_id'];
$select = "SELECT * FROM `gallery` WHERE `user_id`='$id' ORDER BY `id` DESC ";
$query = mysqli_query($connect,$select);


?>

    <form action="uploadGallery.php" method="post" enctype="multipart/form-data" style="margin-bottom: 15px;">
        <div class="form-group">
            <input type="file" name="img[]" multiple>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    <?php if(isset($_SESSION['file_large'])) ?>
    <span>
        <?php echo $_SESSION['file_large']; ?>
    </span>
    <?php unset($_SESSION['file_large']); ?>
    <?php if(isset($_SESSION['file_type'])) ?>
        <span>
            <?php echo $_SESSION['file_type']; ?>
        </span>
    <?php unset($_SESSION['file_type']); ?>
    <?php if(isset($_SESSION['upload_error'])) ?>
        <span>
            <?php echo $_SESSION['upload_error']; ?>
        </span>
    <?php unset($_SESSION['upload_error']); ?>

    <?php if(isset($_SESSION['upload_file_error'])) ?>
        <span>
            <?php echo $_SESSION['upload_file_error']; ?>
        </span>
    <?php unset($_SESSION['upload_file_error']); ?>


    <div class="row">
        <?php while ($row=mysqli_fetch_assoc($query)){?>
            <div class="col-sm-3 text-center image" style="margin-bottom: 15px">
                <a data-fancybox="gallery" href="gallery/<?php echo $row['img']  ?>">
                    <img src="gallery/<?php echo $row['img']  ?>" alt="" style="max-width: 200px; height: 150px; ">
                </a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?= $row['id']; ?>">
                    Delete
                </button>

                <div class="modal fade" id="exampleModal<?= $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you want to delete this image?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <form action="deleteImage.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="hidden" name="file_name" value="<?= $row['img'] ?>">
                                    <button type="submit" name="submit" id="delete" class="btn btn-primary">Yes DELETE!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>





<?php
include  'layout/footer.php';
