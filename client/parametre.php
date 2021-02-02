<?php

include '../inc/accessBDD.php';
include 'indexClient.php';


$userName = $_SESSION['username'];
$oldPassword = $_SESSION['motDePasse'];
$submittedOldPassword = $_POST['ancienMotDePasse'];
$motDePasse1 = $_POST['gestionMDP1'];
//$motDePasse2 = $_POST['gestionMDP2'];
$motDePasse2 = password_hash($_POST['gestionMDP2'], PASSWORD_DEFAULT);

var_dump($userName);
var_dump($submittedOldPassword);
var_dump($oldPassword);
var_dump($motDePasse1);
var_dump($motDePasse2);

/*$query1 = "SELECT * FROM clients WHERE userName = '" . $_SESSION['username'] . "'";

$motDePasse = "";

$resultat1 = mysqli_query($dbh, $query1);

foreach ($resultat1 as $elt) {

    $motDePasse = $elt['motDePasse'];
}

$dbh = null;*/


if(($submittedOldPassword == $oldPassword) && (password_verify($motDePasse1, $motDePasse2))){
    $sql3 = "UPDATE clients SET motDePasse = '$motDePasse2' WHERE userName = '".$userName."'";
    /*$stmt = $dbh->prepare($sql3);
    
    $stmt->bind_param('s', $motDePasse2);
    $result = $stmt->execute();*/

 /*   $stmt3 = $dbh->prepare($sql3);
    $result3 = $stmt3->execute();
    $resultat3 = mysqli_query($dbh, $sql3);*/

    /*$stmt3 = $dbh->prepare($sql3);
    $stmt3->bind_param('s', $motDePasse2);
    $result3 = $stmt3->execute();*/
    //$resultat3 = mysqli_query($dbh, $sql3);

        
    echo "Oui c gud";
} else {
    echo "Nope";
}



?>