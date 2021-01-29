<?php

include 'indexClient.php';
include '../inc/accessBDD.php';

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

<div>

<ul>
    <li>Nom d'utilisateur :</li>
    <li><?php echo $_SESSION['username']; ?></li>
    <li>Nom :</li>
    <li>Prénom :</li>
    <li>Ville :</li>
    <li>Date de naissance :</li>
    <li>E-mail :</li>
    <li>Mot de passe : (à crypter pour modif)</li>

</ul>

</div>


</body>

</html>