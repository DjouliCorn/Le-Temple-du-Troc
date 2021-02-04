<?php
if (empty($_SESSION['username']) == TRUE) {
    session_start();
}

// !! adapt path according to own settings also in deconnexion.php !!
//Nick's : /php/FoodTROC/
$path = "";
$path .= "/php/FoodTROC/client/form_login.php";

$pathIndex = "";
$pathIndex .= "/php/FoodTROC/produit/afficherListDesProduits.php";

$pathDeco = "";
$pathDeco .= "/php/FoodTROC/client/deconnexion.php";

$pathProfil = "";
$pathProfil .= "/php/FoodTROC/client/profilClient.php";

$pathParam = "";
$pathParam .= "/php/FoodTROC/client/form_parametre.php";

$pathListeProduits = "";
$pathListeProduits .= "/php/FoodTROC/produit/listProduitsDuClient.php";

$pathMessagerie = "";
$pathMessagerie .= "/php/FoodTROC/messagerie/messagerie.php";

if (empty($dbh) == TRUE) {
    include '../inc/accessBDD.php';
}


?>


<!DOCTYPE html>
<html lang="en">

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
            <h1 id="titre"><a href="<?php echo $pathIndex ?>">Le temple du troc</a></h1>
        </div>
        <div>
            <form action="../produit/search.php" method="get" class="d-flex justify-content-center">
                <input id="search-bar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchInput" />

                <button class="btn btn-outline-success" name="search" type="submit">
                        Search
                </button>
                </form>
            </div>

            <nav id="dropdown">
                <div id="menuClient" class="nav d-flex align-items-end flex-column">

    <div>
        <ul class="nav d-flex align-items-end flex-column">
        <li class="nav-item">
            <?php

        $errors = [];

        if (empty($_SESSION['idClient'])) {

        ?><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
        }

    if (isset($_POST['connexion']) || !empty($_SESSION['idClient'])) {


    if (empty($_SESSION['username']) || empty($_SESSION['motDePasse'])) {
    $errors['pseudo'] = 'Se connecter';
    $errors['motDePasse'] = 'Se connecter';
    ?><li class="nav-item"><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
    }

    $username = $_SESSION['username'];
    $password = $_SESSION['motDePasse'];

    if (count($errors) === 0) {

    $query = "SELECT * FROM Clients WHERE userName = '" . $username . "'";

    $resultat = mysqli_query($dbh, $query);

    if (mysqli_num_rows($resultat) === 0) {

    $errors['userName'] = 'Se connecter';
?><li class="nav-item"><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
} else {

foreach ($resultat as $elt) {
    $_SESSION['idClient'] = $elt['idClient'];

    if ($elt['userName'] != $username || !password_verify($password, $elt['motDePasse'])) {

        $errors['motDePasse'] = 'Se connecter';
?><li class="nav-item"><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li>
    </ul>
    <?php

}

if (count($errors) === 0) {

    if (($elt['userName'] == $username) && (password_verify($password, $elt['motDePasse']))) {


    ?> <a class="navLink" href="#">
                                <?php

echo $_SESSION['username'];
                                ?>
                            </a>
                            <ul id="listeMenu">
                                <li><a href="<?php echo $pathProfil ?>">Mon profil</a></li>
                                <li><a href="<?php echo $pathListeProduits ?>">Mes produits</a></li>
                                <li><a href="<?php echo $pathMessagerie ?>">Mes messages</a></li>
                                <li><a href="<?php echo $pathParam ?>">Mes paramètres</a></li>
                                <li><a href="<?php echo $pathDeco ?>">Se déconnecter</a></li>
                            </ul>
<?php
                                }
                            }
                        }
                    }
                }
            }


    ?>

                    </div>
                </div>
            </nav>
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

</html>