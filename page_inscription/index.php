<?php
	require_once('../header.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>insciption</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="formulaire">
		<form method="post">
		    <div>
		        <label for="nom">Nom d'utilisateur</label>
		        <input type="text" id="nom" name="nom_utilisateur">
		    </div>
		    <div>
		        <label for="prenom">mot de passe :</label>
		        <input type="text" id="prenom" name="prenom_utilisateur">
		    </div>
		    <div>
		        <label for="email">e-mail :</label>
		        <input type="email" id="mail" name="email_utilisateur">
		    </div>
		    <div class="button">
				  <button type="submit">Finaliser l'inscription</button>
			</div>
		</form>
	</div>
</body>
</html>
	