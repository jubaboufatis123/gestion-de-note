<!--je code php le l'ai deplace vers inndex.php -->
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
    <h1 class="main-title main-title-ajouter">Ajouter une note</h1>

    <!--pour permettre l'ajout d'une info-->
    <form class="formulaire-ajouter" method="post" action="index.php" >
     <!--action=destination-->

     <input type="text" placeholder="Titre de la note" name="titre">

      <div class="center">

        <!--si j'ajoute pas name=submit sa va rien se passe-->
        <button name="submit" type="submit">Enregistrer</button>


      </div>
    </form>
  </div>
</body>

</html>