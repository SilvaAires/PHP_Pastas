<?php
    $a = $_POST["s"];
    $b = $_POST["i"];

    if(($a == "feminino") && ($b < 25)){
        echo ("Mensagem aceita!<br>");
    }else{
        echo ("Mensagem não aceita!<br>");
    }
?>