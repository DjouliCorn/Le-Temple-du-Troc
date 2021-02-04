<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/authentification.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

    <title>Se connecter</title>

</head>

<body>

    <?php
    require_once 'header.php';
    ?>

	<form action="login.php" method="POST" id="authentification" class="mt-5">
		<div class="form-group col-md-2 border border-secondary p-4 pb-5">
			<div class="pseudo" style="padding: 0;margin-left: 0px;margin-right: 0px;">
				<label for="pseudo">Pseudo :</label>
				<input type="text" id="pseudo" name="pseudo" class="form-control" />
			</div>
			<div class="mdp">
				<label for="password">Mot de passe :</label>
				<input type="password" id="password" name="motDePasse" class="form-control"/>
			</div>

			<div>
				<input type="submit" id="submit" name="connexion" value="Se connecter" class="btn btn-secondary" style="margin-top: 1em; margin-bottom: 1em;"/>

				<a href="form_signUp.php" role="button" class="btn btn-outline-secondary btn-sm">Créer un compte</a>
			</div>
		</div>
	</form>


    <!--Valider l'existence du compte-->
    <!--Si le compte n'existe pas, donc renvoie sur se créer un compte-->
    <!--Se créer un compte-->
    <!--Mot de passe oublié-->


</body>

</html>