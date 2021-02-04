<?php
session_start();
session_destroy();
$pathIndex = "";
$pathIndex .="/php/FoodTROC/index.php";
header('location: '.$pathIndex.'');
exit;
?>