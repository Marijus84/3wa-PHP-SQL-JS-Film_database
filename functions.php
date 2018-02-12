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
   $url = 'mysql:host=localhost;dbname=movies';
   $pdo = new PDO($url, $user, $pass);
   $pdo->exec('SET NAMES UTF8');
   return ($pdo);
 }


function getPage($page, $filter) {
  $pdo = connectToDb();
  $offset = $page * 3-3;
  if($filter){
    $query = $pdo->prepare("SELECT * FROM filmai WHERE year='$filter' LIMIT $offset,3");
    $count = count(getAllbyYear($filter));
  }
  else {
    $count = count(getAll());
    $query = $pdo->prepare("SELECT * FROM filmai LIMIT $offset,3");
  }
  $query->execute();
  $movies = $query->fetchAll(PDO::FETCH_ASSOC);
    return $test = [$movies,$count];
}

function getAllbyYear($filter){
$pdo = connectToDb();
$query = $pdo->prepare("SELECT * FROM filmai WHERE year='$filter'");
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);
  return $movies;
}

function getAll(){

$pdo = connectToDb();
$query = $pdo->prepare('SELECT * FROM filmai');
$query->execute();
$movies = $query->fetchAll(PDO::FETCH_ASSOC);
  return $movies;
}

function getOne($id){

$pdo = connectToDb();
$query = $pdo->prepare("SELECT * FROM filmai WHERE id = '$id'");
$query->execute();
$film = $query->fetch(PDO::FETCH_ASSOC);
  return $film;
}


function addComment($coming, $id){
$pdo = connectToDb();
$sql = 'INSERT INTO Comments (film_id, name, comments)
   VALUES ("'.$id.'", "'.$coming['name'].'",
  "'.$coming['comment'].'")';
$query = $pdo->prepare($sql);
$query->execute();
echo "Prideta";
header('Location: detailed_view.php'.$id);

}

function addNew($coming){

$pdo = connectToDb();
$sql = 'INSERT INTO filmai (title, quality, duration,
  year, description, image, trailer)
   VALUES ("'.$coming['title'].'", "'.$coming['quality'].'",
  "'.$coming['duration'].'", "'.$coming['year'].'", "'.$coming['description'].'",
  "'.$coming['image'].'", "'.$coming['trailer'].'")';
$query = $pdo->prepare($sql);
$query->execute();
echo "Prideta";
header('Location: index.php');

}

function update($coming){

$pdo = connectToDb();
$query = $pdo->prepare ('UPDATE filmai SET
title = :title,
quality = :quality,
duration = :duration,
year = :year,
description = :description,
image = :image,
trailer = :trailer
WHERE id = :id');

$query->execute([
  'title' =>$coming['title'],
  'quality' => $coming['quality'],
  'duration' => $coming['duration'],
  'year' => $coming['year'],
  'description' => $coming['description'],
  'image' => $coming['image'],
  'trailer' => $coming['trailer'],
  'id' => $coming['id']
]);

header('Location: index.php');

}


function del($id) {
$pdo = connectToDb();
$query = $pdo->prepare("DELETE FROM filmai WHERE id = '$id'");
$query->execute();
header("Refresh:2;url=index.php");

}

function searchMovie($search){

  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT title, id FROM filmai WHERE title LIKE '_%{$search}%'");
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($results);

}

function getComments($id){
  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT * FROM Comments WHERE film_id = '$id'");
  $query->execute();
  $film = $query->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($film);
}

function searchID($search){

  $pdo = connectToDb();
  $query = $pdo->prepare("SELECT id FROM filmai WHERE title LIKE '%{$search}%'");
  $query->execute();
  $results = $query->fetch(PDO::FETCH_ASSOC);
  // header('Location: detailed_view.php');
  
  echo json_encode($results);

}



 ?>
