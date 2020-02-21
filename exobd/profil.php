<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');

if(isset($_GET['nom'])) {
   $getnom = ($_GET['nom']);
   $requser = $bdd->prepare('SELECT * FROM clients WHERE  nom = ?');
   $requser->execute(array($getnom));
   $userinfo = $requser->fetch();
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
        <a class="nav-link" href="inscription.php">Inscription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
     
     
    </ul>
    
  </div>
</nav>
    <div align="center">
    <h2>Profil de : <br> <?php echo $userinfo['nom']; ?> <br/> <?php echo $userinfo['prenoms']; ?></h2>
    <br /><br />
    N° = <?php echo $userinfo['noclient']; ?>  <br />
    Nom = <?php echo $userinfo['nom']; ?>
    <br />
    Prenom = <?php echo $userinfo['prenoms']; ?>
    <br />
        Tel = <?php echo $userinfo['contact']; ?>
        <br />
    
    <?php
     if(isset($_SESSION['nom']) AND $userinfo['nom'] == $_SESSION['nom']) {
         ?>
         <br /><br/> <br/>
    <a href="editionprofil.php">Editer mon profil</a> <br/> <br/>
    <a href="produit.php"> Mes produits </a>  <br/> <br/>
    <a href="commande.php"> Commander</a>  <br/> <br/>

    <a href="deconnexion.php">Se déconnecter</a>  <br/> <br/>

    <?php
    }
         ?>
      </div>
   </body>
</html>
<?php   
}
?>