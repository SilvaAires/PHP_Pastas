<?php
    for ($i = 1; $i <= 300; $i++){
        if ( (($i % 5) == 0) && ($i % 4) == 0){
            echo ("Multiplos de 5 e de 4: ". $i ."<br>");
        }
    }
?>