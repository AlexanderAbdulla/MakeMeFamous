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


$sql = "SELECT username, emailaddress FROM users";
$result = $db->query($sql);
$found = false;

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $currentusername = $row['username'];
        $currentemailaddress = $row['emailaddress'];
        if ((strcmp($currentusername, $_POST["username"]) == 0) || (strcmp($currentemailaddress, $_POST["email"]) == 0)) {
            $found = true;
        }
    }
}

if(!$found) {

	$_SESSION['notUnique'] = "it IS unique";

    mysqli_query($db, "
        INSERT INTO users(
          username,
          emailaddress
        ) VALUES (
          '{$_POST['username']}',
          '{$_POST['email']}'
        );"
    ) or die(mysqli_error($db));

    $_SESSION['notUnique'] = "";
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['currentUser'] = $_POST['username'];
    header('Location: index.php');

} else {
    unset($_SESSION['notUnique']);
    $_SESSION['notUnique'] = "THIS IS NOT UNIQUE";
    echo  $_SESSION['notUnique'];
    header('Location: signup.php');

}
