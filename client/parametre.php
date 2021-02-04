<?php

session_start();
include 'header.php';

if (empty($dbh) == TRUE){
    include '../inc/accessBDD.php';
}



$userName = $_SESSION['username'];
$oldPassword = $_SESSION['motDePasse'];
$submittedOldPassword = $_POST['ancienMotDePasse'];
$motDePasse1 = $_POST['gestionMDP1'];
$motDePasse2 = password_hash($_POST['gestionMDP2'], PASSWORD_DEFAULT);



if(($submittedOldPassword == $oldPassword) && (password_verify($motDePasse1, $motDePasse2))){
    $sql3 = "UPDATE Clients SET motDePasse = '$motDePasse2' WHERE userName = '".$userName."'";

    
    if ($dbh->query($sql3) === TRUE){

        echo 'Mise à jour du nouveau mot de passe ';
       $_SESSION['motDePasse'] = $motDePasse1;
    } else {
        $dbh->error;
    }        
    
} else {

        echo 'Mot de passe erroné';
}

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du mot de passe</title>
</head>
<body>
    <a href="./form_parametre.php">Retour aux modifications</a>
</body>
</html>