







<?php 
//1ere etape :connexion bdd
$connexion = new PDO("mysql:host=localhost;dbname=note","root","");

//je taravaille sur la connexion
//verifier si le formulaire a été soumis:si l'utilisateur a cliquer
if(isset($_POST['login'])){
  //recuperer les valeurs des champs de formulaire:Nom utilisatreur+password
  $username = $_POST["username"];
  $password = $_POST["mdp"];

  //verifie est ce l'utilisateur existe dans la bdd:la je peux utiliser 'query' prcq c un select pas un insert
  $requete = $connexion->query("SELECT * FROM utilisateurs WHERE username = '$username'AND password = '$passsword'");

  //la methode rowCount compte le nmbr d'enregistrement dans la bdd
  $utilisateurExiste = $requete->rowCount();

  if($utilisateurExiste){
    //commencer une session utilisateur
   session_start();
   //appel au tableau session
   $_SESSION['nom_utilisateur'] = $username;

  }

  
}


//je travaille sur l'inscription
//2eme etape :execution d'une requete sql
$requete = $connexion->query('SELECT * FROM notes');

//3eme etape :recuperation des donnees et stockage dans une variable
$notes = $requete->fetchAll();

//echo"<pre>";
//print_r($notes);
//echo"</pre>";

?>


<?php
 
//1ere etape detection du clic sur le bouton enregistrer 
if(isset($_POST['submit'])){

//2eme etape: connexion a la bdd

  $connexion = new PDO("mysql:host=localhost;dbname=note","root","");

  //3eme etape:execution d'une requete INSERT
  //pour la recuperer

  $titre =$_POST['titre'];
  $requete = $connexion->prepare("INSERT INTO  notes(titre) VALUES('$titre') ");
  $requete->execute();

  //rederection vers la page d'acceuil
  header("location:index.php");
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Application PHP & MySQL</title>
</head>

<body>

  <div class="container">
    <h1>
      <?php
      //afficher nom d'utilisateur s'il existe
      if(isset($_SESSION['nom_utilisateur']))
        echo $_SESSION['nom_utilisateur'];
      ?>
    </h1>
    
    <a class="ajouter" href="ajouter.php">Ajouter une note</a>
    <a class="ajouter btn_login" href="#">connexion</a>
    <a class="ajouter" href="inscription.php">Inscription</a>

    <h1 class="main-title">Liste des notes:</h1>
    <div class="liste-notes">
      <?php
       foreach ($notes as $data){
        //echo $data['titre'];

        echo "<div class='note'>
        <h2>{$data['titre']}</h2>
        <div class='actions'>
          <a class='modifier' href='modifier.php?id={$data['id']}'>Modifier</a>

          <a class='supprimer' href='supprimer.php?id={$data['id']}'>Supprimer</a>
        </div>
        </div>";

         
       }

      ?>



      
      
     
    
    </div>
  </div>
  <div class="login">
    <form method="post">
    <h1>Connexion</h1>
  <label>Nom d'utilisateur</label>
  <input name="username" type="text" name="Entrez votre Nom d'utilisateur">
  <label>Mot de passe</label>
  <input name="mdp" type="text">
  <div class="bloc">
  <button name="login" type="submit">Connexion</button>
  <button class="annuler">Annuler</button>
</div>
  </form>

  </div>
  <script>
    document.querySelector('.btn_login').addEventListener('click',function(){
      //pour cibler l'element que je vais afficher prcq au debut on la met non la on la changer avec js on a fait display flex pour afficher des que je clique
      document.querySelector('.login').style.display='flex';})
    //pour le bouton annuler
    document.querySelector('.annuler').addEventListener('click',function(){
      //on remplacer flex par none pour annuler
      document.querySelector('.login').style.display='none';})
  </script>
</body>

</html>