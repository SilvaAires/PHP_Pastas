<?php
    if((isset($_GET["raio"])) && ($_GET["raio"] != null)){
        define( "pi",3.14);

        $raio = $_GET["raio"];
        $area = pi*$raio*$raio;
    
        echo ("". $raio ."<br><br>". $area ."");
    }
?>