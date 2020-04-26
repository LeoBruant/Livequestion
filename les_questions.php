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

                $questions = $connexion->query('SELECT * FROM question')->fetchAll();

                for($i = 0; $i < count($questions); $i++){

                    //récupération des categories, des profils, et des réponses correspondant aux questions

                    $categories = $connexion->query('SELECT Libelle_categorie FROM categorie WHERE Id_categorie = '.$questions[$i][4])->fetchAll();
                    $profils = $connexion->query('SELECT Pseudo_profil FROM profil WHERE Id_profil = '.$questions[$i][3])->fetchAll();
                    $reponses = $connexion->query('SELECT COUNT(*) FROM reponse WHERE Id_question = '.$questions[$i][0])->fetchAll();

                    //affichage des questions

                    echo'
                    <div class="question">
                        <img class="profile_pic_question" src="https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1">
                        <div class="description">
                            <p>'.$profils[0][0].'</p>
                            <p> | </p>
                            <p>'.$reponses[0][0].' avis</p>
                            <p> | </p>
                            <p>'.$categories[0][0].'</p>
                            <p> | </p>
                            <p>'.$questions[$i][2].'</p>
                        </div>
                        <div class="triangle"></div>
                        <p class="question_text"><a href="question.php?id=' . $questions[$i][0] . '">'.$questions[$i][1].'</a></p>
                        <br><br>
                    </div>';
                }
            ?>
        </main>
    </body>
</html>