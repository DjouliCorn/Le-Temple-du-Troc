<?php

include 'header.php';
include '../inc/accessBDD.php';

$query1 = "SELECT * FROM Clients WHERE userName = '" . $_SESSION['username'] . "'";

$nom = "";
$prenom = "";
$ville = "";
$dateNaiss = "";
$email = "";
$motDePasse = "";

$resultat1 = mysqli_query($dbh, $query1);

foreach ($resultat1 as $elt) {
    $nom = $elt['nomClient'];
    $prenom = $elt['prenomClient'];
    $ville = $elt['ville'];
    $dateNaiss = $elt['dateNaiss'];
    $email = $elt['email'];
    $motDePasse = $elt['motDePasse'];
}

$dbh = null;


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
        <form action="modifProfilClient.php" method="POST">
            <label> Nom d'utilisateur :</label>
            <?php echo $_SESSION['username']; ?>
            <br>
            <label>Nom :</label>
            <input name="nomClient" class="updateClient" type="text" value="<?php echo $nom; ?>" readonly />
            <br>
            <label>Prénom :</label>
            <input name="prenomClient" class="updateClient" type="text" value="<?php echo $prenom; ?>" readonly />
            <br>
            <label>Ville :</label>
            <input name= "villeClient" class="updateClient" type="text" value="<?php echo $ville; ?>" readonly />
            <br>
            <label>Date de naissance :</label>
            <input name="dateNaiss" class="updateClient" type="text" value="<?php echo $dateNaiss; ?>" readonly />
            <br>
            <label>E-mail :</label>
            <input name="emailClient" class="updateClient" type="text" value="<?php echo $email; ?>" readonly />
            <br>
            <input type="button" value="Modifier" onclick="btnModifClient()" />
            <input type="submit" value="Valider/Submit" click="btnSubmitClient()"/>

        </form>
    </div>

    <div id="division"></div>

    <script type="text/javascript">
        function btnModifClient() {

            var x = document.getElementsByClassName("updateClient");
            for (var i = 0; i < x.length; i++) {
                x[i].removeAttribute("readonly")
            }
        }

        function btnSubmitClient(){
            var a = document.createElement("p");
            a.innerHTML = "<?php

                            echo "modif faite";
                            ?>";
            let division = document.querySelector("#division");
            division.append(a);

        }
    </script>

</body>

</html>