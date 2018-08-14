<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-24
 * Time: 12:08 PM
 */

session_start();

   
   
    include_once "db.php";
    $db = getX10Connection();
   // print_r($_SESSION['likePositions']);
    // print_r($session_data);
    
	
	

    $userNumber = getUserPosition();
    $totalUsers = getUserCount();
    
    
    $randomUser = $_GET[userNo];
    
    // remember later that we need to do this by userID not position cus we fucked son
    $randomUserDesc = getRandomUserDesc($randomUser);
    $randomUserName = getRandomUserName($randomUser);
    $randomUserIMG = getRandomUserIMG($randomUser);
    $randomUserLikes = getRandomUserLikes($randomUser);
    $_SESSION['viewingUser'] = $randomUser;
     $_SESSION[$userNumber] = $userNumber;
      $userImg = getRandomUserImg($randomUser);
    
      //var_dump($_SESSION['likePositions']);
      
	

?>

<html>
<head>
    <!-- Latest compiled and minified CSS -->
    
    <link rel="stylesheet" 		 href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	 <script src="http://code.jquery.com/jquery-latest.js"></script>
   	
   
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="index3.css">
  
    
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#likeUser').click(function(){

                $.ajax({url: "likeThisUser.php", success: function(result){
                     
                      alert("user has been liked");

                    }});


                $("#likes").html("<?php echo "Likes: "; echo $randomUserLikes + 1; ?>");
                $("#likeUser").attr("disabled", true);
                $("#likeUser").attr("value", "LIKED");
            });
            
             $('#newUser').click(function(){
           // Math.random() * (max - min) + min; 		
           var x = 1 + Math.floor(Math.random(0) * <?php echo $totalUsers; ?>);
           window.location.replace("playPage.php?userNo=" + x);
            });

		//alert("<?php echo $_GET[userNo]; ?>");
        });
    </script>
</head>

<div class="container-fluid">

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
                <li><a href="index.php">My Profile</a></li>
                <li class="active"><a href="playPage.php">Play!</a></li>
                <li><a href="leaderboard.php">Leaderboard</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>



<body>



 <div class="row">
    <div class="col-sm-4"></div>
    
<div class="col-sm-4 card" style="background-color:lavenderblush;">

<div class="row">

<p id="profile-name" class="profile-name-card"> USERNAME: <?php echo $randomUserName; ?></p>
<img src="<?php echo $randomUserIMG ?>" class="img-circle col-md-6 col-md-offset-3" width="300" height="200" id ="profileImg" class="profile-img-card">
<br>

</div>


<div class="row">

<p class="profile-desc-card" style="text-align:center;"><?php echo $randomUserDesc; ?></p>

</div>



<div class="row" style="text-align:center;">

<p id="likes" style="text-align:center;">Likes: <?php echo $randomUserLikes; ?></p>
<input type="button" value="New User" id = "newUser" class="btn btn-danger">

<input type ="button" value="Like User" id = "likeUser" class="btn btn-success" >

</div>

</div>

<div class="col-sm-4" ></div>
 

</div>

</div>

</body>
</html>


