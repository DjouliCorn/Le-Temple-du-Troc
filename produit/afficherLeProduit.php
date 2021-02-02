<?php 
session_start();
$_SESSION['idProduit']=$_GET['id'];
echo 'session:' . $_SESSION['idClient'];
//require_once("../inc/accessBDD.php");
define('DB_HOST', 'localhost');
define('DB_USER', 'base4reco');
define('DB_PASSWORD', 'base4reco');
define('DB_NAME', 'TrocDeTrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');



$connexion = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $connexion->prepare("SELECT * FROM Produits WHERE idProduit = ? ");
$query->execute([$_GET['id']]);
$produit= $query->fetch();

$_SESSION['toIdClient'] = $produit['idClient'];



?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/produit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>

<?php require_once '../mutualisation/header2.php';?>


<div class="container mt-5">

    <div class="row">
        <div class="col-4 offset-md-4">

			<?php if(empty($_SESSION['idClient'])){ ?>

				<p class="alert alert-info mt-5" role="alert">ça vous intéresse? connecter-vous pour en voir plus</p>
			<?php } ?>

            <div class="product-image"><img width="200" height="220" src="../images/<?php echo $produit["url1Image"]; ?>"/></div>
            <div class="product-title"><?php echo $produit["nomProduit"]; ?></div>
            <div class="product-title"><?php echo $produit["descProduit"]; ?></div>


<?php //echo $_SESSION['idClient'];

if( !empty($_SESSION['idClient'] ) && $_SESSION['idClient'] != $produit['idClient'] ) { ?>

            <div>
                <form action = "envoyerMessage.php" method = "post" class="mt-5">
                    <label for="" class="form-label">Message:</label><br>
                    <textarea class="form-group" name="message" id="" cols="30" rows="4" placeholder="Je suis interesé(e) par votre produit...."></textarea><br>
                    
                        <button type="submit" name="envoyer" class="btn btn-primary">Envoyer</button>
                   
                </form>
            </div>

 <?php
}
?>

        </div>
    </div>
</div>

</body>
</html>