<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';
$movieToAdd = $_POST;
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
