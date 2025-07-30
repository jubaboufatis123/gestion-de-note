<?php
	//1ere etape connexion a la bdd
	$connexion = new PDO("mysql:host=localhost;dbname=note","root","");
	//2eme etape puis on a passer au body on a ajouter les name
	//3eme etape :puis on passe a sa:detecter le clic sur le boutton s'inscrire
	if(isset($_POST['register'])){
		//4eme etape: recuperer les valeurs des champs de formulaire: nom d'utilisateur et mot de passe et la confirmation
		$username= $_POST["username"];
		$password= $_POST["mdp"];
		$repeat_password= $_POST["rmdp"];

		//5eme etape:tester les password est ce que sont egaux:la confirmation
		if($password === $repeat_password){
			//6eme etapes:inserer l'utisateur dans la bdd
			$resultat = $connexion->prepare
			("INSERT INTO utilisateurs (username,password)
				VALUES('$username','$password')");
			$resultat->execute();

			//7eme etape: rederection vers la page d'acceuille
		header('location:index.php');

		
		}
		 
	}else{
		$error = "resaisis votre mot de passe";
	}

	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet"  href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ma page</title>
</head>
<body>
	
	<form method="post">
		<h1>Inscription</h1>
	<label>Nom d'utilisateur</label>
	<input name="username" type="text" name="Entrez votre Nom d'utilisateur">
	<label>Mot de passe</label>
	<input name="mdp" type="text" name="Entrez votre mot de passe">
	<label>confirmez votre mot de passe</label>
	<input name="rmdp" type="text" name="confirmez votre mot de passe">

	<?php
	if(isset($error)) echo "$error";?>

	<button name="register" type="submit">s'inscrire</button>
	</form>

</body>
</html>