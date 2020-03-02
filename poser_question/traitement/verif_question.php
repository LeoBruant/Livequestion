<?php
    if(isset($_POST["valider"]) && empty($_POST["libelle"])){
        echo'Veuillez remplir tous les champs';
    }

    elseif(isset($_POST["valider"]) && !empty($_POST["libelle"])){
        echo'Veuillez remplir tous les champs';
        header('Location: ../index.php');
        exit();
    }
?>