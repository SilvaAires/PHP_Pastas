<?php
    $x = $_POST["n1"];
    $y = $_POST["n2"];
    
    $pot = 0;
    for ($i = 0; $i < $y; $i++){
        if($i == 0){
            $pot = $x * 1;
        }else{
            $pot= $pot * $x;
        }      
    }
    echo ("Resultado: ".$pot);
?>