<?php
session_start();

define('DB_HOST', 'localhost');
define('DB_USER', 'base4reco');
define('DB_PASSWORD', 'base4reco');
define('DB_NAME', 'TrocDeTrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

echo $_GET['id'];
$idClient = $_SESSION['idClient'];
echo "client:". $idClient;


$idMess=$_GET['id'];

$fromClient = $_SESSION['idClient'];




echo "avant sql";
$connexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$sql ="SELECT  Produits.nomProduit,Clients.idClient,Messages.idProduit, Clients.email FROM Produits, Messages, Clients WHERE Messages.idMess = $idMess AND Messages.fromClient = Clients.idClient AND Messages.idProduit = Produits.idProduit";



//$sql = "INSERT INTO tutorials_inf(name)VALUES ('".$_POST["name"]."')";

$messages=$connexion->query($sql);

$result = $messages->fetch_array(MYSQLI_ASSOC);

var_dump($result);


echo "nomProd: ".$result["nomProduit"].'<br>';
echo "email: ".$result["email"].PHP_EOL;
echo "idProduit: ".$result["idProduit"]."<br>";
echo "toClient: ".$result["idClient"]."<br>";



if(isset($_POST['envoyer'])){

	//$fromClient;
//$toClient;
//$content;
//$idProduit;
   
  $idProduit = $result["idProduit"];

  $content = $_POST['reponse'];
  $toClient = $result["idClient"];
  
  
    $sql ="INSERT INTO Messages SET idProduit=$idProduit, content=$content, toClient=$toClient,fromClient=$idClient )";
  
    
  
    echo 'id' . $idClient.PHP_EOL;
    echo 'content'.$content.PHP_EOL;

    echo 'to'.$toClient.PHP_EOL;
    echo $idClient;
  
    $messages=$connexion->query($sql);
  
     var_dump($messages);
    echo "insert success";
  
  }
  




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
<?php require_once '../mutualisation/header2.php'?>

<div class="col-8 offset-md-2 mt-5">


<form action="repondreMessage.php" method="POST" class="form-control">
    <div class="mb-3 row" >
      <label for="staticEmail" class="col-sm-2 col-form-label">Nom Produit:</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php   echo $result["nomProduit"]?>">

      </div>
    </div>
    <div class="mb-3 row" >
      <label for="staticEmail" class="col-sm-2 col-form-label">Email:</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $result["email"]?>">
      </div>
    </div>


    <div class="mb-3 row" >
        <label for="staticEmail" class="col-sm-2 col-form-label">Message:</label>
        <textarea class="m-2" cols="50" rows="10"  name="reponse" placeholder=" Ecrire votre reponse.."></textarea>
    </div>
	<div class="ml-auto mb-3" >
		<button class="btn btn-primary" name="envoyer" > Envoyer</button>
    </div>

</form>
</div>
</body>
</html>