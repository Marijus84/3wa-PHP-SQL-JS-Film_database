<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </head>
  <body>
    <?php


    if(isset($_POST['submit'])){

      $username = $_POST['username'];
      $password = $_POST['password'];

      if(!$username || !$password){
        echo "Fill in username and password";
      } else {
        $num = count(getUsers($username));
        if ($num == 0) {
          echo "Your username does not exist";
        }
        else {
          $num = count(check($username, $password));
        }
        if ($num == 0) {
          echo "Password and username does not match!";
        }
        else {
          $row = getUser($username);
          if ($row['active'] != 1 ) {
            echo "Your account is not activated!";
          } else {$_SESSION['uid'] = $row['id'];
            echo "You have logged in";
            $time = date('U')+50;
            setTime($time);
            header('Location: usersOnline.php');
          }
          }
        }
      }
     ?>

    <div class="container">
      <section>
          <form action="index.php" method="POST">
            <div class="form-group">
              <label >Username</label>
              <input type="text" class="form-control" name = "username" placeholder="Username" >
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name = "password" class="form-control"  placeholder="Password">
            </div>
            <button type="submit" name = "submit" class="btn btn-primary">Login</button>
            <p>
            <a href="register.php"><button type="button" class="bot btn btn-info">Register</button></a>
            <a href="reminder.php"><button type="button" class="bot btn btn-info">Forgot password</button></a>
          </form>
      </section>

      </div>
  </body>
</html>
