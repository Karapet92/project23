<?php
session_start();
$_SESSION['reg'] = 'reg';
include 'layout/header.php';

?>
<div class="col-md-6 mx-auto" >
    <?php
    if(isset($_SESSION['em_pas'])) {
        ?>
        <div class="alert alert-danger text-center" id="al">
            <?php echo $_SESSION['em_pas']  ?>
            <div class="ugl"></div>
        </div>
        <?php
    } unset($_SESSION['em_pas']);
    ?>
<form action="loginProcess.php" method="post">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control in1" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control in1" id="pwd" name="password">
    </div>
    <?php
    if(isset($_SESSION['log_pas'])) {
        ?>
        <div class="alert alert-danger text-center" id="al">
            <?php echo $_SESSION['log_pas']  ?>
            <div class="ugl"></div>
        </div>
        <?php
    } unset($_SESSION['log_pas']);
    ?>

    <div class="form-group form-check">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> Remember me
        </label>
    </div>
    <div class="text-center" style="margin-top: 35px;">
        <input type="submit" class="btn btn-primary but" name="submit" value="Log in">
    </div>

</form>
</div>

<?php

include 'layout/footer.php';

?>
