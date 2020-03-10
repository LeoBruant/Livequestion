<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ask_question.css">
        <title>Poser une question</title>
    </head>
    <body class="body">
        <?php

            //affichage du header

            require_once("includes/header.php");
            require_once("traitement/connexion.php");
        ?>
        <main class="main">
            <h1 class="page_title">Poser une question à la communauté</h1>
            <form method="POST">
                <div class="options">
                    <p>Quelle est votre question ?<span class="required">*</span></p>
                    <input type="text" class="form-text" name="libelle">

                    <p>Catégorie de la question<span class="required">*</span></p>
                    <select class="form-text" name="categories">
                        <option value = "vide"></option>
                        <?php
                            $categories = $connexion->query('SELECT * FROM categorie')->fetchAll();
                            while ($row = $categories->fetch()):
                                echo '<option value="'.$row.'">'.htmlspecialchars($row["Libelle_categorie"]).'</option>';
                            endwhile;
                        ?>
                    </select>
                </div>
                <input type="submit" class="button" name="valider">
            </form>

            <?php
                if(isset($_POST["valider"]) && (empty($_POST["libelle"]) || $_POST["categories"] == "vide")){
                    echo'Veuillez remplir tous les champs';
                }

                elseif(isset($_POST["valider"]) && !empty($_POST["libelle"])){
                    $query = $connexion->prepare('INSERT INTO question (Titre_question, Date_creation_question, Id_profil, Id_categorie) VALUES (:Titre_question, :Date_creation_question, :Id_profil, :Id_categorie)');

                    $query->bindParam(':Titre_question', $Titre_question);
                    $query->bindParam(':Id_profil', $Id_profil);
                    $query->bindParam(':Id_categorie', $Id_categorie);
                    $query->bindParam(':Date_creation_question', $Date_creation_question);

                    $Titre_question = $_POST['libelle'];
                    $Id_profil = 1;
                    $Id_categorie = $_POST['categories'];
                    $Date_creation_question = date("Y-m-d");

                    $query->execute();
                    echo'<p class="text-center">Votre question a bien été envoyée</p>';
                }
            ?>
        </main>
    </body>
</html>