<?php
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
    <header id="nav">
        <div id="flex-header">
            <div>
                <h1 id="titre"><a href="<?php echo $pathIndex ?>">Le temple du troc</a></h1>
            </div>
            <div>
                <form class="d-flex justify-content-center">
                    <input id="search-bar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />

                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>

        </div>

        
			<div id="menuClient" class="nav d-flex align-items-end flex-column">

					<div>
						<ul class="nav d-flex align-items-end flex-column">
							<li class="nav-item">
                            <?php

$errors = [];

if(empty($_SESSION['idClient'])) {

        ?><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter';?> </a></li><?php
    }

if (isset($_POST['connexion'])) {

    if (empty($_POST['pseudo']) || empty($_POST['motDePasse'])) {
        $errors['pseudo'] = 'Se connecter';
        $errors['motDePasse'] = 'Se connecter';
        ?><li class="nav-item"><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter';?> </a></li><?php
    }

    $username = $_POST['pseudo'];
    $password = $_POST['motDePasse'];
    $_SESSION['username'] = $username;
    $_SESSION['motDePasse'] = $password;

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
                ?><li class="nav-item"><a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo 'Se connecter'; ?> </a></li> </ul>
                <?php
            }
            
            if (count($errors) === 0) {
                
                if (($elt['userName'] == $username) && (password_verify($password, $elt['motDePasse']))) {
                    ?></div>
                    <div class="nav-item">
						<a class="navLink" href="#"><ul><li>
					        bonjour
						</li></ul></a>
                        
						<!-- <ul id="listeMenu">
							<li><a href="../client/profilClient.php">Mon profil</a></li>
							<li><a href="../produit/listProduitsDuClient.php">Mes produits</a></li>
							<li><a href="../messagerie/messagerie.php">Mes messages</a></li>
							<li><a href="../client/form_parametre.php">Mes paramètres</a></li>
							<li><a href="../client/deconnexion.php">Se déconnecter</a></li>
						</ul> -->
					</div>
                    </div>
                <?php
                    }
                } 
            }   
        }

    }  
}

  
 ?>


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

<script type="text/javascript">

function changePath() {
  var a = document.querySelector("#navLink");
  a.removeAttribute("href");
  a.setAttribute("href", "./form_login.php");
}

function path(){

        window.location.href ='http://localhost:63342/projetWeb/FoodTROC/index.php?_ijt=25vbh0nmsaoqjo4rdb7n042kof';


}
        
</script>



</html>