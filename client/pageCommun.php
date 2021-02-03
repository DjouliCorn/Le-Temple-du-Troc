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


if (count($errors) === 0) {

$dbh = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$query = "SELECT idClient, userName, motDePasse FROM Clients WHERE userName = '".$username."'";

$resultat = mysqli_query($dbh,$query);

var_dump($resultat);

//$_SESSION['idClient'] = $resultat['idClient'];

echo 'idclient:' . $_SESSION['idClient'];
foreach ($resultat as $elt){
$_SESSION['idClient'] = $elt['idClient'];

if($elt['userName'] == $username && password_verify($password, $elt['motDePasse'])){

require_once 'indexClient.php';



?>
<!doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width,  initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/produit.css">
	<title>Document</title>
</head>
<body>

<div class="container">
	<h1>Mes Produit</h1>
	<button class="btn btn-primary" onclick="ajouter()">Ajouter un produit</button>
	<button class="btn btn-primary" onclick="message()">Message</button>
</div>




<?php
}else {
	?>
		<!--- redirect to login.php --->
<?php
	echo "mot de passe ou nom d'utilisateur erroné";

}
}
$dbh = null;
}
}
?>

<script>
    function ajouter(){
        window.location.href ='../produit/ajouterProduit.php';

    }

    function message(){
        window.location.href='../messagerie/messagerie.php';
	}
</script>

</body>


</html>
