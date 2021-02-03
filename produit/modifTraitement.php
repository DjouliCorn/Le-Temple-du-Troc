<?php
session_start();

/************  update  ***************/
echo $_SESSION['idProd'];

$msg = "";
$msg_class = "";
include '../inc/accessBDD.php';



if (isset($_POST['saveProduit'])) {


	echo "produit#2:".$_SESSION['idProd'];
	// for the database
	$nomProduit = $_POST['nomProduit'];

	$description = stripslashes($_POST['description']);
	$categorie = $_POST['categorie'];
	$produitImageName = time() . '-' . $_FILES["produitImage"]["name"];


	echo $nomProduit;
	echo $categorie;
	echo $produitImageName;
	echo $description;

	// For images upload
	$target_dir = "../images/";
	$target_file = $target_dir . basename($produitImageName);
	echo $target_file;
	// VALIDATION
	// validate images size. Size is calculated in Bytes
	if ($_FILES['produitImage']['size'] > 2000000) {
		$msg = "Image size should not be greated than 20Kb";
		$msg_class= "alert-danger";

	} else{
		//echo "ar".$error;
		// Upload images only if no errors
		if (empty($error)) {
			//echo "eroor apres if" .$error;
			if (move_uploaded_file($_FILES["produitImage"]["tmp_name"], $target_file)) {
				//$idClient =$_SESSION['idClient'];
				$idProd = $_SESSION['idProd'];

				//$idProd =$_GET['id'];

				'<br>';
				echo $nomProduit;
				echo $categorie;
				echo $produitImageName;
				echo $description;

				echo "produit#3:".$idProd;
				$sql = "UPDATE Produits SET url1Image='$produitImageName', descProduit='$description', nomProduit='$nomProduit', idCat='$categorie' WHERE idProduit = '$idProd'";
				var_dump($sql);

				if (mysqli_query($dbh, $sql)) {
					$msg .= "Votre produit " . $nomProduit . " est bien modifier";
					$msg_class = "alert-success";
					echo "succes";
					var_dump(mysqli_query($dbh, $sql));

					header('location: ../produit/listProduitsDuClient.php');

				}// else {
				//   $msg = "There was an error in the database";

				//  }
			} else {
				//$error = "There was an error uploading the file";
				$msg = "veuillez ajouter une image";
				$msg_class = "alert-danger";
			}
		}

	}
}



?>
