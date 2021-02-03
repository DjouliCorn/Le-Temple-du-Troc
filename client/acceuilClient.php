<?php
session_start();
$_SESSION['idCLient'];
require_once "indexClient.php";

require_once "../produit/afficherListDesProduits.php";
?>