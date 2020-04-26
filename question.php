<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/les_questions.css">
        <title>Postez une réponse</title>
    </head>
    <body class="body">
        <header>
            <?php

                //affichage du header
                require_once("includes/header.php");
               ?>
        </header>
        
    <?php
        
            if(!empty($_GET['id']))
        {
            $id = checkInput($_GET['id']);
        }

        //connexion à la base de données
        require_once("traitement/connexion_bdd.php");

        function checkInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        
        $statement = $connexion->prepare('SELECT *
                                          FROM question
                                          INNER JOIN categorie ON question.Id_categorie = categorie.Id_categorie
                                          INNER JOIN profil ON question.Id_profil = profil.Id_profil
                                          WHERE question.Id_question = ?');
        $statement->execute(array($id));
        $questions = $statement->fetch();
        
    ?>

        <main class="main">
                    <div class="question">
                        <img class="profile_pic_question" src="https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1">
                        <div class="description">
                            <p><?php echo '  ' . $questions['Pseudo_profil']; ?></p>
                            <p> | </p>
                            <p><?php echo '  ' . $questions['Libelle_categorie']; ?></p>
                            <p> | </p>
                            <p><?php echo'  ' . $questions['Date_creation_question']; ?></p>
                        </div>
                        <div class="triangle"></div>
                        <p class="question_text"><?php echo '  ' .$questions['Titre_question']; ?></p>
                        <br><br>
                    </div>
                        
    <?php
        $commentaires = $connexion->prepare('SELECT * FROM reponse WHERE Id_question = ?');
        $commentaires->execute(array($id));
            
        while($c = $commentaires->fetch()) {
    ?>

        <div class="question">
            <img class="profile_pic_question" src="https://i2.wp.com/yellowsummary.com/wp-content/uploads/2019/02/Icone-profil.png?fit=512%2C512&ssl=1">
            <div class="description">
                <p><?php echo '  ' . $questions['Pseudo_profil']; ?></p>
                <p> | </p>
                <p><?php echo'  ' . $c['Date_reponse']; ?></p>
                <br/>
                <p><?php echo '  ' . $c['Contenu_reponse']; ?></p>
            </div>
        </div>
            
    <?php
        }
    ?>
            
        <!-- formulaire de question -->
            <form method="POST">
                <div class="options">
                    <p>Votre réponse<span class="required">*</span></p>
                    <input type="text" class="form-text" name="reponse">
                </div>
                <input type="submit" class="button" name="valider">
            </form>
            
            <?php

                //vérification des champs et envoi des données

                if(isset($_POST["valider"]) && (empty($_POST["reponse"]))){
                    echo'Veuillez remplir tous les champs';
                }

                elseif(isset($_POST["valider"]) && !empty($_POST["reponse"])){
                    $reponse = htmlspecialchars($_POST['reponse']);
                    
                    $query = $connexion->prepare('INSERT INTO reponse (Contenu_reponse, Date_reponse, Id_profil, Id_question) VALUES (?,?,?,?)');
                    $date = new DateTime();
                    $Date_reponse = $date->format('Y-m-d');
                    $Id_profil = 1;
                    $query->execute(array($reponse, $Date_reponse, $Id_profil, $id));
                    echo'<p class="text-center">Votre réponse a bien été soumise.</p>';
                }
            ?>
        </main>
    </body>
</html>