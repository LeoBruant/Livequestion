	<!-- Debut du code html  -->
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/profil.css">
    </head>
	<body>
        <?php
            require_once("includes/header.php");
            if(empty($_SESSION['pseudo'])){
                header('Location: index.php');
                exit();
            }

            // connexion à la base de données

            require_once("traitement/connexion_bdd.php");

            $profil = $connexion->query('SELECT Mail_profil, Genre_profil, Id_profil FROM profil WHERE Pseudo_profil = "'.$_SESSION['pseudo'].'"')->fetchAll();
        ?>
		<div class="col-lg-3 avatar name-div">
			<img src="##" class="photo">
		</div>

		<!-- espacement de 2 colones entre nos div -->

		<div class="col-lg-2 name-div"><br></div>
		<form method="POST">
			<div class="col-lg-4 name-div tout">
				<p class="saut-ligne">pseudo : 
					<?php   
						echo $_SESSION['pseudo'];
					?>
				</p>
				<input type="text" placeholder="modifer votre pseudo" name="nom" class="col-5">
				<p class="saut-ligne">e-mail : 
					<?php 
						echo $profil[0]['Mail_profil'];
					?> 
				</p>
				<input type="email" placeholder="modifer votre adresse email" name="email" class="col-5">
				<p class="saut-ligne">genre : 
					<?php 
						echo $profil[0]['Genre_profil'];
					?>
				</p>
				<select name="genre" class="col-3">
					<option value="homme">homme</option>
					<option value="femme">femme</option>
					<option value="autre">autre</option>
				</select>
				<br>
				<input type="submit" value="envoyer" class="col-5 mt-5" name="valider">
			</div>
		</form>

		<?php
			require_once("traitement/connexion_bdd.php");

            if(isset($_POST['valider'])){
                if(!empty($_POST['nom'])){
					$_SESSION['pseudo'] = $_POST['nom'];
                    $query = $connexion->prepare('UPDATE profil SET Pseudo_profil = :nom WHERE Id_profil = "'.$profil[0]['Id_profil'].'"');
                    $query->bindParam(':nom', $_POST['nom']);
					$query->execute();
					header("Refresh:0");
                }
                if(!empty($_POST['email'])){
                    $query = $connexion->prepare('UPDATE profil SET Mail_profil = :email WHERE Id_profil = "'.$profil[0]['Id_profil'].'"');
                    $query->bindParam(':email', $_POST['email']);
					$query->execute();
					header("Refresh:0");
                }
                if(!empty($_POST['genre'])){
                    $query = $connexion->prepare('UPDATE profil SET Genre_profil = :genre WHERE Id_profil = "'.$profil[0]['Id_profil'].'"');
                    $query->bindParam(':genre', $_POST['genre']);
					$query->execute();
					header("Refresh:0");
                }
            }
		?>

		<!-- espacement de 1 colone entre nos div -->

		<div class="col-lg-1 name-div">
			<p> </p>
		</div>
	</body>
</html>
