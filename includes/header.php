<?php 
    session_start();
?>
<link rel="stylesheet" href="css/header.css">
<nav class="nav sticky-top bg-light">
    <p class="titre">Livequestion</p>
    <p class="questions"><a href="les_questions.php">Les questions</a></p>
    <p class="ask_question"><a href="ask_question.php">Poser une question</a></p>
    <?php
        if(!empty($_SESSION['pseudo'])){
            echo'<p class="bonjour">Bonjour '.$_SESSION['pseudo'].'</p><p><a href="index.php">deconnexion</a></p>
            <p class="profil"><a href="profil.php">Profil</a></p>';
        }
        else{
            echo'<p><a href="connexion.php">se connecter</a></p>';
        }
    ?>
</nav>