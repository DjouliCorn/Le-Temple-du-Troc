<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/authentification.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous" />
    <title>Création d'un compte</title>
</head>

<body>

    <?php
    require_once 'header.php';
    ?>

	<form action="signUp.php" method="POST" id="authentification" >
		<div class="form-group col-md-2 border border-secondary p-4 mt-5">
			<label>Pseudo</label>
			<input type="text" name="pseudo" id="pseudo" class="form-control mb-3"/>

			<label>Nom</label>
			<input type="text" name="nomClient" id="nomClient" class="form-control mb-3"/>

			<label>Prénom</label>
			<input type="text" name="prenomClient" id="prenomClient" class="form-control mb-3"/>

			<label>Date de naissance</label>
			<input type="date" name="dateNaiss" id="dateNaiss" class="form-control mb-3"/>

			<label>Ville</label>
			<input type="text" name="ville" id="ville" class="form-control mb-3"/>

			<label>E-mail</label>
			<input type="email" name="email" id="email" class="form-control mb-3"/>

			<label>Mot de passe</label>
			<input type="password" name="motDePasse" id="motDePasse" minlength="5" class="form-control mb-3"/>

			<label>Vérifier le mot de passe</label>
			<input type="password" name="motDePasseConf" id="motDePasse" minlength="5" class="form-control" mb-3/>

			<input type="submit" name="signUpBtn" value="S'inscrire" class="btn btn-secondary mb-3" style="margin-top: 1em;"/>

		</div>
    </form>
</body>

</html>