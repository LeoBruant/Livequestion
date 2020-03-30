<?php
	$questionsFAQ=[
	[
	'intitule_question_faq' => "Can I upgrade later on ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	],
	[
	'intitule_question_faq' => "Can I port my data from another provider ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	],
	[
	'intitule_question_faq' => "Are my food photos stored forever in the cloud ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	],
	[
	'intitule_question_faq' => "Who foots the bill for that ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	],
	[
	'intitule_question_faq' => "What's the real cost ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	],
	[
	'intitule_question_faq' => "Can my company request a custom plan ?",
	'reponse_faq' => "lorem ipsum dolor sit amet",
	]
	];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>F.A.Q</title>
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="faq.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="partie_haut_faq texte_blanc">
			<h3 class="titre_partie_haut_faq">Etiam laot, alique sceleris</h3>
			<p class="paragraphe_partie_haut_faq"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur.</p>
			<div class="marques_partie_haut_faq">
				<div class="maques_du_haut">
					<div class="marque marque1">
						<img src="ressources/marque1.jpg">
						<span>Kyan Boards</span>
					</div>
					<div class="marque">
						<img src="ressources/marque2.jpg">
						<span>Atica</span>
					</div>
					<div class="marque">
						<img src="ressources/marque3.jpg">
						<span>Treva</span>
					</div>
					<div class="marque">
						<img src="ressources/marque4.jpg">
						<span>Kanba</span>
					</div>
				</div>
				<div class="marques_du_bas">
					<div class="marque">
						<img src="ressources/marque5.jpg">
						<span>Tvit Forms</span>
					</div>
					<div class="marque">
						<img src="ressources/marque7.jpg">
						<span>Aven</span>
					</div>
					<div class="marque">
						<img src="ressources/marque6.jpg">
						<span>utosia</span>
					</div>
				</div>
			</div>
		</div>
		<div class="arrondi_haut_faq"></div>
		<div class="tout_faq">
			<h2>FAQ</h2>
			<p class="phrases_haut_faq">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<div class="questions_faq">
				<?php
					$ind = 0;
					foreach ($questionsFAQ as $questionFAQ) {
						echo'<a class="bouton_faq" id="bouton_faq" data-toggle="collapse" href="#reponse_faq'.$ind.'" role="button" aria-expanded="false" aria-controls="reponse_faq'.$ind.'">
						<div class="question_faq">
							<p class="titre_question_faq" >'.$questionFAQ['intitule_question_faq'].'</p>
							<div class="fleche_droite_faq">
							<i class="fas fa-caret-right icone_fleche_droite_faq"></i>
							</div>
						</div>
						</a>
						<div class="reponse_faq collapse" id="reponse_faq'.$ind.'">
							<p>'.$questionFAQ['reponse_faq'].'</p>
						</div>';
						$ind++;
					}
				?>
			</div>
			<p class="phrase_bas_faq">
				Still have unanswered questions? <a href="#" class="get_in_touch_faq"> Get in touch</a>
			</p>
		</div>
		<div class="footer_faq">
			<div class="arrondi_footer_faq"></div>
			<div class="copyright texte_blanc">
				<span>© 2019 Page protected by reCAPTCHA and subject to Google's <span class="gras">Privacy Policy</span> and <span class="gras">Terms of Service</span></span>
				<img src="ressources/links.jpg" class="reseaux">
			</div>	
		</div>
		<script type="text/javascript">
    		$(".bouton_faq").click(function(){
		 		$(".icone_fleche_droite_faq").toggleClass("fa-caret-down");
		 		$(".icone_fleche_droite_faq").toggleClass("fa-caret-right"); 
			})
		</script>
	</body>
</html>