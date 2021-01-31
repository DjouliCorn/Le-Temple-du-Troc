<?php
session_start();
$msg = "";
$msg_class = "";
include '../inc/accessBDD.php';

if (isset($_POST['saveProduit'])) {
    // for the database
    $nomProduit = $_POST['nomProduit'];

    $description = stripslashes($_POST['description']);
    $categorie =  $_POST['categorie'];
    $produitImageName = time() . '-' . $_FILES["produitImage"]["name"];

    // For images upload
    $target_dir = "../images/";
    $target_file = $target_dir . basename($produitImageName);
    // VALIDATION
    // validate images size. Size is calculated in Bytes
    if($_FILES['produitImage']['size'] > 200000) {
        $msg = "Image size should not be greated than 200Kb";

    }
    // check if file exists
    if(file_exists($target_file)) {
        $msg = "File already exists";
        //$msg_class = "alert-danger";
    }
    // Upload images only if no errors
    if (empty($error)) {
        if(move_uploaded_file($_FILES["produitImage"]["tmp_name"], $target_file)) {
            $idClient =$_SESSION['idClient'];
            //echo $idClient;
            $sql = "INSERT INTO Produits SET idClient='$idClient', url1Image='$produitImageName', descProduit='$description', nomProduit='$nomProduit', idCat='$categorie'";
            if(mysqli_query($dbh, $sql)){
                $msg .= "Votre produit " . $nomProduit . " est bien enregistrer";
                $msg_class = "alert-success";

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
?>
