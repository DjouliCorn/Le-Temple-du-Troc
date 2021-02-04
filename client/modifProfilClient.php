<?php

include "../inc/accessBDD.php";
include "./header.php";

$userName = $_SESSION['username'];
$nomClient = $_REQUEST['nomClient'];
$prenomClient = $_REQUEST['prenomClient'];
$villeClient = $_REQUEST['villeClient'];
$dateNaiss = $_REQUEST['dateNaiss'];
$emailClient= $_REQUEST['emailClient'];

$sql2 = "UPDATE Clients SET nomClient = '$nomClient', prenomClient = '$prenomClient', ville = '$villeClient',
dateNaiss = '$dateNaiss', email = '$emailClient' WHERE userName = '".$userName."'";
 $stmt2 = $dbh->prepare($sql2);
 var_dump($stmt2);
 $result2 = $stmt2->execute();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification effectué</title>
</head>
<body>
    <h1>Modification effectuée</h1>
    <a href="./profilClient.php">Retour aux modifications</a>
</body>
</html>
