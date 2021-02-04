<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$_SESSION['idCLient'];

    //adapt path according to own settings
    $path = "";
    $path .="/php/FoodTROC/client/form_login.php";

    $pathIndex = "";
    $pathIndex .="/php/FoodTROC/produit/afficherListDesProduits.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/homepage.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
	<link rel="stylesheet" href="../css/indexClient.css" />
	<title>Header</title>
</head>

<body>
    <header id="nav">
        <div id="flex-header">
            <div>
                <h1 id="titre"><a href="<?php echo $pathIndex ?>">Le temple de troc</a></h1>
            </div>
            <div>
                <form action="../produit/search.php" method="get" class="d-flex justify-content-center">
                    <input id="search-bar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search"  name="searchInput"/>

                    <button class="btn btn-outline-success" name="search" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <!--<div>
                <ul class="nav d-flex align-items-end flex-column">
                    <li class="nav-item">
                        <a id="navLink" class="nav-link" href="<?php echo $path ?>"> Se connecter</a>
                    </li>
                </ul>
            </div>-->
			<nav id="dropdown">
			<div id="menuClient" class="nav d-flex align-items-end flex-column">

		        <?php if(empty($_SESSION['idClient'])){?>
					<div>
						<ul class="nav d-flex align-items-end flex-column">
							<li class="nav-item">
								<a id="navLink" class="nav-link" href="<?php echo $path ?>"> Se connecter</a>
							</li>
						</ul>
					</div>
		        <?php } else{?>

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
							<li><a href="../client/form_parametre.php">Mes paramètres</a></li>
							<li><a href="../client/deconnexion.php">Se déconnecter</a></li>
						</ul>
					</div>

		        <?php } ?>

			</div>
		</div>
        </div>

        <nav>
            <ul class="nav justify-content-center mt-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../categories/vetements.php">Vetements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/jouets.php">Jouets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/nourriture.php">Nourriture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/beaute.php">Beauté</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/high-Tech.php">High-Tech</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/maison.php">Maison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../categories/autresCategorie.php">Autres</a>
                </li>
            </ul>
        </nav>
    </header>
</body>

<script type="text/javascript">

function changePath() {
  var a = document.querySelector("#navLink");
  a.removeAttribute("href");
  a.setAttribute("href", "./form_login.php");
}
        
</script>



</html>