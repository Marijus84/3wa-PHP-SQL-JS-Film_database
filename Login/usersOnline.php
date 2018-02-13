<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';



 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Register</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


   </head>

   <?php

   if(strcmp($_SESSION['uid'],"") == 0){
        echo "you need to be logged to get in";
   }else {
     $time = date('U')+50;
     updating($time,$_SESSION['uid']);
   }
    ?>





  <b>Users Online:</b>


  <?php
  $online = online();
  foreach ($online as $element) {
    ?><br><?php
    echo $element['username']." - ";
      }


   ?>



   <body>

     <div class="container">
       <section>
         <a href="logout.php"><button type="button" class="bot btn btn-info">Logout</button></a>

         <a href="../index.php"><button type="button" class="bot btn btn-success">Go to film page</button></a><p>
         <a href="index.php"><button type="button" class="bot btn btn-info">Return to main page</button></a>

       </section>

       </div>
   </body>
 </html>
