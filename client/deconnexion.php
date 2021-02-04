<?php
session_start();
session_destroy();
$pathIndex = "";
$pathIndex .="/ProjetCode/index.php";
header('location: '.$pathIndex.'');
exit;
?>