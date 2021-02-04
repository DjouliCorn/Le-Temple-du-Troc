<?php
session_start();
session_destroy();
$_SESSION['username'] = NULL;
$pathIndex = "";
$pathIndex .="/projetWeb/FoodTROC/index.php";
header('location: '.$pathIndex.'');
exit;
?>