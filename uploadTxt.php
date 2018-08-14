<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-24
 * Time: 11:21 AM
 */
session_start();
$_SESSION['userDesc'] = $_POST['descTxt'];
include_once "db.php";
$db = getX10Connection();





mysqli_query($db, "
        UPDATE users
        SET userdesc = '{$_SESSION['userDesc']}'
        WHERE username = '{$_SESSION['currentUser']}';
        "
) or die(mysqli_error($db));

//header('Location: index.php');

echo $_POST['descTxt'];
