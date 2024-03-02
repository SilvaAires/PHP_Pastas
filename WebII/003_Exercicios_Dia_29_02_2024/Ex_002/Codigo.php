<?php
    $n1 = $_POST["n1"];
    
    for ($i = 0; $i <= 100; $i+=$n1){
        echo ("Contador: " . ($i). "<br>");
    }
    echo ("<br>");
    for ($i = 100; $i >= 0; $i-=$n1){
        echo ("Contador: " . ($i). "<br>");
    }
?>