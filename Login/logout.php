<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';



 ?>


   <?php

   if(strcmp($_SESSION['uid'],"") == 0){
        echo "you need to be logged in to get out";
   }else {
     stopped($_SESSION['uid']);
   }
   session_destroy();

   echo "You have logged out";
   header('Refresh:1; url =  index.php');
    ?>
