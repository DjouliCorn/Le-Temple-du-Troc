<?php session_start();
//require_once("../connexionBDD/connexion.php");
//$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/produit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />
    <title>Document</title>
</head>
<body>

<?php require_once '../mutualisation/header2.php'?>
    <?php
    define('DB_HOST', 'localhost');
    define('DB_USER', 'base4reco');
    define('DB_PASSWORD', 'base4reco');
    define('DB_NAME', 'img-upload');
    define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = $dbh->prepare("SELECT * FROM users WHERE id = ? ");
    $query->execute([$_GET['id']]);
    $produit= $query->fetch();
?>

<div class="container mt-5">
    <div class="product-image"><img src="../images/<?php echo $produit["image"]; ?>"/></div>
    <div class="product-tile-footer">
        <div class="product-title"><?php echo $produit["nomProduit"]; ?></div>
        <div class="product-title"><?php echo $produit["descProduit"]; ?></div>
        <div class="product-price"><?php echo $produit["categorie"]; ?></div>
    </div>



<div>
    <form class="mt-5">
        <label for="" class="form-label">Message:</label><br>
        <textarea class="form-group" name="" id="" cols="30" rows="4" placeholder="Je suis interesé(e) par votre produit...."></textarea><br>
        <button class="btn btn-primary">Envoyez</button>
    </form>
</div>

</div>


<script>
    document.getElementById('header').innerHTML = loadPage('header.html');
</script>
</body>
</html>