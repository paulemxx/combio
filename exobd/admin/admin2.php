<?php

session_start();

$bdd = new PDO("mysql:host=localhost;dbname=combio",'root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Gestion des erreurs.

$sql = ['SELECT * FROM clients;', 'select * from commandes;', 'select * from categories;', 'select * from produits;', 'select * from contenir;'];

foreach ($sql as $value){
    $requser = $bdd->query($value);

    $result = $requser->fetchAll();

    print_r($result);
}


   
      
?>