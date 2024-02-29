<?php
    $a = $_POST["n1"];
    $b = $_POST["n2"];
    $c = $_POST["n3"];

    if(($a > $b) && ($a > $c)){
        echo ($a);
    }else{
        if(($b > $a) && ($b > $c)){
            echo ($b);
        }else{
            if(($c > $a) && ($c > $b)){
                echo ($c);
            }
        }
    }
?>