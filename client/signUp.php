<?php
session_start();

include '../inc/accessBDD.php';

$username = "";
$email = "";
$nom = "";
$prenom = "";
$dateNaiss = "";
$ville = "";
$errors = [];


// SIGN UP USER
if (isset($_POST['signUpBtn'])) {
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Pseudo requis';
    }
    if (empty($_POST['email'])) {
        $errors['email'] = 'Email requis';
    }
    if (empty($_POST['motDePasse'])) {
        $errors['motDePasse'] = 'Mot de passe requis';
    }
    if (isset($_POST['motDePasse']) && $_POST['motDePasse'] !== $_POST['motDePasseConf']) {
        $errors['motDePasseConf'] = 'The two passwords do not match';
    }

    $username = $_POST['pseudo'];
    $email = $_POST['email'];
    $nom =  $_POST['nomClient'];
    $prenom =  $_POST['prenomClient'];
    $dateNaiss =  $_POST['dateNaiss'];
    $ville =  $_POST['ville'];
    $password = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT); //encrypt password

    if (count($errors) === 0) {
        $query = "INSERT INTO Clients SET userName=?, email=?, nomClient=?, prenomClient=?, dateNaiss=?, ville=?, motDePasse=?";
        $stmt = $dbh->prepare($query);
        $stmt->bind_param('sssssss', $username, $email, $nom, $prenom, $dateNaiss, $ville, $password);
        $result = $stmt->execute();

        include './form_login.php';
    }
}


