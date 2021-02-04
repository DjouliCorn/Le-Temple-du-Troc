<?php 

//include './inc/accessBDD.php'; 
?>


<!DOCTYPE html>
<html lang="en">

<?php
    $path = "";
    $path .="/php/FoodTROC/client/form_login.php";

    $pathIndex = "";
    $pathIndex .="/php/FoodTROC/index.php";
    


    function is_session_started(){   
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '5.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
    }


    // $username1 = $_SESSION['username'];
    // $pass = $_SESSION['motDePasse'];
    // var_dump($username1);
    // var_dump($pass);


//     $mdp = "";
//     $userNameVerif = "";
//     $queryUserName = "SELECT * FROM Clients WHERE userName = $username1 ";
//     //$resultatUsername = mysqli_query($dbh, $queryUserName);

//     foreach ($resultatUsername as $elt) {
//     $userNameVerif = $elt['userName'];
//     $mpd = $elt['motDePasse'];
//  }

//  if($userNameVerif == $username1 && password_verify($pass, $mdp)
//($userNameVerif != $username && !password_verify($_SESSION['motDePasse'], $mdp)) ?>

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
                            <a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo $errors['motDePasse'];?> </a>
                            <a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo $errors['pseudo'];?> </a>
                            <a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo $errors['userName']; ?> </a>
                            <a id="navLink" class="nav-link" href="<?php echo $path ?>"> <?php echo $errors['motDePasse']; ?> </a> 
                     </div>       
                    <div class="nav-item">
						<a class="navLink" href="#">
					        <?php
                            echo $username;
					        ?>
						</a>
                        </ul>
                        </li>
						<ul id="listeMenu">
							<li><a href="../client/profilClient.php">Mon profil</a></li>
							<li><a href="../produit/listProduitsDuClient.php">Mes produits</a></li>
							<li><a href="../messagerie/messagerie.php">Mes messages</a></li>
							<li><a href="../client/form_parametre.php">Mes paramètres</a></li>
							<li><a href="../client/deconnexion.php">Se déconnecter</a></li>
						</ul>
					</div>
                
                    }
                }
            }   
        }
    }

    <?php $dbh = null; ?>
}

							
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