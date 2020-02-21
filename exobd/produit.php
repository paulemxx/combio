<?php 
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

if(isset($_POST['valider'])) {
 
   $libelle = htmlspecialchars($_POST['libelle']);
   $Prix = htmlspecialchars($_POST['Prix']);
   
  
 
   if(!empty(!empty($_POST['libelle']) AND !empty($_POST['Prix']))){
    $insertmbr = $bdd->prepare("INSERT INTO produits(libelle,prixvente) VALUES(?,?)");
    $insertmbr->execute(array($libelle,$Prix));

   }
}
?> 
<?php
if(isset($_POST['supprimer'])) {
 
    $libelle = htmlspecialchars($_POST['libelle']);
  
   
  
    if(!empty($_POST['libelle'])){
     $suppr = $bdd->prepare("DELETE FROM produits WHERE libelle='$libelle'");
     $suppr->execute(array($libelle));
    }
 }
 

?>  
 
 <?php  
 
 
 
 
 
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

	<h4 class="card-title mt-2 text-center">Ajouter produits </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>

                    <input name="libelle" class="form-control" placeholder="libelle" type="text">
                    </div> 

                     <input name="Prix" class="form-control" placeholder="Prix" type="text">
                    </div> 

                
        <button  type="submit" class="btn btn-primary"  name="valider"> valider</button>

    </div> 


	</form> 
    </article> 


    <br> <br> 

	<div class="container" style="margin-top: 30px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

    <h4 class="card-title mt-2 text-center">Supprimer  produits </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div>
                    <input name="libelle" class="form-control" placeholder="libelle" type="text">
                    </div> 
        <button  type="submit" class="btn btn-primary"  name="supprimer"> Supprimer</button>
        
    </div> 

	</form> 
    </article> 
 <br> <br> 

 <div class="container" style="margin-top: 30px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

 <h4 class="card-title mt-2 text-center">Modifier produits </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
    <div class="form-group input-group">
                     <div class="input-group-prepend">
                     <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                    </div> 

                    
                    <input name="libelle2" class="form-control" placeholder="libelle à modifier" type="text">
                    </div> 

                    
                    <input name="Prix2" class="form-control" placeholder="Prix à modifier" type="text">
                    </div> 

                    <input name="libelle" class="form-control" placeholder="libelle" type="text">
                    </div> 

                     <input name="Prix" class="form-control" placeholder="Prix" type="text">
                    </div> 

                
        <button  type="submit" class="btn btn-primary"  name="modifier"> Modifier</button>

    </div> 

	</form> 	
    </article> 
	

  </body>

  <script src="bootstrap.js"></script>
  <script src="bootstrap.min.js"></script>

  </html>