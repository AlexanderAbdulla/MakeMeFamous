<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-03-24
 * Time: 4:41 PM
 */
session_start();
$test = array (
    'elementOne' => "hello world",
    'elementTwo' => "shit",
);
echo json_encode($test);
?>