<?php
    echo ("<table border=\"1\" width=\"300px\">");
    for ($i = 0; $i <= 10; $i++) {
        echo ("<tr><b>");
        for ($j = 0; $j <= 10; $j++) {
            echo ("<td><b> Resultado:". ($i * $j) ."</b></td>"); 
            echo ("<td><b>sss</b></td>");
        }
        echo ("</b></tr>");
    }
    echo ("</table>");
?>