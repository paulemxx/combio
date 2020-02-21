<?php

session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

$requser = $bdd->query("SELECT * FROM clients");

$result = $requser->fetch();


echo $result['nom'];  
echo '<br>';
echo $result['prenoms'];  
echo $result['ville']; 
echo $result['contact']; 
echo $result['cli_parrain']; 

   
      
?>