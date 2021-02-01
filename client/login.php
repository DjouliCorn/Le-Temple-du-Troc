<?php

  session_start();
  

include '../inc/accessBDD.php';

$errors = [];

if (isset($_POST['connexion'])) {
    
    if (empty($_POST['pseudo'])|| empty($_POST['motDePasse'])) {
        include './form_login.php';
        $errors['pseudo'] = 'Veuillez entrer vos informations';
        $errors['motDePasse'] = 'Veuillez entrer vos informations';
        echo '<p style="text-align: center">'. $errors['pseudo'].'</p>';
    }
    /*else if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez entrer votre pseudo';      
        echo '<p style="text-align: center">'.$errors['pseudo'].'</p>';
    }

    else if (empty($_POST['motDePasse'])) {
        $errors['motDePasse'] = 'Veuillez entrer le mot de passe';
        echo $errors['motDePasse'];
    }*/
    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];
    $_SESSION['username'] = $username;
    $_SESSION['motDePasse'] = $password;


    if (count($errors) === 0) {

        $query = "SELECT * FROM Clients WHERE userName = '".$username."'";

        $resultat = mysqli_query($dbh,$query);

        foreach ($resultat as $elt){

            if($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])){
                
                header('location: indexClient.php');          
                echo 'Vous êtes connecté.' ;

            } else {
                include './form_login.php';
                echo "mot de passe ou nom d'utilisateur erroné";

            }     
        }

        $dbh = null;
    }
}

?>
