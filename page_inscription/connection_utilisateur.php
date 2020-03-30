
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css" >
	<?php require_once('../header.php'); ?>
	<?php require_once('./traitement/connection_bdd.php'); ?>
</head>
<body>
	<form method="post">
		 <p>pseudo : <input type="text" name="nom" /></p> 
		 <p>mot de passe : <input type="text" name="mot_de_passe" /></p>
		 <p><a href="./index.php"></a> <input type="submit" value="OK"></p>
	</form>
	<?php

	if (isset($_POST['nom']) && isset($_POST['mot_de_passe'])) {
	}
	$_SESSION['utilisateur'] = [
		'Nom' => $_POST['nom'],
		'id' => 12,
	];
	?>
</body>
</html>
