<?php
include './functions/auth.php';
include './functions/crud.php';
include './functions/dbconnections.php';


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$teste2 = getFreguesiaById(1);

print_r($teste2);
?>