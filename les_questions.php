<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/les_questions.css">
        <title>Page d'accueil de Livequestions</title>
    </head>
    <body class="body">
        <header>
            <?php

                //affichage du header

                require_once("includes/header.php");

                //connexion à la base de données

                require_once("traitement/connexion_bdd.php");
            ?>
        </header>
        <main class="main">
            <?php

                //recupération de toutes les questions

                $question = $connexion->query('SELECT * FROM question ORDER BY Date_creation_question')->fetchAll();

                for($i = 0; $i < count($question); $i++){

                    //récupération des categories, des profils, et des réponses correspondant aux questions

                    $categorie = $connexion->query('SELECT Libelle_categorie FROM categorie WHERE Id_categorie = '.$question[$i][4])->fetchAll();
                    $profil = $connexion->query('SELECT Pseudo_profil, Image_profil FROM profil WHERE Id_profil = '.$question[$i][3])->fetchAll();
                    $reponse = $connexion->query('SELECT COUNT(*) FROM reponse WHERE Id_question = '.$question[$i][0])->fetchAll();

                    //affichage des questions

                    echo'
                    <div class="question">
                        <img class="profile_pic_question" src="'.$profil[0]['Image_profil'].'">
                        <div class="description">
                            <p>'.$profil[0][0].'</p>
                            <p> | </p>
                            <p>'.$reponse[0][0].' avis</p>
                            <p> | </p>
                            <p>'.$categorie[0][0].'</p>
                            <p> | </p>
                            <p>'.$question[$i][2].'</p>
                        </div>
                        <div class="triangle"></div>
                        <p class="question_text"><a href="question.php?id=' . $question[$i][0] . '">'.$question[$i][1].'</a></p>
                        <br><br>
                    </div>';
                }
            ?>
        </main>
    </body>
</html>