<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';




 $perPage = 3;
 $psl = 1;
 if (array_key_exists("psl",$_GET)){
  $psl = $_GET["psl"];
 }
$filter = null;
 if (array_key_exists("year",$_GET)){
   $filter = $_GET['year'];
   //dd($filter);
 }


$movies = getPage($psl,$filter); //dd($movies);
$pageCount = ceil($movies[1]/$perPage);
// $movies = getAll();

include 'index.view.php';
