<?php
//session_start();
//echo $_SESSION['idClient'];

$msg = "";
$msg_class = "";
$error ="";
//include '../inc/accessBDD.php';

if (isset($_POST['saveProduit'])) {
    // for the database
    $nomProduit = $_POST['nomProduit'];

    $description = stripslashes($_POST['description']);
    $categorie =  $_POST['categorie'];
    $produitImageName = time() . '-' . $_FILES["produitImage"]["name"];

    // For images upload
    $target_dir = "../images/";
    $target_file = $target_dir . basename($produitImageName);

        var_dump($target_file);

    // VALIDATION
    // validate images size. Size is calculated i Bytes
    if($_FILES['produitImage']['size'] > 2000000){
        $msg = "Image size should not be greated than 200Kb";
        $msg_class = "la taille d'image est trop grande";
    }else {  

        echo "error:" . $error;
        // Upload images only if no errors
        if (empty($error)) {

            echo $idClient . $description . $nomProduit;
            var_dump($_FILES["produitImage"]["tmp_name"]);

            if (move_uploaded_file($_FILES["produitImage"]["tmp_name"], $target_file)) {
                $idClient = $_SESSION['idClient'];
                //echo $idClient;
                $sql = "INSERT INTO Produits SET idClient='$idClient', url1Image='$produitImageName', descProduit='$description', nomProduit='$nomProduit', idCat='$categorie'";
                if (mysqli_query($dbh, $sql)) {
                    $msg .= "Votre produit " . $nomProduit . " est bien enregistrer";
                    $msg_class = "alert-success";
	                header('location:listProduitsDuClient.php');

                }// else {
                //   $msg = "There was an error in the database";

                //  }
            } else {
                $error = "There was an error uploading the file";
                $msg = "veuillez ajouter une image";
                $msg_class = "alert-danger";
            }
        }
    }

}else if(isset($_POST['annuler'])){
	header('location:listProduitsDuClient.php');
}

?>