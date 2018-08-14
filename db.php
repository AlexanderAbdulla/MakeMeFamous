<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-23
 * Time: 12:50 PM
 */


function getConnection() {
session_start();	
    $servername = "localhost";
    $username = "root";
    $password = "";

    $db = new mysqli($servername, $username, $password);



    mysqli_select_db($db, 'makemefamous') or
    die(mysqli_error($db));

    return $db;
}

function getX10Connection(){
session_start();	

$servername = "localhost";
$username = "makemef2_boss2";
$password = "boss2";


// Create connection
$db = new mysqli($servername, $username, $password);
 
//echo "Connected successfully";

mysqli_select_db($db, 'makemef2_database') or
die(mysqli_error($db));

return $db;

}

/*return number of users*/
function getUserCount()
{
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $users = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['username'] == $_SESSION['currentUser']) {
                $userNumber = $users;
            };
            $users++;
        }
    }
    return $users;
}

/*return current user position in db*/
function getUserPosition() {
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $users = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
           if ($row['username'] == $_SESSION['currentUser']) {
                          $userNumber = $users;
                          break;
           };
           $users++;
        }
    }
    return $userNumber;
}

function generateRandomUserNumber() {
	session_start();	
	
    $userNumber = getUserPosition();
    $totalUsers = getUserCount();

    $rand = 99;
    $continue = true;
    
    if(sizeof($_SESSION['likePositions']) >= $totalUsers) {
    	$continue = false; 
    }
    
    echo "our current viewed user is ";
    echo $_SESSION['viewingUser'];
    echo "<br>";
    
    while($continue){
        $rand = rand(0, $totalUsers -1);
        
   
        echo "our rand is: ";
        echo $rand;
        echo "<br>";
        
        if($rand != $userNumber) {
            //in_array("Irix", $os)
            if((in_array($rand, $_SESSION['likePositions']))){
            	echo "we have found that the rand: ";
            	echo $rand;
            	echo "is in the array so we are still iterating";
            	echo "<br>";
                $continue = true;
            }elseif ($rand == $_SESSION['viewingUser']) {
            	echo "we have found that the rand: ";
            	echo $rand;
            	echo " matches the current ciewing user";
            	echo "<br>";
            	$continue = true;
            }else {
                $continue = false; 
            }
        }
    }
	$_SESSION['likePositions'][] = $rand;
	$_SESSION['viewingUser'] = $rand;
	return $rand;
}

function getRandomUserDesc($randomUser) {
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $userDescription = "";

    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($counter == $randomUser) {
                $userDescription = $row['userdesc'];
            };
            $counter++;
        }
    }
    return $userDescription;
}

function getRandomUserName($randomUser) {
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $username = "";

    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($counter == $randomUser) {
                $username = $row['username'];
            };
            $counter++;
        }
    }
    return $username;
}

function getRandomUserIMG($randomUser) {
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $imageid = "";

    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($counter == $randomUser) {
                $imageid = $row['imageid'];
            };
            $counter++;
        }
    }
    return $imageid;
}

function getRandomUserLikes($randomUser) {
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $likes = 6;

    $counter = 0;

    if ($result->num_rows > 0) {
    	while ($row = $result->fetch_assoc()) {
    		 
            if ($counter == $randomUser) {
                $likes = $row['likes'];
            };
            $counter++;
  	
   
}
}
 return $likes;
}

function likeUser($thisUser) {
session_start();	
    $db = getX10Connection();

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);

    $counter = 0;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($counter == $thisUser) {
                $sql2 = "UPDATE users SET likes = likes + 1 WHERE username = '{$row['username']}' ";
                $db->query($sql2);
                $_SESSION['liked' . $thisUser] = 1;
                echo  $_SESSION['liked' . $thisUser];

            };
            $counter++;
        }
    }
}