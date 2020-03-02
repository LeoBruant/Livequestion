<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Page d'accueil de Livequestions</title>
    </head>
    <body class="body">
        <header>
            <?php
                require_once("includes/header.php");
                require_once("traitement/connexion.php");
            ?>
        </header>
        <main class="main">
            <?php
                $sql = 'SELECT Titre_question, Date_creation_question, Id_categorie FROM question';
                $query = $connexion->query($sql);
                $query->setFetchMode(PDO::FETCH_ASSOC);

                while ($row = $query->fetch()):
                    echo'
                    <div class="question">
                        <img class="profile_pic_question" src="https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1">
                        <div class="description">
                            <p>pseudo</p>
                            <p> | </p>
                            <p>avis</p>
                            <p> | </p>
                            <p>categorie</p>
                            <p> | </p>
                            <p>'.htmlspecialchars($row["Date_creation_question"]).'</p>
                        </div>
                        <div class="triangle"></div>
                        <p class="question_text"><a href="question.php">'.htmlspecialchars($row["Titre_question"]).'</a></p>
                    </div>';
                endwhile;
            ?>
        </main>
    </body>
</html>