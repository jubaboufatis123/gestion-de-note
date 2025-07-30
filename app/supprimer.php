<?php
//recuperer l'id de la note qu'on veut supprimer
$id = $_GET['id'];

//connexion a la bdd
$connexion = new PDO("mysql:host=localhost;dbname=note","root","");


//execution de la requete de suppression
$requete = $connexion->query("DELETE FROM notes WHERE id='$id'");

//retour vers la page d'acceuille :rederection vers l'acceuil index.php ,lorsque je supprime je revien automatiquement vers la page d'acceuil
header("location:index.php");



?>