<?php
    // création de la session

    session_start();
    $_SESSION['pseudo'] = '';
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/connexion.css">
    </head>
    <body>
        <h1 class="text-center titre">Page de connexion</h1>

        <!-- formulaire -->

        <form method="POST" class="text-center">
            <input type="text" placeholder="nom d'utilisateur" name="pseudo" class="col-3">
            <br>
            <input type="password" placeholder="mot de passe" name="mdp" class="col-3">
            <br>
            <input type="submit" value="se connecter" name="valider" class="col-2">
        </form>
        <p class="text-center">Vous n'avez pas de compte ? Inscrivez vous <a href="inscription.php">ici</a></p>
        <?php
            require_once("traitement/connexion_bdd.php");
            $profils = $connexion->query('SELECT Pseudo_profil, MotDePasse_profil FROM profil')->fetchAll();

            // vérification du remplissage de tous les champs

            if((empty($_POST['pseudo']) || empty($_POST['mdp'])) && isset($_POST['valider'])){
                echo'<p class="text-center">Veuillez remplir tous les champs</p>';
            }
            if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) && isset($_POST['valider'])){
                $trouve = false;
                $ind = 0;

                // vérification de l'existence du compte

                while($trouve == false && $ind < count($profils)){
                    if($profils[$ind]['Pseudo_profil'] == $_POST['pseudo']){
                        $trouve = true;
                        if($profils[$ind]['MotDePasse_profil'] == hash('sha1', $_POST['mdp'])){
                            $_SESSION['pseudo'] = $_POST['pseudo'];
                            header('Location: les_questions.php?page=1');
                            exit();
                        }
                    }
                    else{
                        $ind++;
                    }
                }
                if($trouve == false){
                    echo'<p class="text-center">ce compte n\'existe pas</p>';
                }
                else{
                    echo'<p class="text-center">Mot de passe incorrect</p>';
                }
            }
        ?>
    </body>
</html>