<?php
session_start();
require_once("../connexionBDD/connexion.php");




$db_handle = new DBController();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajouter un ptoduit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/homepage.css">
    <link rel="stylesheet" href="../css/produit.css">
</head>
<body >


<?php require_once '../mutualisation/header2.php'?>

<div class="container mt-5"  id="afficheDesProduits">

    <?php
    $client =$_SESSION['idClient'];
    $product_array = $db_handle->runQuery("SELECT idProduit, nomProduit, url1Image FROM Produits, Clients  WHERE Produits.idClient = Clients.idClient AND Clients.idClient = '$client' ORDER BY nomProduit");

    if (!empty($product_array)) {
        foreach($product_array as $produit){
    ?>

            <div id="grid-item">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <div class="product-image"><img width="150" height="180" src="../images/<?php echo $produit["url1Image"]; ?>"/></div>
					<div class="product-title"><?php echo $produit["nomProduit"]; ?></div>
                </a>
				<a href="afficherLeProduit.php?id=<?=$produit['idProduit']?>">
					<button class="btn btn-secondary mt-2">voir plus</button>
				</a>
            </div>
            <?php
        }
    }
    ?>


	<!-- dialog box pour modifier et supprimer -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					quest-ce que vous-voulez faire?
				</div>
				<div class="modal-footer">


					<a href="modifierUnProduit.php?id=<?=$produit['idProduit']?>">
						<button type="button" class="btn btn-primary" onclick="modifier()">Modifier</button>
					</a>
					<button type="button" class="btn btn-danger">Supprimer</button>
				</div>
			</div>
		</div>
	</div>

</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


<script>
	function modifier(){
	    window.location.href= 'http://localhost:63342/htdocs/projetWeb/FoodTROC/produit/modifierUnProduit.php?_ijt=60o70p0hus90fhl4pl6v7am59k';
	}
</script>
</body>


</html>