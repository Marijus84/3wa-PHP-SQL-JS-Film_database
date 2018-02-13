<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';

//$photos = $_FILES['image'];
//move_uploaded_file($photos['tmp_name'], 'img/'.$photos['name']);
$movieToAdd = $_POST;
//dd($photos);
//array_push($movieToAdd[$image] = 'img/'.$photos['name']);
//dd($movieToAdd);
addNew($movieToAdd);



 ?>


 <!-- INSERT INTO filmai (title, quality, duration,
   year, description, image, trailer)
    VALUES ("test", "HD",
   "120", "2012-02-12","aa",
   "aa", "aa")

  INSERT INTO filmai (title, quality, duration,
  year, image, trailer)
   VALUES ("Test", "HD",
  "125", "2017-12-31",
  "lala", "lala"") -->
