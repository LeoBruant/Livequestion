<?php
    // page précédente

    echo'<nav class="nav bg-light">
        <p><a href="';
        if($_GET['page'] > 1){
            echo'les_questions.php?page='.($_GET['page'] - 1);
        }
        echo'" class="prev">«</a></p>';

        // numéros de page

        for ($i=0; $i < count($question)/30; $i++){
            if($_GET['page'] == ($i+1)){
                echo'<p class="page"><a style="color:rgb(150,0,200);" href="les_questions.php?page='.($i+1).'">'.($i+1).'</a></p>';
            }
            else{
                echo'<p class="page"><a href="les_questions.php?page='.($i+1).'">'.($i+1).'</a></p>';
            }
        }

        // page suivante

        echo'<p><a href="';
        if($_GET['page'] < count($question)/30){
            echo'les_questions.php?page='.($_GET['page'] + 1);
        }
        echo'" class="next">»</a></p>
    </nav>';
?>