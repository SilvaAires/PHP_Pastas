<?php
    $a = $_POST["s"];
    $b = $_POST["i"];

    if($a > $b){
        echo ($b." -> ".$a);
    }else{
        echo ($a." ->".$b);
    }
?>