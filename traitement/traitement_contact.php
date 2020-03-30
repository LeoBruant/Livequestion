<?php 

require_once('./db/req_contact.php');

/**
* array $informations
*/
function traitementFormulaire(array $informations) {
	$erreurs = [];

	//var_dump($informations);

	if (empty($informations['nom'])) {
		$erreurs['nom'] = 'Veuillez saisir un nom';
	}

	if (empty($informations['prenom'])) {
		$erreurs['prenom'] = 'Veuillez saisir un prénom';
	}

	if (empty($informations['email']) && empty($informations['telephone'])) {
		$erreurs['telephone'] = 'Veuillez saisir au minima un numéro de téléphone ou une adresse email.';
	}

	if (!empty($erreurs)) {
		return [
			'succes' => false,
			'erreurs' => $erreurs,
		];
	}

	return [
		'succes' => true,
	];



	var_dump($erreurs);
}