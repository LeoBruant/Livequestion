<?php
$servername = "localhost";
$username = "root";
$password = "root";
$connexion = new PDO("mysql:host=$servername;dbname=livequestion", $username, $password);
$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);