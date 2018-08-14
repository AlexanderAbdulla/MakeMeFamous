<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-16
 * Time: 2:27 PM
 */

session_start();

if(isset($_SESSION['currentUser'])){

    header('Location: alreadyLogged.php');

}

//if(!isset($_SESSION['userNotFound'])) {
  //  $_SESSION['userNotFound']   = "user not found!";
//}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="index3.css">
    


    
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MakeMeFamous</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Play!</a></li>
                <li><a href="#">Leaderboard</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li class="active"><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container">
        <div class="card card-container">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <font color="red"> <?php echo $_SESSION['userNotFound']; ?></font>
            <form class="form-signin" action="loginHandling.php" method="post">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" name="username" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" name ="email" id="inputPassword" class="form-control" placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <input type="submit" id="loginBtn" class="btn btn-lg btn-primary btn-block btn-signin" value="Login">
            </form><!-- /form -->
            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div><!-- /card-container -->
    </div><!-- /container -->

<!-- <p id = "errorMsg"><?php echo $_SESSION['userNotFound']; ?></p> -->


</body>
</html>
