<?php
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];
    
    $res = $n1 + $n2;
    if ($res >= 10){
        echo ("Resultado: " . ($res). "<br>");
    }else{
        echo ("Menor que dez");
    }
?>