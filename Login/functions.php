<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function dd($data){
  echo "<pre>";
  die(var_dump($data));
  echo "</pre>";
}

function connectToDb() {
   $user = 'root';
   $pass = 'root';
   $url = 'mysql:host=localhost;dbname=loginTut';
   $pdo = new PDO($url, $user, $pass);
   $pdo->exec('SET NAMES UTF8');
   return ($pdo);
 }

function getUsers($username) {
  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT * FROM users WHERE username = '$username'");
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
}

function check($username,$password) {
  $pdo = connectToDb();
  $password = md5($password);
  $query = $pdo->prepare("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password'");

  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
}

function getUser($username) {
  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT * FROM users WHERE username = '$username'");

  $query->execute();
  $users = $query->fetch(PDO::FETCH_ASSOC);
  return $users;
}

function setTime($time) {
$pdo = connectToDb();
$query = $pdo->prepare("UPDATE users SET online = '$time' WHERE id = '".$_SESSION['uid']."'");
$query->execute();
}

function getEmails($email) {
  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT * FROM users WHERE email = '$email'");
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
}

function addUser($username, $password, $email, $nowTime){
  $pdo = connectToDb();
  $sql = 'INSERT INTO users (username, password, email, rtime, online, active)
     VALUES ("'.$username.'", "'.md5($password).'",
    "'.$email.'", "'.$nowTime.'", "'.$nowTime.'", "1")';
    dd($sql);
  $query = $pdo->prepare($sql);
  $query->execute();
}

function updating($time, $id){
  $pdo = connectToDb();
  $sql = "UPDATE users SET online = '$time' WHERE id = '$id'";
  $query = $pdo->prepare($sql);
  $query->execute();
}

function online(){
  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT * FROM users WHERE online > '".date('U')."'");
  $query->execute();
  $users = $query->fetchAll(PDO::FETCH_ASSOC);
  return $users;
}

function stopped($id)
{
  $time = date('U');
  $pdo = connectToDb();
  $sql = "UPDATE users SET online = '$time' WHERE id = '$id'";
  $query = $pdo->prepare($sql);
  $query->execute();

}



 ?>
