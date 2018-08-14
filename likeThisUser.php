<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-24
 * Time: 4:01 PM
 */

session_start();
include_once "db.php";
echo $_SESSION['viewingUser'];
likeUser($_SESSION['viewingUser']);
$newUserLikes = getRandomUserLikes($_SESSION['viewingUser']);
$result = array (
    'newUserLikes' => $newUserLikes
);
echo json_encode($result);





