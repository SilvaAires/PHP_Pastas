<?php
    $n1 = $_POST["n1"];

    if(($n1 % 3) == 0){
        echo ("É divisivel por 3: ".($n1)."<br>");
    }else{
        echo ("Não é divisivel por 3: " . ($n1). "<br>");
    }

    
?>