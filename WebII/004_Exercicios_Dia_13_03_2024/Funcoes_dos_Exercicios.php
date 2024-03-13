<?php
    function exe01_Multiplicacao($numero){
        echo ('<table border = "1"> Tabela do '.$numero);
        for ($j = 0; $j <= 10; $j++){
            echo ("<tr>");
            echo ("<td>". $j * $numero ."</td>");
            echo ("</tr>");
        }
        echo ('</table>');
    }

    function exe02_NumeroPrimo(){
        $aux = 0;
        for($i = 1; $i <= 100; $i++){
            for($j = 1; $j <= 100; $j++){
                if($i % $j == 0){
                 $aux++;
                }
            }
            if($aux==2){
                echo ("Primo: ". $i ."<br>");
            }
        $aux = 0;
        }
    }

    function exe03_Fibonacci($x){
        $proximo = 1;
        $anterior = 1;

        for ($i = 1; $i <= $x; $i++){
            $fibonacci = $i < 3 ? 1 : ($proximo + $anterior);
            echo ("Fibonacci: ". $fibonacci ."<br>");
            $anterior = $proximo;
            $proximo = $fibonacci; 
        }
    }

    function exe04_dataAtual(){
        $agora = time();
        $data = getdate($agora);
        $mes = "";

        $semana = array("Domingo, ", "Segunda, ", "Terça, ", "Quarta, ", "Quinta, ", "Sexta, ", "Sabado, ");
        for ($i = 0; $i < 7; $i++){
            if($data["wday"] == $i){
                echo ($semana[$i]);
            }
        }
        $meses = array ("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro");
        for ($i = 1; $i < 13; $i++){
            if($data["mon"] == $i){
                $mes = $meses[$i - 1];
            }
        }                                           

        $data_atual = $data["mday"] . " de " . $mes . " de " . $data["year"];
        return $data_atual;
    }
?>