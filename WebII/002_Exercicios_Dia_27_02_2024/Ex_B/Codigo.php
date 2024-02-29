<?php
    $numero = $_POST["numero"];

    if (($numero % 2) == 0) {
        echo ("Par o número: " . ($numero). "<br>");
    }else{
        echo ("Impar o número: " . ($numero). "<br>");
    }
?>