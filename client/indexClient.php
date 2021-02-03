<?php
session_start();
$pathClient = "";
$pathClient .="/projetWeb/FoodTROC/client/acceuilClient.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/indexClient.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

    <title>Troc de Trucs</title>

</head>

<body>
    <header id="nav">
        <div id="flex-header">
            <div>
                <h1 id="titre"><a href="<?php echo $pathClient ?>">Le temple de troc</a></h1>
            </div>
            <div>
                <form class="d-flex justify-content-center">
                    <input id="search-bar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />

                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <nav id="dropdown">
                <div id="menuClient" class="nav d-flex align-items-end flex-column">
                    <div class="nav-item">
                        <a class="navLink" href="#">
                            <?php
                            echo $_SESSION['username'];
                            ?>
                        </a>
                
                    <ul id="listeMenu">
                        <li><a href="profilClient.php">Mon profil</a></li>
                        <li><a href="../produit/listProduitsDuClient.php">Mes produits</a></li>
                        <li><a href="../messagerie/messagerie.php">Mes messages</a></li>
                        <li><a href="form_parametre.php">Mes paramètres</a></li>
                        <li><a href="../client/deconnexion.php">Se déconnecter</a></li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>

        <nav>
            <ul class="nav justify-content-center mt-5">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Vetements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Jouets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Nourriture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Beauté</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">High-Tech</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Maison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Autres</a>
                </li>
            </ul>
        </nav>
    </header>


</body>

</html>