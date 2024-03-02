<?php
$aux = 0;
    for ($i = 10; $i <= 80; $i++) {
        if(($i % 2) == 0) {
            $aux += $i;
            echo ("Pares: ". $i ."<br>");
            echo ("Soma: ". $aux ."<br>");
            echo ("--------------------<br>");
        }
    }
    echo ("Soma: ". $aux ."<br>");
?>