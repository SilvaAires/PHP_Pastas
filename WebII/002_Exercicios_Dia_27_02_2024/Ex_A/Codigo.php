<?php
    $numero = $_POST["numero"];

    if($numero > 20){
        echo ("Metade do número: " . ($numero / 2). "<br>");
    }else{
        echo ("Número digitado: " . ($numero). "<br>");
    }
    
?>