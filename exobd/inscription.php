<?php

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

if(isset($_POST['forminscription'])) {
 
   $nom = htmlspecialchars($_POST['nom']);
   $prenoms = htmlspecialchars($_POST['prenoms']);
   $ville =  htmlspecialchars($_POST['ville']);
   $contact = htmlspecialchars($_POST['contact']);
   $mdp = sha1($_POST['mdp']);
   $mdp2 = sha1($_POST['mdp2']);
   $cli_parrain = htmlspecialchars($_POST['cli_parrain']);
  
 
   if(!empty(!empty($_POST['nom']) AND !empty($_POST['prenoms'])  AND !empty($_POST['ville']) AND !empty($_POST['contact']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) AND !empty($_POST['cli_parrain']))) {

   
      $nomlength = strlen($nom);
      $prenomlength = strlen($prenoms);
     
      if(($nomlength <= 255 AND $nomlength > 5) || ($prenomlength <= 255 AND $prenomlength > 5)  ) {
        
        if($mdp == $mdp2) {
                     $insertmbr = $bdd->prepare("INSERT INTO clients(nom,prenoms,ville,contact,mdpass,cli_parrain) VALUES(?,?,?,?,?,?)");
                     $insertmbr->execute(array($nom,$prenoms,$ville,$contact,$mdp,$cli_parrain));
                   
                     $erreur = "Votre compte a bien été créé !"; 
                    
                    
                  echo $erreur;
                     
                     
                  } 
         else {
                     $erreur = "Vos mots de passes ne correspondent pas !";
                     echo $erreur;
                } 
                
      
              
}
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

	<h4 class="card-title mt-2 text-center">Créez votre compte</h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nom" class="form-control" placeholder="Nom" type="text">
    </div> <!-- form-group// -->


    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="prenoms" class="form-control" placeholder="Prenom" type="text">
    </div> <!-- form-group// -->


    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="ville" class="form-control" placeholder="Ville" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="mdp" class="form-control" placeholder="Mot de passe" type="password">
    </div> <!-- form-group// -->


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="mdp2" class="form-control" placeholder="Confirmation du mot de passe" type="password">
    </div> <!-- form-group// -->


    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="contact" class="form-control" placeholder="Téléphone" type="text">
    </div> <!-- form-group// -->

    <select class="custom-select" name="cli_parrain">
  
  <option value="0">0</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="5">5</option>
  
   </select> <br> <br>



                                        
    <div class="form-group">
        <button  type="submit" class="btn btn-primary btn-block"  name="forminscription"> Je m'inscris</button>

    </div> <!-- form-group// -->

</form>
</article>
</div> <!-- card.// -->

</div> 
	

  </body>
  <script src="bootstrap.js"></script>
  <script src="bootstrap.min.js"></script>
  </html>