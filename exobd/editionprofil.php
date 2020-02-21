<?php
session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');

if(isset($_SESSION['matricule'])) {
   $requser = $bdd->prepare("SELECT * FROM etudiant WHERE matricule = ?");
   $requser->execute(array($_SESSION['matricule']));
   $user = $requser->fetch();
   
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertnom = $bdd->prepare("UPDATE etudiant SET nom = ? WHERE matricule = ?");
      $insertnom->execute(array($newnom, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
    if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
      $newnom = htmlspecialchars($_POST['newnom']);
      $insertprenom = $bdd->prepare("UPDATE etudiant SET prenom = ? WHERE matricule = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
    if(isset($_POST['newdatenaiss']) AND !empty($_POST['newdatenaiss']) AND $_POST['newdatenaiss'] != $user['newdatenaiss']) {
      $newdatenaiss = htmlspecialchars($_POST['newdatenaiss']);
      $insertdatenaiss = $bdd->prepare("UPDATE etudiant SET datenaiss = ? WHERE matricule = ?");
      $insertdatenaiss->execute(array($newdatenaiss, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
    if(isset($_POST['newlieunaiss']) AND !empty($_POST['newlieunaiss']) AND $_POST['newlieunaiss'] != $user['newlieunaiss']) {
      $newdatenaiss = htmlspecialchars($_POST['newdatenaiss']);
      $insertdatenaiss = $bdd->prepare("UPDATE etudiant SET lieunaiss = ? WHERE matricule = ?");
      $insertdatenaiss->execute(array($newdatenaiss, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   } 
   if(isset($_POST['newsexe']) AND !empty($_POST['newsexe']) AND $_POST['newsexe'] != $user['sexe']) {
      $newsexe = htmlspecialchars($_POST['newsexe']);
      $insertsexe = $bdd->prepare("UPDATE etudiant SET sexe = ? WHERE matricule = ?");
      $insertsexe->execute(array($newsexe, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
   if(isset($_POST['newnationalite']) AND !empty($_POST['newnationalite']) AND $_POST['newnationalite'] != $user['nationalite']) {
      $newnationalite = htmlspecialchars($_POST['newnationalite']);
      $insertnationalite = $bdd->prepare("UPDATE etudiant SET nationalite = ? WHERE matricule = ?");
      $insertnationalite->execute(array($newnationalite, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
    if(isset($_POST['newniveau']) AND !empty($_POST['newniveau']) AND $_POST['newniveau'] != $user['newniveau']) {
        $newniveau = htmlspecialchars($_POST['newniveau']);
        $insertniveau= $bdd->prepare("UPDATE etudiant SET niveau = ? WHERE matricule = ?");
        $insertniveau->execute(array($newniveau, $_SESSION['matricule']));
        header('Location: profil.php?matricule='.$_SESSION['matricule']);
    }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail = htmlspecialchars($_POST['newmail']);
      $insertmail = $bdd->prepare("UPDATE etudiant SET email = ? WHERE matricule = ?");
      $insertmail->execute(array($newmail, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = sha1($_POST['newmdp1']);
      $mdp2 = sha1($_POST['newmdp2']);
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE etudiant SET mdpass = ? WHERE matricule= ?");
         $insertmdp->execute(array($mdp1, $_SESSION['matricule']));
         header('Location: profil.php?id='.$_SESSION['matricule']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }

    if(isset($_POST['newtel']) AND !empty($_POST['newtel']) AND $_POST['newtel'] != $user['tel']) {
      $newtel = htmlspecialchars($_POST['newtel']);
      $inserttel = $bdd->prepare("UPDATE etudiant SET tel = ? WHERE matricule = ?");
      $inserttel->execute(array($newtel, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
   }
  
   if(isset($_POST['newcorrespondant']) AND !empty($_POST['newcorrespondant']) AND $_POST['newcorrespondant'] != $user['correspondant']) {
      $newcorrespondant = htmlspecialchars($_POST['newcorrespondant']);
      $insertcorrespondant = $bdd->prepare("UPDATE etudiant SET correspondant = ? WHERE matricule = ?");
      $insertcorrespondant->execute(array($newcorrespondant, $_SESSION['matricule']));
      header('Location: profil.php?matricule='.$_SESSION['matricule']);
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

	<div class="container" style="margin-top: 30px;">
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">

	<h4 class="card-title mt-2 text-center"> Mettez à jour votre compte </h4>
	<p class="divider-text">
    </p>
	<form method="POST" action="">

    

	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newnom" class="form-control" placeholder="Nom" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newprenom" class="form-control" placeholder="Prenom" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newdatenaiss" class="form-control" placeholder="01/01/2000" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newlieunaiss" class="form-control" placeholder="Lieu de naissance" type="text">
    </div> <!-- form-group// -->
    
    <select class="custom-select" name="newsexe">
  
  <option value="1">Homme</option>
  <option value="1">Femme</option>
  
   </select> <br> <br>

   <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newnationalite" class="form-control" placeholder="Nationalité" type="text">
    </div> <!-- form-group// -->

        <select class="custom-select" name="newniveau">

            <option value="Licence1">Licence1</option>
            <option value="Licence2">Licence2</option>
            <option value="Licence2">Licence3</option>
            <option value="Master1">Master1</option>
            <option value="Master2">Master2</option>

        </select> <br> <br>

        <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="newmail" class="form-control" placeholder="Email" type="email">
    </div> <!-- form-group// -->
       
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="mail2" class="form-control" placeholder="Confirmez votre email" type="email">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="newmdp" class="form-control" placeholder="Mot de passe" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="newmdp2" class="form-control" placeholder="Confirmation du mot de passe" type="password">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newtel" class="form-control" placeholder="Téléphone" type="text">
    </div> <!-- form-group// -->

    <div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="newcorrespondant" class="form-control" placeholder="Correspondant" type="text">
    </div> <!-- form-group// -->

    <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="lienphoto">
    <label class="custom-file-label" for="inputGroupFile01">Choisir le lien</label>
    </div> <br> <br>
    


   
                                        
    <div class="form-group">
        <button  type="submit" class="btn btn-primary btn-block"  name="forminscription">Mettre à jour </button>
    </div> <!-- form-group// -->                                                                       
</form>
</article>
</div> <!-- card.// -->

</div> 
	

  </body>
  <script src="bootstrap.js"></script>
  <script src="bootstrap.min.js"></script>
  </html>
<?php   
}
else {
   header("Location: connexion.php");
}