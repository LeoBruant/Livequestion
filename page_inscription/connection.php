<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<?php require_once('../header.php'); ?>
	<?php require_once('php my admin'); ?>
</head>
<body>
	<form method="post">
		 <p>pseudo : <input type="text" name="nom" /></p> 
		 <p>mot de passe : <input type="text" name="mot_de_passe" /></p>
		 <p><a href="./index.php"></a> <input type="submit" value="OK"></p>
	</form>
	<?php

	if (isset($_POST['nom']) && isset($_POST['prenom'])) {
	}
	$_SESSION['utilisateur'] = [
		'Nom' => $_POST['nom'],
		'id' => 12,
	];
	?>
</body>
</html>