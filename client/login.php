<?php
session_start();
include '../inc/accessBDD.php';
$errors = [];
if (isset($_POST['connexion'])) {
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez entrer votre pseudo';
    }
    if (empty($_POST['motDePasse'])) {
    }
    $username = $_POST['pseudo'];
        $errors['motDePasse'] = 'Veuillez entrer le mot de passe';
        
    $password = $_POST['motDePasse'];
    echo $username;
    echo $password;
    echo "error : ".count($errors);
    if (count($errors) === 0) {

        $resultat = mysqli_query($dbh,$query);
        $query = "SELECT userName, motDePasse FROM clients WHERE userName = '".$username."'";
        foreach ($resultat as $elt){
            if($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])){
                require_once 'indexClient.php';
                echo 'Vous êtes connecté.' ;
                echo "ça marche poooooo";
            } else {
            }     
        }
        $dbh = null;
}
    }