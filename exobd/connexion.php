<?php

session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

if(isset($_POST['formconnexion'])) {
   $nomconnect = htmlspecialchars($_POST['nomconnect']);
   $mdpconnect = sha1($_POST['mdpconnect']);
   if(!empty($nomconnect) AND !empty($mdpconnect)) {
      $requser = $bdd->prepare("SELECT * FROM clients WHERE nom= ? AND mdpass = ?");
      $requser->execute(array($nomconnect, $mdpconnect));
      $userexist = $requser->rowCount();
      if($userexist == 1) {
         $userinfo = $requser->fetch();
         $_SESSION['nom'] = $userinfo['nom'];
         $_SESSION['prenoms'] = $userinfo['prenoms'];
         $_SESSION['ville'] = $userinfo['ville'];
         $_SESSION['contact'] = $userinfo['contact'];
         $_SESSION['cli_parrain'] = $userinfo['cli_parrain'];

         header("Location: profil.php?nom=".$_SESSION['nom']);


      } else {
         $erreur = "Mauvais nom ou mot de passe !";
         echo $erreur;
      }
   } else {
      $erreur = "Tous les champs doivent être complétés !";
      echo $erreur;
   }
}
?>
<!DOCTYPE html>
  <html lang="fr">

  <head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>Connexion</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

  </head>
<body style="" bgcolor="white" >

<nav class="navbar navbar-expand-lg navbar-light bg-white">
  <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
        <img style="max-width:190px; margin-top: -7px;"
             src="vlogo.png">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a href="inscription.php" class="nav-link" >Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Connexion</a>
      </li>
    
     
    </ul>
    
  </div>
</nav>
<img src=" icone.png" class=" img-circle" alt=" image" color="silver" style="margin-left:550px;"/>
	<div class="container" style="margin-top: 100px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 300px;">
	
	<form method="POST" action="">
      
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="nomconnect" class="form-control" placeholder="Nom" type="text">

    </div> <!-- form-group// -->


    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>

    
        <input name="mdpconnect" class="form-control" placeholder="Mot de passe" type="password">
    </div> <!-- form-group// -->

    <div class="form-group">
         
      <button   type="submit" class="btn btn-primary btn-block"  name="formconnexion"> Valider </button>
    </div> <!-- form-group// -->  

    </form>
</article>
</div> <!-- card.// -->

</div> 
	

  </body>
  <script src="bootstrap.js"></script>
  <script src="bootstrap.min.js"></script>
  </html>    