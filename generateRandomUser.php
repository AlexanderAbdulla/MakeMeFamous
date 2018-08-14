<?php
session_start();
    include_once "db.php";
    $db = getX10Connection();


    $userNumber = getUserPosition();
    $totalUsers = getUserCount();
    
    
    $randomUser = generateRandomUserNumber();
    
    $randomUserDesc = getRandomUserDesc($randomUser);
    $randomUserName = getRandomUserName($randomUser);
    $randomUserIMG = getRandomUserIMG($randomUser);
    $randomUserLikes = getRandomUserLikes($randomUser);
   // $_SESSION['viewingUser'] =  $randomUser;
    
    // $_SESSION[$userNumber] = $userNumber;
      $userImg = getRandomUserImg($randomUser);
    
      var_dump($_SESSION['likePositions']);
      
      ?>