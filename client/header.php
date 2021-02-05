<?php
if (empty($_SESSION['username']) == TRUE) {
    session_start();
}

// !! adapt path according to own settings also in deconnexion.php !!
//Nick's : /php/FoodTROC/
$path = "";
$path .= "/projetWeb/FoodTROC/client/form_login.php";

$pathIndex = "";
$pathIndex .= "/projetWeb/FoodTROC/produit/afficherListDesProduits.php";

$pathDeco = "";
$pathDeco .= "/projetWeb/FoodTROC/client/deconnexion.php";

$pathProfil = "";
$pathProfil .= "/projetWeb/FoodTROC/client/profilClient.php";

$pathParam = "";
$pathParam .= "/projetWeb/FoodTROC/client/form_parametre.php";

$pathListeProduits = "";
$pathListeProduits .= "/projetWeb/FoodTROC/produit/listProduitsDuClient.php";

$pathMessagerie = "";
$pathMessagerie .= "/projetWeb/FoodTROC/messagerie/messagerie.php";

$pathLogo = "";
$pathLogo .= "/projetWeb/FoodTROC/logo/logo_TT.png";

if (empty($dbh) == TRUE) {
    include '../inc/accessBDD.php';
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/indexClient.css" />
    <link rel="stylesheet" href="../css/homepage.css" />
    <title>Header</title>
</head>

<body>
<header id="nav" class="p-3 mb-2 bg-secondary">
    <div id="flex-header" style="align-items: center; margin-top: 2em;" >
        <div>
            
            <a href="<?php echo $pathIndex ?>"><img src="<?php echo $pathLogo ?>" alt="Logo"></a>
        </div>
        <div>
            <form action="../produit/search.php" method="get" class="d-flex justify-content-center">
                <input id="search-bar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="searchInput" />

                <button class="btn btn-outline-light" name="search" type="submit">
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

        ?><a id="navLink" class="nav-link text-white" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
        }

    else if (isset($_POST['connexion']) || !empty($_SESSION['idClient'])) {


    if (empty($_SESSION['username']) || empty($_SESSION['motDePasse'])) {
    $errors['pseudo'] = 'Se connecter';
    $errors['motDePasse'] = 'Se connecter';
    ?><li class="nav-item"><a id="navLink" class="nav-link text-white" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
    }

    $username = $_SESSION['username'];
    $password = $_SESSION['motDePasse'];


    if (count($errors) === 0) {

    $query = "SELECT * FROM Clients WHERE userName = '" . $username . "'";

    $resultat = mysqli_query($dbh, $query);

    if (mysqli_num_rows($resultat) === 0) {

    $errors['userName'] = 'Se connecter';
?><li class="nav-item"><a id="navLink" class="nav-link text-white" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li><?php
} else {

foreach ($resultat as $elt) {
    $_SESSION['idClient'] = $elt['idClient'];

    if ($elt['userName'] != $username || !password_verify($password, $elt['motDePasse'])) {

        $errors['motDePasse'] = 'Se connecter';
?><li class="nav-item"><a id="navLink" class="nav-link text-white" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li>
    </ul>
    <?php

}

if (count($errors) === 0) {

    if (($elt['userName'] == $username) && (password_verify($password, $elt['motDePasse']))) {


    ?> <a class="navLink text-decoration-none font-weight-bold text-white" href="#">
                                <?php

echo $_SESSION['username'];
                                ?>
                            </a>
                            <ul id="listeMenu">
                                <li><a class="text-decoration-none text-white" href="<?php echo $pathProfil ?>">Mon profil</a></li>
                                <li><a class="text-decoration-none text-white" href="<?php echo $pathListeProduits ?>">Mes produits</a></li>
                                <li><a class="text-decoration-none text-white" href="<?php echo $pathMessagerie ?>">Mes messages</a></li>
                                <li><a class="text-decoration-none text-white" href="<?php echo $pathParam ?>">Mes paramètres</a></li>
                                <li><a class="text-decoration-none text-white" href="<?php echo $pathDeco ?>">Se déconnecter</a></li>
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
                    <a class="nav-link active text-white" aria-current="page" href="../categories/vetements.php">Vetements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/jouets.php">Jouets</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/nourriture.php">Nourriture</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/beaute.php">Beauté</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/high-Tech.php">High-Tech</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/maison.php">Maison</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="../categories/autresCategorie.php">Autres</a>
                </li>
            </ul>
        </nav>
    </header>
</body>

</html>