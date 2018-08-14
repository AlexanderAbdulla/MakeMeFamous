<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-16
 * Time: 2:31 PM
 */

session_start();

include_once "db.php";


// Create connection
$db = getX10Connection();

echo "the post data is: ";
echo $_POST["username"];
echo $_POST["email"];


$sql = "SELECT username, emailaddress FROM users";
$result = $db->query($sql);
$found = false;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentusername = $row['username'];
        $currentemailaddress = $row['emailaddress'];
        if ((strcmp($currentusername, $_POST["username"]) == 0) && (strcmp($currentemailaddress, $_POST["email"]) == 0)) {
            $found = true;
             echo "THIS NAME EXISTS YOU HACKER";
    
        }
    }
}

if(!$found) {

    $_SESSION['userNotFound'] = "This username password combo is invalid";
    header('Location: login.php');
    

} else {
    unset($_SESSION['userNotFound']);
    $_SESSION['currentUser'] = $_POST['username'];
    $_SESSION['username'] = $_POST['username'];
    header('Location: index.php');
    
}




