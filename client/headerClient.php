<?php

session_start();

    $path = "";
    $path .="/php/FoodTROC/client/form_login.php";

    $pathIndex = "";
    $pathIndex .="/php/FoodTROC/index.php";

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>Header</title>
</head>

<body>

<div class="nav-item">
						<a class="navLink" href="#">
					        <?php
					        echo $_SESSION['username'];
					        ?>
						</a>
						<ul id="listeMenu">
							<li><a href="../client/profilClient.php">Mon profil</a></li>
							<li><a href="../produit/listProduitsDuClient.php">Mes produits</a></li>
							<li><a href="../messagerie/messagerie.php">Mes messages</a></li>
							<li><a href="form_parametre.php">Mes paramètres</a></li>
							<li><a href="../client/deconnexion.php">Se déconnecter</a></li>
						</ul>
					</div>


</body>
</html>