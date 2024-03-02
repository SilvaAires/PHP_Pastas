<?php
    $n1 = $_POST["n1"];

    $fat = 0;
    for ($i = 0; $i <= $n1; $i++){
        if ($i == 0){
            $fat = 1;
        }else{
            $fat = $fat * $i;
        }
    }
    echo ("Resultado: ". $fat ."");
?>