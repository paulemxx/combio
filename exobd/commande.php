 <?php  
 session_start();

 $bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
 $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.
 
 if(isset($_POST['Valider'])) {
  
    
    $noclient = htmlspecialchars($_POST['noclient']);
    $datecom = htmlspecialchars($_POST['datecom']);
    $adressedelivraison = htmlspecialchars($_POST['adressedelivraison']);
   
    if(!empty(!empty($_POST['noclient']) AND !empty($_POST['datecom']) AND !empty($_POST['adressedelivraison']) )){
 
 
 
 
     $insert = $bdd->prepare("INSERT INTO commandes(datecom,adressedelivraison,noclient) VALUES(?,?,?)");
     $insert->execute(array($datecom,$adressedelivraison,$noclient));
 
    }
 }
 ?> 
 
 <?php
if(isset($_POST['supprimer'])) {
 
    $nocommande = htmlspecialchars($_POST['nocommande']);
  
   
  
    if(!empty($_POST['nocommande'])){
     $suppr = $bdd->prepare("DELETE FROM produits WHERE nocommande='$nocommande'");
     $suppr->execute(array($nocommande));
    }
 }
 

?>  

 

 <!DOCTYPE html>
  <html lang="fr">

  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Forum</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  </head>

  <body style="">

  <nav class="navbar navbar-expand-lg navbar-light bg-white">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
     
     
    </ul>
    
  </div>
</nav>

	<div class="container" style="margin-top: 30px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

	<h4 class="card-title mt-2 text-center">Ajouter commande </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>

                    <input name="nocommande" class="form-control" placeholder="N° commande" type="text">
                    </div> 

                     <input name="noclient" class="form-control" placeholder="N° client" type="text">
                    </div> 

                    <input type="date" name="datecom"> 

                    
                    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                     <input name="adressedelivraison" class="form-control" placeholder="Adresse de livraison" type="text">
                    </div> 
                    <div class="form-group">
        <button  type="submit" class="btn btn-primary"  name="Valider"> valider</button>

    </div> <!-- form-group// -->


	</form> 


    <br> <br> 


    <h4 class="card-title mt-2 text-center">Supprimer  commande </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="nocommande" class="form-control" placeholder="N° commande" type="text">
                    </div> 
        <button  type="submit" class="btn btn-primary"  name="supprimer"> Supprimer</button>
        
    </div> <!-- form-group// -->

	</form> 
 <br> <br> 

 <div class="container" style="margin-top: 30px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

 <h4 class="card-title mt-2 text-center">Modifier commande </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>

                    <input name="nocommande" class="form-control" placeholder="N° commande" type="text">
                    </div> 

                     <input name="Noclient" class="form-control" placeholder="N° client" type="text">
                    </div> 

                    <input type="date" name="datecom"> 

                    
                    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                     <input name="adressedelivraison" class="form-control" placeholder="Adresse de livraison" type="text">
                    </div> 
                    <div class="form-group">
        <button  type="submit" class="btn btn-primary"  name="valider"> valider</button>

    </div> <!-- form-group// -->


	</form> 	
	

  </body>
  <script src="bootstrap.js"></script>
  <script src="bootstrap.min.js"></script>
  </html>