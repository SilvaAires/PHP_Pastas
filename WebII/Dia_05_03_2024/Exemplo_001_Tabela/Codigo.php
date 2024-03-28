<?php
    echo ("<table border=\"1\" width=\"300px\">");
    $aux = 1;
    for ($i = 0; $i <= 2; $i++) {
        echo ("<tr><b>");
        for ($j = 0; $j <= 3; $j++) {
            echo ("<td><b> $aux </b></td>");
            $aux++;
        }
        echo ("</b></tr>");
    }
    echo ("</table>");
?>