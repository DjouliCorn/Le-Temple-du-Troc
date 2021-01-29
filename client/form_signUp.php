<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/authentification.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" 
    crossorigin="anonymous" />
    <title>Création d'un compte</title>
</head>

<body>
    <?php include 'signUp.php' ?>

    <form action="signUp.php" method="POST" id="authentification">
        <label>Pseudo</label>
        <input type="text" name="pseudo" id="pseudo" />

        <label>Nom</label>
        <input type="text" name="nomClient" id="nomClient" />

        <label>Prénom</label>
        <input type="text" name="prenomClient" id="prenomClient" />

        <label>Date de naissance</label>
        <input type="date" name="dateNaiss" id="dateNaiss" />

        <label>Ville</label>
        <input type="text" name="ville" id="ville" />

        <label>E-mail</label>
        <input type="email" name="email" id="email" />

        <label>Mot de passe</label>
        <input type="password" name="motDePasse" id="motDePasse" minlength="5"/>

        <label>Vérifier le mot de passe</label>
        <input type="password" name="motDePasseConf" id="motDePasse" minlength="5"/>

        <input type="submit" name="signUpBtn" value="S'inscrire" />


    </form>
</body>

</html>