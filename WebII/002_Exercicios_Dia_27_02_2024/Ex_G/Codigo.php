<?php
    $n1 = $_POST["n1"];

    if(($n1 >= 20) && ($n1 <= 90)){
        echo ("Resultado: ".($n1)."<br>");
    }else{
        echo ("Erro: ".($n1)."<br>");
    }
?>