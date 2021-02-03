<?php
session_start();
include '../inc/accessBDD.php';

$_SESSION['idProd'] = $_GET['id'];

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
<?php require_once '../client/header.php'?>

<div class="container">
	<div class="row">

		<div class="col-4 offset-md-4 mt-4 form-div">
			<h3 class="text-center mt-3 pb-2">Modifier le produit</h3>

			<form action="modifTraitement.php" method="post" enctype="multipart/form-data">

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

				<select  name="categorie" id="categorie" class="form-control mb-3">
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