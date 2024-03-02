<?php
    $n1 = $_POST["n1"];
    $n2 = $_POST["n2"];

    if($n1 <= $n2){
        for ($n1; $n1 <= $n2; $n1++){
            echo ((($n1 % 2) == 0) ?"Par".$n1."<br>" : "Impar".$n1."<br>");
        }
    }else{
        if ($n1 >= $n2){
            for ($n2; $n2 <= $n1; $n2++){
                echo ((($n2 % 2) == 0) ?"Par".$n2."<br>" : "Impar".$n2."<br>");
            }
        }
    }
?>