<?php
session_start();

session_destroy();

    include 'layout/header.php';

?>


    <div class="bird-container">
        <div class="bird"></div>
    </div>
        <div class="row text-center">
            <div class="col-md-6">

                <form action="reg.php" method="post" class="text-center">
                    <div class="form-group mx-auto">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control in1"  id="name" name="name" placeholder="Your Name">

                    </div>
                    <?php
                    if(isset($_SESSION['f1_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['f1_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['f1_error']);
                    ?>
                    <div class="form-group">
                        <label for="surname">Surname:</label>
                        <input type="text" class="form-control in1"  id="surname" name="surname"  placeholder="Your Surname">
                    </div>
                    <?php
                    if(isset($_SESSION['s_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['s_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['s_error']);
                    ?>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="text"   name="email" class="form-control in1" id="email">
                        <span id="error"></span>
                    </div>
                    <?php
                    if(isset($_SESSION['e_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['e_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['e_error']);
                    ?>
                    <?php
                    if(isset($_SESSION['e1_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['e1_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['e1_error']);
                    ?>
                    </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password"   name="password1" class="form-control in1" id="pwd">
                    </div>
                    <div class="form-group">
                        <label for="pwd1">Confirm Password:</label>
                        <input type="password"   name="password2" class="form-control in1" id="pwd1">
                    </div>
                    <?php
                    if(isset($_SESSION['p1_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['p1_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['p1_error']);
                    ?>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date"   name="date" class="form-control in1" id="date">
                    </div>
                    <?php
                    if(isset($_SESSION['d_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['d_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['d_error']);
                    ?>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Male" name="optradio">Male
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Female" name="optradio">Female
                        </label>
                    </div>
                    <?php
                    if(isset($_SESSION['g_error'])) {
                        ?>
                        <div class="alert alert-danger" id="al">
                            <?php echo $_SESSION['g_error']  ?>
                            <div class="ugl"></div>
                        </div>
                        <?php
                    } unset($_SESSION['g_error']);
                    ?>
                    <div class="row">
                        <div class="col-md-12 cl1">
                            <input type="submit" class="btn btn-primary but" name="submit" value="Sign up">
                        </div>
                    </div>
                </form>

                </div>
            </div>




<?php
    include 'layout/footer.php';

?>