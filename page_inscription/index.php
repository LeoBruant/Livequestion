<?php
	//require_once('../header.php');
?>

<?php
$host='localhost';
$db = 'piscinelivequestion';
$username = 'root';
$password = 'root';

 
//require_once 'dbconfig.php';
 
$dsn= "mysql:host=$host;dbname=$db";
 
try{
 // create a PDO connection with the configuration data
 $conn = new PDO($dsn, $username, $password);
 
 /* display a message if connected to database successfully
 if($conn){
 echo "Connected to the <strong>$db</strong> database successfully!"; 
        }*/

$sql = "INSERT INTO utilisateur (pseudo_utilisateur, mdp_utilisateur, genre_utilisateur, email_utilisateur) VALUES ($_POST['nom'], $_POST['mot_de_passe'],$_POST['genre'],$_POST['email']";

}
catch (PDOException $e){
 // report error message
 echo $e->getMessage();
}

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
		        <input type="text" name="nom">
		    </div>
		    <div>
		        <label for="mot_de_passe">mot de passe :</label>
		        <input type="text" name="mot_de_passe">
		    </div>
		    <div>
				<label for="genre"> genre : </label>
		    	<select name="genre">
				    <option name="homme">homme</option>
				    <option name="femme">femme</option>
				</select>
		    </div>
		    <div>
		        <label for="email">e-mail :</label>
		        <input type="email" name="email">
		    </div>
		    <div class="button">
				  <button type="submit">Finaliser l'inscription</button>
			</div>
		</form>
	</div>
</body>
</html>
	