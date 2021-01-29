<?php 
    require './login.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../css/homepage.css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

	<title>Troc de Trucs</title>

</head>

<body>
    <header id="nav">
        <div id="flex-header">
            <div>
                <h1 id="titre">Le temple de troc</h1>
            </div>
            <div>
                <form class="d-flex justify-content-center">
                    <input id="search-bar" class="form-control me-2" type="search" placeholder="Search"
                        aria-label="Search" />

                    <button class="btn btn-outline-success" type="submit">
                        Search
                    </button>
                </form>
            </div>
            <div>
                <ul class="nav d-flex align-items-end flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="./client/form_login.php">
                    <?php
                        echo $username;
                    ?>
                    
                    </a>
                    </li>
                </ul>
            </div>
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