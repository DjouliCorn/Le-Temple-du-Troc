<?php
session_start();
echo $_SESSION['idClient'];
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'trocdetrucs');
define('DB_DSN', 'mysql:dbname='.DB_NAME.';host='.DB_HOST.';port=3306;charset=UTF8');

$idClient = $_SESSION['idClient'];


echo $idClient;
$connexion = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql ="SELECT Messages.idMess,Messages.idProduit, Produits.nomProduit, Clients.email, Messages.content, Messages.createdAt FROM Produits, Messages, Clients WHERE Messages.toClient = $idClient AND Messages.fromClient = Clients.idClient AND Messages.idProduit = Produits.idProduit ORDER BY Messages.createdAt";


$messages=$connexion->query($sql);
$messagesRecu="";


 foreach($messages as $message){
		 $messagesRecu .= "<tr><td>" . $message['nomProduit'] . "</td><td>" . $message['email'] . "</td><td>" . $message['content'] . "</td><td>" . $message['createdAt'] . "</td>" . '<td><a  href="repondreMsgForm.php?id='
			 . $message["idMess"] . '"><button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
        <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
      </svg></button></a> </td> <td><a href="deleteMessage.php?id='
			 . $message["idMess"] . '"><button class="btn btn-secondary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
     </svg> </button></a></td> </tr>';

 }



/***************  message envoyé ****************/
 $sql ="SELECT Messages.idMess, Produits.nomProduit, Clients.email, Messages.content, Messages.createdAt FROM Produits, Messages, Clients WHERE Messages.fromClient = $idClient AND Messages.toClient = Clients.idClient AND Messages.idProduit = Produits.idProduit ORDER BY Messages.createdAt";
 $messages="";
 $messages=$connexion->query($sql);

 $messagesEnvoye="";

 foreach($messages as $message){
 $messagesEnvoye .="<tr><td>".$message['nomProduit']."</td><td>".$message['email']."</td><td>".$message['content'].

 "</td><td>".$message['createdAt'].'</td><td><a href="deleteMessage.php?id='
 .$message["idMess"].'"><button class="btn btn-secondary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
 <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
 <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg> </button></a></td> </tr>'; }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/homepage.css" />
    <link rel="stylesheet" href="../css/produit.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://www.jqueryscript.net/demo/Dialog-Modal-Dialogify/dist/dialogify.min.js"></script>
 </head>


   <title>Document</title>
</head>
<body>
<?php require_once '../client/header.php';?>

<nav class="m-5 pl-5">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <!-- Onglet messages reçu-->
   
    <a class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Message reçu</a>
   
   <!-- Onglet messages envoyés-->
    <a class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Message envoyé</a>
    
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

   <!-- message reçu-->
  
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  
  <table class="table">
  <thead>
    <tr> <th scope="col">Nom produit</th>  <th scope="col">Email</th>  <th scope="col">Message</th>  <th scope="col">Date</th> <th>Repondre</th> <th>supprimer</th> </tr>
  </thead>
  <tbody>   

  <?php  echo $messagesRecu;?>

  </tbody>
</table>

  </div>
  
  
  <!--Messages envoyés-->
  
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">envoye
	<table class="table">
		<thead>
		<tr> <th scope="col">Nom produit</th>  <th scope="col">Email</th>  <th scope="col">Message</th>  <th scope="col">Date</th>  <th>supprimer</th> </tr>
		</thead>
		<tbody>

		<?php  echo $messagesEnvoye;?>

		</tbody>
	</table>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>
</html