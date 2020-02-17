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
	<link rel="stylesheet" type="text/css" href="faq.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="tout_faq">
		<h2>FAQ</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<div class="questions_faq">
			<?php
				foreach ($questionsFAQ as $questionFAQ) {
			?>
			<a  class="bouton_faq bouton_montrer_faq " id="bouton_faq" data-toggle="collapse" href="#reponse_faq<?php $questionFAQ?>" role="button" aria-expanded="false">
				<div class="question_faq">
					<p class="titre_question_faq" ><?php echo $questionFAQ['intitule_question_faq'];?></p>	
					<div class="fleche_droite_faq">
						<i class="fas fa-caret-right icone_fleche_droite_faq"></i>
					</div>					
				</div>
			</a>
			<div class="reponse_faq collapse" id="reponse_faq<?php $questionFAQ?>">
				<p> <?php echo $questionFAQ['reponse_faq']; ?></p>
			</div>
			<?php } ?>
		</div>
	</div>
</body>

<script type="text/javascript">
	$(".bouton_montrer_faq").click(function(){
		$(".reponse_faq").removeClass("collapse");
		$(".reponse_faq").addClass("collapse.show");
		$(this).toggleClass("reponse_cacher_faq");
		$(this).toggleClass("bouton_montrer_faq");
		$(".icone_fleche_droite_faq").removeClass("fa-caret-right");
		$(".icone_fleche_droite_faq").addClass("fa-caret-down");

	});
	$(".reponse_cacher_faq").click(function(){		
		$(".reponse_faq").removeClass("collapse.show");
		$(".reponse_faq").addClass("collapse");
		$(this).toggleClass("bouton_montrer_faq");
		$(this).toggleClass("reponse_cacher_faq");
		$(".icone_fleche_droite_faq").removeClass("fa-caret-down");
		$(".icone_fleche_droite_faq").addClass("fa-caret-right");
	});
</script>

</html>