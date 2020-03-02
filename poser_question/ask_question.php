<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/ask_question.css">
        <title>Poser une question</title>
    </head>
    <body class="body">
        <?php
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
                    <select id="categories" class="form-text">
                        <?php
                            $sql = 'SELECT Libelle_categorie FROM categorie';
                            $query = $connexion->query($sql);
                            $query->setFetchMode(PDO::FETCH_ASSOC);
                            while ($row = $query->fetch()):
                                echo '<option value="'.$row.'">'.htmlspecialchars($row["Libelle_categorie"]).'</option>';
                            endwhile;
                        ?>
                    </select>
                </div>
                <input type="submit" class="button" name="valider">
            </form>

            <?php
            require_once("traitement/verif_question.php");
            require_once("traitement/envoi_question.php");
            ?>
        </main>
    </body>
</html>