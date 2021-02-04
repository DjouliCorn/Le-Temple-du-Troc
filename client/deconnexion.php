<?php
session_start();
session_destroy();
$_SESSION['username'] = NULL;
$pathIndex = "";
$pathIndex .="/php/FoodTROC/index.php";
header('location: '.$pathIndex.'');
exit;
?>