<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';



$count = count(getAll());
 $perPage = 3;
 $pageCount = ceil($count/$perPage);
 $psl = 1;
 if (array_key_exists("psl",$_GET)){
  $psl = $_GET["psl"];
 }



$movies = getPage($psl);
// $movies = getAll();

include 'index.view.php';
