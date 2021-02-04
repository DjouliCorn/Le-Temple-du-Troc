<?php

session_start();
require_once("../inc/accessBDD.php");

$pathMessage = "";
$pathMessage .= "/projetWeb/FoodTROC/messagerie/messagerie.php";

if(isset($_POST['envoyer'])) {
	$frClient = $_SESSION['idClient'];
	$idProd = $_SESSION['idProduit'];
	$clientTo = $_SESSION['idClientTo'];
	$content = $_POST['reponse'];


	$sql = "INSERT INTO Messages SET fromClient = '$frClient', toClient='$clientTo', content='$content', idProduit='$idProd' ";

	$result = mysqli_query($dbh, $sql);


	exit(header('location: ../messagerie/messagerie.php'));
}else if(isset($_POST['annuler'])){

	exit(header('location: ../messagerie/messagerie.php'));

}



?>