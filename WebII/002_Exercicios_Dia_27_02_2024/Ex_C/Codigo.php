<?php
    $numero = $_POST["numero"];

    if ($numero <= 0){
        echo ("Negativo: " . ($numero). "<br>");
    }else{
        if ($numero >= 0){
            echo ("Positivo: " . ($numero). "<br>");
        }else{
            echo ("Nulo: " . ($numero). "<br>");;
        }
    }

?>