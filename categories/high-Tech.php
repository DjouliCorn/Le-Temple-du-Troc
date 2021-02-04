<?php
//session_start();
require_once("../connexionBDD/connexion.php");
//$_SESSION['idClient'];
//echo 'session:' . $_SESSION['idClient'];
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
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/produit.css">
</head>
<body>



<?php
//if(!empty($_SESSION['idClient'])){
//	require_once '../client/header.php';
//}

require_once '../client/header.php'?>
<div class="container mt-5"  id="afficheDesProduits">
	<?php
	$product_array = $db_handle->runQuery("SELECT idProduit, idClient, nomProduit, descProduit, url1Image FROM Produits, Categories WHERE Produits.idCat = Categories.idCat AND Categories.nomCat ='High-Tech' ");
	if (!empty($product_array)) {
		foreach($product_array as $produit){
			?>
			<div id="grid-item">

				<div class="product-image"><img width="150" height="180" src="../images/<?php echo $produit["url1Image"]; ?>"/></div>
				<div class="product-tile-footer">
					<div class="product-title"><?php echo $produit["nomProduit"]; ?></div>

				</div>
				<a href="../produit/afficherLeProduit.php?id=<?=$produit['idProduit']?>">
					<div>
						<img height="30" width="30" src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMnB0IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im0yNTYgNTEyYy0xNDEuMTY0MDYyIDAtMjU2LTExNC44MzU5MzgtMjU2LTI1NnMxMTQuODM1OTM4LTI1NiAyNTYtMjU2IDI1NiAxMTQuODM1OTM4IDI1NiAyNTYtMTE0LjgzNTkzOCAyNTYtMjU2IDI1NnptMC00ODBjLTEyMy41MTk1MzEgMC0yMjQgMTAwLjQ4MDQ2OS0yMjQgMjI0czEwMC40ODA0NjkgMjI0IDIyNCAyMjQgMjI0LTEwMC40ODA0NjkgMjI0LTIyNC0xMDAuNDgwNDY5LTIyNC0yMjQtMjI0em0wIDAiLz48cGF0aCBkPSJtMzY4IDI3MmgtMjI0Yy04LjgzMjAzMSAwLTE2LTcuMTY3OTY5LTE2LTE2czcuMTY3OTY5LTE2IDE2LTE2aDIyNGM4LjgzMjAzMSAwIDE2IDcuMTY3OTY5IDE2IDE2cy03LjE2Nzk2OSAxNi0xNiAxNnptMCAwIi8+PHBhdGggZD0ibTI1NiAzODRjLTguODMyMDMxIDAtMTYtNy4xNjc5NjktMTYtMTZ2LTIyNGMwLTguODMyMDMxIDcuMTY3OTY5LTE2IDE2LTE2czE2IDcuMTY3OTY5IDE2IDE2djIyNGMwIDguODMyMDMxLTcuMTY3OTY5IDE2LTE2IDE2em0wIDAiLz48L3N2Zz4=" />

					</div>
				</a>

			</div>
			<?php
		}
	}
	?>
</div>
</body>
</html>