<?php
session_start();
include_once "db.php";
// Create connection
$db = getX10Connection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
	
	
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="index3.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
 
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    
        <script type="text/javascript">
        $(document).ready(function(result) { 
            // bind 'myForm' and provide a simple callback function 
            $('#imgForm').ajaxForm(function(result) { 
               // alert("Thank you for your comment!"); 
                $("#profileImg").attr("src", result + "");
                
            });
            
            $('#txtForm').ajaxForm(function(result) { 
                //alert("Thank you for your comment!"); 
                $("#descTxt").html(result);
                
            });
             
        });
        
    </script>

</head>
<body>

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
                <li><a href="playPage.php">Play!</a></li>
                <li class="active"><a href="leaderboard.php">Leaderboard</a></li>
                <li><a href="#"></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>



 <div class="row">
    <div class="col-sm-4"></div>
    
<div class="col-sm-4 card" style="background-color:lavenderblush;">
<p class="profile-name-card"> THE TOP USERS </p>
<ul class="list-group">


  
  <?php
	session_start();
	include_once "db.php";
	// Create connection
	$db = getX10Connection();
	$sql = "SELECT * FROM users ORDER BY likes DESC";
        $result = $db->query($sql);
	
	while($row = $result->fetch_assoc()) {
        	//echo "<tr><td>".$row["username"]."</td><td>".$row["likes"]." ".$row["userDesc"]."</td></tr>";
        	echo " <li class=\"list-group-item d-flex justify-content-between align-items-center\"> " . $row["username"] . " <span class=\"badge badge-primary badge-pill\"> " . $row["likes"] . "</span>
                       </li> ";
         }
  ?>
  

</ul>
</div>

<div class="col-sm-4" ></div>
 

</div>

</div>
</body>
</html>