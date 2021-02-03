<?php

session_start();


include '../inc/accessBDD.php';

$errors = [];

if (isset($_POST['connexion'])) {

    if (empty($_POST['pseudo']) || empty($_POST['motDePasse'])) {
        include './form_login.php';
        $errors['pseudo'] = 'Veuillez entrer vos informations';
        $errors['motDePasse'] = 'Veuillez entrer vos informations';
        echo '<p style="text-align: center">' . $errors['pseudo'] . '</p>';
    }

    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];
    $_SESSION['username'] = $username;
    $_SESSION['motDePasse'] = $password;

    if (count($errors) === 0) {

        $query = "SELECT * FROM Clients WHERE userName = '" . $username . "'";

        $resultat = mysqli_query($dbh, $query);

        var_dump($resultat);

        if (mysqli_num_rows($resultat) === 0) {
            include './form_login.php';
            $errors['userName'] = 'Nom d`utilisateur ou mot de passe incorrect';
            echo '<p style="text-align: center">' . $errors['userName'] . '</p>';
        } else {
            
            foreach ($resultat as $elt) {
	            $_SESSION['idClient'] = $elt['idClient'];
            if ($elt['userName'] != $username || !password_verify($password, $elt['motDePasse'])) {
                include './form_login.php';
                $errors['motDePasse'] = 'Nom d`utilisateur ou mot de passe incorrect';
                echo '<p style="text-align: center">' . $errors['motDePasse'] . '</p>';
            }

            if (count($errors) === 0) {
                if ($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])) {
                    header('location: acceuilClient.php');
                    echo 'Vous êtes connecté.';
                }
            }
        }
    }

        $dbh = null;
    }
}
