<?php

session_start();
require_once("../inc/accessBDD.php");


$frClient = $_SESSION['idClient'];
$idProd =$_SESSION['idProduit'];
$clientTo = $_SESSION['idClientTo'];
$content = $_POST['reponse'];


$sql = "INSERT INTO Messages SET fromClient = '$frClient', toClient='$clientTo', content='$content', idProduit='$idProd' ";
var_dump($sql);
$result = mysqli_query($dbh, $sql);


header('location : messagerie.php');


?>