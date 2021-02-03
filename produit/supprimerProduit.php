<?php

session_start();
echo $_SESSION['idClient'];
require_once("../inc/accessBDD.php");

echo $_GET['id'];

$idProduit = $_GET['id'];

$sql="DELETE FROM Messages WHERE idProduit='$idProduit'";
$dbh->query($sql);

$sql="DELETE FROM Produits WHERE idProduit='$idProduit'";

$dbh->query($sql);
var_dump($dbh);
$dbh=null;


header('location: ../produit/listProduitsDuClient.php');
?>