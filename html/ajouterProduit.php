<?php include_once('ajouteBDD.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajouter un ptoduit</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/produit.css">
    <link rel="stylesheet" href="../css/homepage.css">
</head>

<body>
<?php require_once '../mutualisation/header2.php'?>

<div class="container">
    <div class="row">
        <div class="col-4 offset-md-4 form-div">

            <form action="ajouterProduit.php" method="post" enctype="multipart/form-data">

                <?php if (!empty($msg)): ?>

                    <?php echo $msg; ?>

                <?php endif; ?>

                <div class="form-group text-center" style="position: relative;" >

                    <input type="text" placeholder="titre" name="nomProduit" class="form-control mb-3 mt-3">


            <span class="img-div">
              <div class="text-center img-placeholder"  onClick="triggerClick()">
                <h4>Ajoute un image</h4>
              </div>
                <img src="" onClick="triggerClick()" id="produitDisplay" name="image">

            </span>

                    <label for="myImg">Sélectionner une photo</label>
                    <input type="file"  accept=".jpg, .jpeg, .png" name="produitImage" onChange="displayImage(this)" id="produitImage" class="form-control" style="display: none;">

            </div>

                <select name="categorie" id="categorie" class="form-control mb-3">
                    <option value="">-- chosir la categorie --</option>
                    <option value="1">Vetement</option>
                    <option value="2">Jouets</option>
                    <option value="3">Nourriture</option>
                    <option value="4">Beauté</option>
                    <option value="5">High-Tech</option>
                    <option value="6">Maison</option>
                    <option value="7">Autres</option>
                </select>

                <textarea name="description" class="form-control mb-3" rows="8" placeholder="etat ou description du produit"></textarea>


                <div class="form-group">
                    <button type="submit" name="saveProduit" class="btn btn-primary btn-block">Valider</button>
                    <button  class="btn btn-secondary btn-block" onclick="annul()">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
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

    function annul(e){
        e.preventDefault();
       // confirm('annuler l\'enregistrement?');
        //let annuler = confirm('annuler l\'enregistrement?')

       // if(annuler==true){
         //   document.getElementsByName('image').="";
           // document.get
       // }
    }
</script>