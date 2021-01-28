<?php
session_start();

include '../inc/accessBDD.php';

$errors=[];

if (isset($_POST['connexion'])) {
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez entrer votre pseudo';
    }
    if (empty($_POST['motDePasse'])) {
        $errors['motDePasse'] = 'Veuillez entrer le mot de passe';
    }
    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];


    if (count($errors) === 0) {
        $query = "SELECT userName, motDePasse FROM Clients WHERE userName = ? AND motDePasse = ?";
        $stmt = $dbh->prepare($query);
        
        $stmt->bind_param('ss',$username, $password);


        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();

            var_dump($user);

            if ($password == $user['motDePasse']) { // if password matches
                $stmt->close();

                $_SESSION['idClient'] = $user['idClient'];
                $_SESSION['userName'] = $user['userName'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['message'] = 'Vous êtes connecté !';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);

            } else { // if password does not match
                $errors['login_fail'] = "Les informations sont incorrectes";
                echo $errors['login_fail'];
            }
        } else {
            $_SESSION['message'] = "Erreur de base de données";
            $_SESSION['type'] = "alert-danger";
        }
    }
}