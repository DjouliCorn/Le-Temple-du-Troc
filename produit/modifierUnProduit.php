<?php

include '../inc/accessBDD.php';

$query = "SELECT * FROM Produits WHERE idProduit = ?";

define('DB_HOST', 'localhost');
define('DB_USER', 'base4reco');
define('DB_PASSWORD', 'base4reco');
define('DB_NAME', 'TrocDeTrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');
$conn = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*----nomProduit select/option----*/

$options_categorie = "";

$sql = "SELECT idCat, nomCat FROM Categories";

$resultat = $conn->query($sql);

while ( ($un_produit = $resultat->fetch(PDO::FETCH_ASSOC)) != FALSE) {

	// Traitement de chaque résultat qui est contenu dans la variable $un_produit
	$options_categorie.= '<option value="' . $un_produit['idCat'] . '">' . $un_produit['nomCat'] . '</option>';
}


/********	afficher les données	********/
$query = $conn->prepare("SELECT nomProduit, url1Image, descProduit, nomCat FROM Produits, Categories WHERE idProduit = ? AND Produits.idCat=Categories.idCat");
$query->execute([$_GET['id']]);
$produit= $query->fetch();


/************  update  ***************/


$msg = "";
$msg_class = "";
include '../inc/accessBDD.php';

if (isset($_POST['saveProduit'])) {
	// for the database
	$nomProduit = $_POST['nomProduit'];

	$description = stripslashes($_POST['description']);
	$categorie = $_POST['categorie'];
	$produitImageName = time() . '-' . $_FILES["produitImage"]["name"];

	// For images upload
	$target_dir = "../images/";
	$target_file = $target_dir . basename($produitImageName);
	echo $target_file;
	// VALIDATION
	// validate images size. Size is calculated in Bytes
	if ($_FILES['produitImage']['size'] > 200000) {
		$msg = "Image size should not be greated than 20Kb";
		$msg_class= "alert-danger";

	} else{

	// Upload images only if no errors
	if (empty($error)) {
		if (move_uploaded_file($_FILES["produitImage"]["tmp_name"], $target_file)) {
			//$idClient =$_SESSION['idClient'];
			$idProd = $_GET['id'];
			$sql = "UPDATE Produits SET url1Image='$produitImageName', descProduit='$description', nomProduit='$nomProduit', idCat='$categorie' WHERE idProduit = '$idProd'";
			if (mysqli_query($dbh, $sql)) {
				$msg .= "Votre produit " . $nomProduit . " est bien modifier";
				$msg_class = "alert-success";

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


<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/produit.css">
	<link rel="stylesheet" href="../css/homepage.css">
	<link rel="stylesheet" href="../css/dialogBox.css">
	<title>Document</title>
</head>
<body>
<?php require_once '../mutualisation/header2.php'?>

<div class="container">
	<div class="row">

		<div class="col-4 offset-md-4 mt-4 form-div">
			<h3 class="text-center mt-3 pb-2">Modifier le produit</h3>

			<form action="modifierUnProduit.php" method="post" enctype="multipart/form-data">

				<?php if (!empty($msg)): ?>
					<div class="alert <?php echo $msg_class?>" role="alert">
						<?php echo $msg;
						?></div>
				<?php endif; ?>

				<div class="form-group text-center" style="position: relative;" >
					<input type="text" placeholder="titre" name="nomProduit" class="form-control mb-3 mt-3" value="<?php echo $produit['nomProduit']; ?>">

					<span class="img-div">
		                <div class="text-center img-placeholder"  onClick="triggerClick()">
		                    <h4>Ajoute un image</h4>
		                </div>
		                <img src="../images/<?php echo $produit["url1Image"]; ?>" onClick="triggerClick()" id="produitDisplay" name="image" class="img-thumbnail">

                    </span>

					<label for="myImg">Sélectionner une photo</label>
					<input type="file"  accept=".jpg, .jpeg, .png" name="produitImage" onChange="displayImage(this)" id="produitImage" class="form-control" style="display: none;">

				</div>

				<select name="categorie" id="categorie" class="form-control mb-3">
					<option><?php echo $produit["nomCat"]; ?></option>
					<?php echo $options_categorie?>

				</select>

				<textarea id="desc" name="description" class="form-control mb-3" rows="8" placeholder="etat ou description du produit"><?php echo $produit["descProduit"]; ?></textarea>

				<div class="form-group">
					<button type="submit" name="saveProduit" class="btn btn-primary btn-block">Valider</button>
					<button  class="btn btn-secondary btn-block">Annuler</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
    function triggerClick(e) {
        document.querySelector('#produitImage').click();
    }
    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e){
                document.querySelector('#produitDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }

</script>

    </body>
</html>