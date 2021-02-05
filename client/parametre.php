<?php

session_start();
include 'header.php';

if (empty($dbh) == TRUE) {
    include '../inc/accessBDD.php';
}

$userName = $_SESSION['username'];
$oldPassword = $_SESSION['motDePasse'];
$submittedOldPassword = $_POST['ancienMotDePasse'];
$motDePasse1 = $_POST['gestionMDP1'];
$motDePasse2 = password_hash($_POST['gestionMDP2'], PASSWORD_DEFAULT);



if (($submittedOldPassword == $oldPassword) && (password_verify($motDePasse1, $motDePasse2))) {
    $sql3 = "UPDATE Clients SET motDePasse = '$motDePasse2' WHERE userName = '" . $userName . "'";


    if ($dbh->query($sql3) === TRUE) {

        echo  '<p style="text-align:center">Mise à jour du nouveau mot de passe <br> ';
	    echo '<a style="text-align:center; text-decoration: none" href="./form_parametre.php">Retour aux modifications</a> </p>';

        $_SESSION['motDePasse'] = $motDePasse1;
        //exit(header('location : ../client/form_parametre.php'));

    } else {
        $dbh->error;
    }
} else {

    echo ' <p style="text-align:center"> Mot de passe erroné <br>';
	echo '<a style= "text-decoration: none" href="./form_parametre.php">Retour aux modifications</a></p>';
	//exit(header('location : ../client/form_parametre.php'));
}

?>

<!--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css" />
    <title>Modification du mot de passe</title>
</head>

<body>
    <a href="./form_parametre.php">Retour aux modifications</a>
</body>

</html>
-->