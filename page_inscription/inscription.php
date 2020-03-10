<?php
	require_once('includes/header.php');
	require_once('traitement/connexion.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title>insciption</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/inscription.css">
	</head>
	<body>
		<div class="formulaire">
			<form method="POST">
				<div>
					<label for="nom">Nom d'utilisateur</label>
					<input type="text" name="nom">
				</div>
				<div>
					<label for="mot_de_passe">mot de passe :</label>
					<input type="password" name="mot_de_passe">
				</div>
				<div>
					<label for="genre"> genre : </label>
					<select name="genre">
						<option value="vide"></option>
						<option value="homme">homme</option>
						<option value="femme">femme</option>
						<option value="autre">autre</option>
					</select>
				</div>
				<div>
					<label for="email">e-mail :</label>
					<input type="email" name="email">
				</div>
				<div class="button">
					<button type="submit" name="valider">Finaliser l'inscription</button>
				</div>
			</form>
			<?php
				if(isset($_POST["valider"]) && (empty($_POST["nom"]) || empty($_POST["mot_de_passe"]) || empty($_POST["email"]) || $_POST["genre"] === "vide")){
					echo'<p class="text-center">Veuillez remplir tous les champs</p>';
				}

				if(isset($_POST["valider"]) && (!empty($_POST["nom"]) && !empty($_POST["mot_de_passe"]) && !empty($_POST["email"]) && $_POST["genre"] !== "vide")){
					$query = $connexion->prepare('INSERT INTO profil (Pseudo_profil, Mail_profil, MotDePasse_profil, Genre_profil, Id_role) VALUES (:Pseudo_profil, :Mail_profil, :MotDePasse_profil, :Genre_profil, :Id_role)');

					$query->bindParam(':Pseudo_profil', $Pseudo_profil);
					$query->bindParam(':Mail_profil', $Mail_profil);
					$query->bindParam(':MotDePasse_profil', $MotDePasse_profil);
					$query->bindParam(':Genre_profil', $Genre_profil);
					$query->bindParam(':Id_role', $Id_role);

					$Pseudo_profil = $_POST['nom'];
					$Mail_profil = $_POST['email'];
					$MotDePasse_profil = $_POST['mot_de_passe'];
					$Genre_profil = $_POST['genre'];
					$Id_role = 1;

					$query->execute();
					echo'<p class="text-center">Votre profil a bien été créé</p>';
				}
			?>
		</div>
	</body>
</html>