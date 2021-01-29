<?php
$msg = "";
$msg_class = "";
$conn = mysqli_connect("localhost", "base4reco", "base4reco", "img-upload");


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
        //$msg_class = "alert-danger";
    }
    // check if file exists
    if(file_exists($target_file)) {
        $msg = "File already exists";
        //$msg_class = "alert-danger";
    }
    // Upload images only if no errors
    if (empty($error)) {
        if(move_uploaded_file($_FILES["produitImage"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO users SET image='$produitImageName', description='$description', nomProduit='$nomProduit', categorie='$categorie'";
            if(mysqli_query($conn, $sql)){
                $msg = "Image uploaded and saved in the Database";
                //$msg_class = "alert-success";
            } else {
                $msg = "There was an error in the database";
                $msg_class = "database error";
            }
        } else {
            $error = "There was an error uploading the file";
            $msg = "data has not been registred";
        }
    }
}
?>
