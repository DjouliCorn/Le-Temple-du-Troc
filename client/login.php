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

    var_dump($username);
    var_dump($password);


    if (count($errors) === 0) {
        $query = "SELECT userName, motDePasse FROM clients WHERE userName = '".$username."'";
        var_dump($query);
        $resultat = mysqli_query($dbh,$query);

        foreach($resultat as $elt){
            echo $elt ['userName'];
            echo $elt ['motDePasse'];

            if($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])){
                echo 'Vous êtes connecté.' ;
            } else {
                echo "ça marche poooooo";
            }     
        }

        $dbh = null;
    }
}

