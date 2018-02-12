<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';
$commentNew = $_POST;

$filmID = $_GET['id'];

addComment($commentNew, $filmID);



 ?>
