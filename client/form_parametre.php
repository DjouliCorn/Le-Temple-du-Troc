<?php

include 'indexClient.php';
include '../inc/accessBDD.php';

$query1 = "SELECT * FROM Clients WHERE userName = '" . $_SESSION['username'] . "'";

$motDePasse = "";

$resultat1 = mysqli_query($dbh, $query1);

foreach ($resultat1 as $elt) {

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
        <form action="parametre.php" method="POST">
            <label> Mot de passe :</label>
            <input name="mdpClient" class="mdpClient" type="password" value="<?php echo $_SESSION['motDePasse']; ?>" readonly />
            <br>

            <div class="mdpModif"></div>

            <div id="modifMDP">
            <input type="text">
            </div>



            <input type="button" value="Modifier le mot de passe" onclick="btnModifClientMdp(); this.onclick=null" />
            <input type="submit" value="Valider/Submit" />

        </form>
    </div>

    <div id="division"></div>

    <script type="text/javascript">
        function btnModifClientMdp() {

            //     var br = document.createElement("br");
            //     let x = document.querySelector(".mdpModif");
            //     let labelAncienMdp = document.createElement("label");
            //     labelAncienMdp.textContent = "Ancien mot de passe";
            //     let ancienMdp = document.createElement("input");
            //     ancienMdp.setAttribute("type", "password");
            //     x.appendChild(labelAncienMdp);
            //     x.appendChild(ancienMdp);
            //     ancienMdp.append(br);

            //     let labelNouveauMdp = document.createElement("label");
            //     labelNouveauMdp.textContent = "Nouveau mot de passe";
            //     let nouveauMdp = document.createElement("input");
            //     nouveauMdp.setAttribute("type", "password");
            //     x.appendChild(labelNouveauMdp);
            //     x.appendChild(nouveauMdp);
            //     nouveauMdp.append(br);

            //     let labelConfirmMdp = document.createElement("label");
            //     labelConfirmMdp.textContent = "Confirmer le nouveau mot de passe";
            //     let confirmMdp = document.createElement("input");
            //     confirmMdp.setAttribute("type", "password");
            //     x.appendChild(labelConfirmMdp);
            //     x.appendChild(confirmMdp);
            //     x.appendChild(br);

            var text = document.getElementById("demo");
            if (text.style.display === "none") {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }

        }

        function btnSubmitModifMdpt() {
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