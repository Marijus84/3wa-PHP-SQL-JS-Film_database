<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

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
   if(isset($_POST['submit'])){

     $username = ($_POST['username']);
     $password = ($_POST['password']);
     $passconf =($_POST['passconf']);
     $email = ($_POST['email']);
     if (!$username || !$password || !$passconf || !$email){
       echo "Fill in all fields";
     } else {
       if(strlen($username) > 32 || strlen($username) < 3){
         echo "Username must be between 3 and 32 characters long";
       } else {
         $num = count(getUsers($username));
         if ($num == 1) {
           echo "Your username is already taken";
         } else {
           if(strlen($password) > 32 || strlen($password) < 5){
           echo "Password must be between 5 and 32 characters long";
         } else {
           if($password != $passconf) {
             echo "Passwords do not match";
           } else {
             $checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
             if (!preg_match($checkemail, $email)) {
               echo "E-mail is not valid, must be name@server.lt!";
             } else {
               $num1 = count(getEmails($email));
               if ($num1 == 1) {
                 echo "Email is already taken";
               } else {
                 $nowTime = date('U');
                 $code =  md5($username).$nowTime;
                 addUser($username, $password, $email, $nowTime);
                 echo "registration succesful";

                 mail($email,'registration confirmation', "Thank you for registering to us ".$username.",\n\nHere is your activation link. If the link doesn't work copy and paste it into your browser address bar.\n\nhttp://www.yourwebsitehere.co.uk/activate.php?code=".$code, 'From: noreply@youwebsitehere.co.uk');
                  header('Location: usersOnline.php');
               }
             }
           }
         }

         }
       }
     }

   }

   ?>
   <body>

     <div class="container">
       <section>
           <form action="register.php" method="POST">
             <div class="form-group">
               <label >Username</label>
               <input type="text" class="form-control" name = "username" placeholder="Username" >
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Password</label>
               <input type="password" name = "password" class="form-control"  placeholder="Password">
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">Confirm password</label>
               <input type="password" name = "passconf" class="form-control"  placeholder="Password">
             </div>
             <div class="form-group">
               <label for="exampleInputPassword1">email</label>
               <input type="email" name = "email" class="form-control"  placeholder="Password">
             </div>
             <button type="submit" name = "submit" class="btn btn-primary">Register</button>
             <p>
             <a href="index.php"><button type="button" class="bot btn btn-info">Return to main page</button></a>
           </form>
       </section>

       </div>
   </body>
 </html>
