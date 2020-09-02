<<<<<<< HEAD
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connexion = new PDO("mysql:host=$servername;dbname=livequestion", $username, $password);
=======
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connexion = new PDO("mysql:host=$servername;dbname=livequestion", $username, $password);
>>>>>>> 04471914325163b2d69142af37bd958f60748800
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);