<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'functions.php';
$movieToEdit = $_POST;
update($movieToEdit);



 ?>
