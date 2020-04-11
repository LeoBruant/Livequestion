<?php
    // création de la session

    session_start();
    if(!empty$_SESSION'pseudo')
    header('Location: "index.php");
  	exit();

?>
	<!-- Debut du code html  -->
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
        <meta charset="utf-8">
        <link rel="stylesheet "href="profil.css">
    </head>
	<body>
		<div class="col-lg-3 avatar name-div">
			<img src="##" class="photo">
			
		</div>

		<!-- espacement de 2 colones entre nos div -->
		<div class="col-lg-2 name-div"> <p> </p> </div>
		<div class="col-lg-4 name-div">
			<p class="saut-ligne">pseudo : 
				<?php   
				echo $_SESSION['pseudo'];
				?>
			</p> 
			<p class="saut-ligne">e-mail : 
				<?php 
				echo $_SESSION['email'];
				?> 
			</p>
			<p class="saut-ligne">mot de passe : 
				<?php 
				echo $_SESSION['mot_de_passe'];










				// a cripter !!!!!!!!!!















				?>
			</p>
			<p class="saut-ligne">genre : 
				<?php 
				echo $_SESSION['genre'];
				?>
				
			</p>
		</div>

		<!-- espacement de 1 colone entre nos div -->
		<div class="col-lg-1 name-div">
			<p> </p>
		</div>
		<div class="col-lg-2 modif_icon name-div">
			<a href="modifier_profil.php">
				<i class="fas fa-cog"></i>
			</a> 
		</div>
		
	</body>
</html>