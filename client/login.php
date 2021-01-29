<?php

  session_start();

include '../inc/accessBDD.php';

$errors = [];

if (isset($_POST['connexion'])) {
    
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez entrer votre pseudo';
    }

    if (empty($_POST['motDePasse'])) {
        $errors['motDePasse'] = 'Veuillez entrer le mot de passe';
    }
    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];

var_dump($errors);

   if (count($errors) === 0) {

        $dbh = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "SELECT userName, motDePasse FROM Clients WHERE userName = '".$username."'";

        $resultat = mysqli_query($dbh,$query);
        var_dump($resultat);

        foreach ($resultat as $elt){

            if($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])){
                require_once 'indexClient.php';
                echo 'Vous êtes connecté.' ;

            } else {
                include './form_login.php';
                echo "mot de passe ou nom d'utilisateur erroné";

            }     
        }

        $dbh = null;
    }
}

