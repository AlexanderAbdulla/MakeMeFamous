<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-24
 * Time: 12:02 PM
 */

session_start();

session_destroy();
header('Location: login.php');

?>