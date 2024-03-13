<?php
    include_once 'C:\xampp\htdocs\PHP_Pastas\WebII\004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    echo ('<table border = "1"> Tabela do 0 ao 10');
    for ($i = 0; $i <= 10; $i++){
        echo ('<tr>');
        for ($j = 0; $j <= 10; $j++){
            echo ("<td>". $i * $j ."</td>");
        }
        echo ('<tr>');
    }
    echo ('</table>');
    echo ("<br>");
    
    exe01_Multiplicacao($_POST["n1"]);
?>