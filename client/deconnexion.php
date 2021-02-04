<?php
session_start();
session_destroy();
$_SESSION['username'] = NULL;
$pathIndex = "";
$pathIndex .="/ProjetCode/index.php";
header('location: '.$pathIndex.'');
exit;
?>