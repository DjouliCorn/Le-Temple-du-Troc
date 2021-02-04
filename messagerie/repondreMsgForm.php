<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'base4reco');
define('DB_PASSWORD', 'base4reco');
define('DB_NAME', 'TrocDeTrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');



echo "avant sql";

/*** pour recuperer le message avec id qui viens sur la page messagerie.php	****/
$idMess=$_GET['id'];
$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql ="SELECT  Produits.nomProduit,Clients.idClient,Messages.idProduit, Clients.email FROM Produits, Messages, Clients WHERE Messages.idMess = $idMess AND Messages.fromClient = Clients.idClient AND Messages.idProduit = Produits.idProduit";

//$fromClient = ;
//$toClient;
//$content;
//$idProduit;


//$sql = "INSERT INTO tutorials_inf(name)VALUES ('".$_POST["name"]."')";

$messages=$connexion->query($sql);

$result = $messages->fetch_array(MYSQLI_ASSOC);



/******		session pour recuperer a la page reponseTraitement	******/
$_SESSION['idClientTo'] = $result['idClient'];
$_SESSION['idProduit']= $result['idProduit'];



  




?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/produit.css">
   <title>Document</title>
</head>
<body>
<?php require_once '../client/header.php'?>


<div class="col-4 offset-md-4 mt-5" >


<form action="reponseTraitement.php" method="POST" >
    <div class="mb-3 " >
      	<label>Nom Produit: &nbsp;&nbsp;&nbsp;</label>
        <label><?php   echo $result["nomProduit"]?></label>

    </div>
    <div class="mb-3" >
        <label>Email: &nbsp;&nbsp;&nbsp;</label>
		<label> <?php echo $result["email"]?></label>
    </div>


    <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Message:</label>
        <textarea class="m-2" cols="30" rows="10"  name="reponse" placeholder=" Ecrire votre reponse.."></textarea>
    </div>
	<div class="mb-3 float-right " >
		<button type="submit" class="btn btn-primary" name="submit" > Envoyer</button>
    </div>

</form>
</div>
</body>
</html>