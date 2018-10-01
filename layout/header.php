<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.4.1/jquery.fancybox.min.css" />
</head>
<body>
    <nav id="nav" class="navbar navbar-expand-lg navbar-dark"">
    <a class="navbar-brand" href="javascript:void(0)">Logo</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navb">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../gallery.php">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../post.php">Posts</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <ul class="nav navbar-nav navbar-right" id="ul_nav">
                <!--<li><a href="../index.php"><span class="glyphicon glyphicon-user"></span><i class="fas fa-user-plus"></i> Sign Up</a></li>-->
                <?php   if(isset($_SESSION['user_id'])) echo  '<a href="../logout.php">Log Out</a>';
                    elseif (isset($_SESSION['reg'])) echo '<li><a href="../index.php"><span class="glyphicon glyphicon-user"></span><i class="fas fa-user-plus"></i> Sign Up</a></li>';
                ?>


                <?php if(!isset($_SESSION['reg'])) echo  '<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span><i class="fas fa-sign-in-alt"></i> Log in</a></li>';

                ?>






                <!--<li><a href="../login.php"><span class="glyphicon glyphicon-log-in"></span><i class="fas fa-sign-in-alt"></i> Log in</a></li>-->
            </ul>
            <input id="nav_search" class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success my-2 my-sm-0" id="nav-but" type="button">Search</button>
        </form>
    </div>
    </nav>
<div class="container" style="margin-top: 75px;">