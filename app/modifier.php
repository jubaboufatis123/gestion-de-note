<!--1ere etape:afficher l'ancien valeur-->
<?php
//connexion a la bdd
$connexion = new PDO("mysql:host=localhost;dbname=note","root","");

//recuperation de l'id a travers l'url
$id = $_GET['id'];

//executer une requete sql
$requete = $connexion->prepare("SELECT * FROM notes WHERE id='$id'");
$requete->execute();

//recuperation des notes et stockage dans une variables

$note = $requete->fetch();//c'est la note qui va afficher pour la modifier

//la modefication 

?>


<!--la modefecation-->
<?php
//1ere etape detection du clic sur le bouton modifier

if(isset($_POST['update'])){

//2eme etape: connexion a la bdd

  $connexion = new PDO("mysql:host=localhost;dbname=note","root","");

  //3eme etape:execution d'une requete INSERT
  
  $titre =$_POST['titre'];
  $requete = $connexion->prepare("UPDATE notes SET titre='$titre' WHERE id='$id'");

  $id = $_GET['id'];//pour recuperer l'id

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
    <h1 class="main-title main-title-ajouter">Modifier une note</h1>
      <!--j'ai ajouter la methode dans form-->

    <form method="post" class="formulaire-ajouter">

      <!--la j'ai ajouter du php a l'interieur de input-->
      <!--j'ai ajouter name pour la modefecation-->
      <input name="titre" type="text" value="<?php echo $note['titre'];?>" placeholder="Titre de la note">

      <div class="center">

        <!--pour la modefdication j'ai ajouter name=update-->
        <button name="update" type="submit">Enregistrer</button>
      </div>
    </form>
  </div>
</body>

</html>