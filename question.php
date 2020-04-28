<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/question.css">
        <title>Postez une réponse</title>
    </head>
    <body class="body">
        <header>
            <?php

                //affichage du header
                require_once("includes/header.php");

                // vérification du compte

                if(empty($_SESSION['pseudo'])){
                    header('Location: index.php');
                    exit();
                }
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
                        <?php echo'<img class="profile_pic_question" src="'.$questions['Image_profil'].'">'; ?>
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
        $reponse = $connexion->query('SELECT Id_reponse, Date_reponse, Contenu_reponse, Id_profil FROM reponse WHERE Id_question = '.$_GET['id'].'')->fetchAll();
            
        for ($i=0; $i < count($reponse); $i++){
            $profil_reponse = $connexion->query('SELECT Pseudo_profil, Image_profil FROM profil WHERE Id_profil IN (SELECT Id_profil FROM reponse WHERE Id_question = '.$_GET['id'].') AND Id_profil = '.$reponse[$i]['Id_profil'].'')->fetchAll();
            echo'
                <div class="question">
                    <div class="description mb-5">
                        <img src="'.$profil_reponse[0]['Image_profil'].'" class="image">
                        <p>'.$profil_reponse[0]['Pseudo_profil'].'</p>
                        <p> | </p>
                        <p>  '.$reponse[$i]['Date_reponse'].'</p>
                        <br/>
                        <div class="triangle"></div>
                        <p class="reponse_text">  '.$reponse[$i]['Contenu_reponse'].'</p>
                    </div>
                </div>
            ';
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
                $profil = $connexion->query('SELECT Pseudo_profil, Id_profil FROM profil WHERE Pseudo_profil = "'.$_SESSION['pseudo'].'"')->fetchAll();

                //vérification des champs et envoi des données

                if(isset($_POST["valider"]) && (empty($_POST["reponse"]))){
                    echo'Veuillez remplir tous les champs';
                }

                elseif(isset($_POST["valider"]) && !empty($_POST["reponse"])){
                    
                    $query = $connexion->prepare('INSERT INTO reponse (Contenu_reponse, Date_reponse, Id_profil, Id_question) VALUES (:contenu, :date, :id_profil, :id_question)');

                    $query->bindParam(':contenu', $reponse);
                    $query->bindParam(':date', $date_reponse);
                    $query->bindParam(':id_profil', $id_profil);
                    $query->bindParam(':id_question', $id_question);

                    $reponse = $_POST['reponse'];
                    $date = new DateTime();
                    $date_reponse = $date->format('Y-m-d');
                    $id_profil = $profil[0]['Id_profil'];
                    $id_question = $_GET['id'];

                    $query->execute();

                    echo'<p class="text-center">Votre réponse a bien été soumise.</p>';
                }
            ?>
        </main>
    </body>
</html>