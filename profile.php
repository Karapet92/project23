<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');die;
}
include 'layout/header.php';
include 'config/config.php';


 $id = $_SESSION['user_id'];
    $select = "SELECT * FROM `users` WHERE `id` = '$id' ";
    $query = mysqli_query($connect,$select);
    $us = mysqli_fetch_assoc($query);
    //var_dump($us);
    $profName = $us["name"];
    $profSurname = $us["surname"];
    $profDate = $us['date'];
   
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="prof clearfix">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ablojka text-center">
                            <img src="images/bg.jpg" alt="bg" class="img-fluid">
                        </div>
                    </div>
                </div>
                
                <div class="avatar clearfix">
                    <?php
                    if($us["avatar"]){
                        $img = $us['avatar'];
                        echo "<img src='images/$img' alt='axjik' class='img-responsive clearfix'";
                    }
                    else{
                        if($us["gender"] == 'Female'){
                            echo "<img src='images/female.png' alt='axjik' class='clearfix'";
                        }
                        else{
                            echo "<img src='images/male.jpg' alt='txa'";
                        }
                    }


                    ?>

                </div>
                <div class="nameSurname " id="nameSurname">
                    <?php
                        echo '<span id="newN">'.$profName.'</span>'.' '. '<span id="newS">'.$profSurname.'</span>';

                    ?>
                </div>
                <div class="profDate" id="profDate">
                    <?php
                        echo "<i class=\"fas fa-birthday-cake\" style='margin-right: 5px;'></i>".'<span id="newD">'.$profDate.'</span>';
                    ?>
                </div>
                <div class="container">


                    <!-- Button to Open the Modal -->
                    <div class="text-right">
                        <input type="button" class="btn btn-primary edit_but" data-toggle="modal" data-target="#myModal" value="Edit Profile">
                    </div>




                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Profile</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="editProfile.php"  method="post" >
                                        <div class="form-group">
                                            <label for="editName">Name: </label>
                                                <input type="text" class="form-control"  name="newName" id="editName" value="<?php echo $us['name'] ?>">

                                        </div>
                                        <div class="form-group">
                                            <label for="editSurname">Surname: </label>
                                                <input type="text" class="form-control"  name="newSurname" id="editSurname" value="<?php echo $us['surname'] ?>" >

                                        </div>
                                        <div class="form-group">
                                            <label for="editDate">Date: </label>
                                                <input type="date"  class="form-control"  name="newDate" id="editDate" value="<?php echo $us['date'] ?>" >

                                        </div>
                                        <!--Password-->

                                        
                                        
                                         <!--Password-->
                                        
                                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" id="saveEdit">
                                    </form>
                                    
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" >
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="text-right">
                        <input type="button" class="btn btn-primary edit_but" data-toggle="modal" data-target="#myModal2" value="Edit Password">
                    </div>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal2">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Password</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">

                                    <form name="frmChange"  method="POST">
                                        <div class="form-group">
                                            <label>Current Password: <span id="defaultcurrentPass"  class="required"></span></label>

                                            <input type="password" name="defaultcurrentPass" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>New Password: <span id="changenewPass" class="required"></span></label>
                                            <input type="password" name="changenewPass" class="form-control"/>

                                        </div>
                                        <div class="form-group">
                                            <label>Retype New Password: <span id="RetypePassword" class="required"></span></label>

                                            <input type="password" name="RetypePassword" class="form-control"/>
                                        </div>

                                        <div>
                                            <input type="submit" name="updatepass"  class="btn btn-primary" value="Update Password"/>

                                        </div>
                                    </form>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" >
                                </div>

                            </div>
                        </div>
                    </div>

                    <form action="uploadImage.php" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                         <input type="file" name="img">
                        </div>
                        <input type="hidden" name="currentImage" value="<?php echo $us['avatar']  ?>">
                        <input type="submit" name="submit" value="Submit">
                        
                    </form>
                            
                            
      <div class="modal fade" id="basicExample" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <!-- Modal conntent -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
                            
             
    
               
                </div>
            </div>


        </div>
    </div>
</div>


<?php
include 'layout/footer.php';
?>


