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

    function exe05_Emails($email){
        $aux = 0;
        $aux2 = 0; 
        $vetorEmail = str_split($email);
        for ($i = 0; $i < count($vetorEmail); $i++){
            if($vetorEmail[$i] == "@"){
                $aux = 1;
            }

            if($aux == 1 && $vetorEmail[$i] == "."){
                $aux2 ++;
            }
        }
        if(($aux == 1) && (($aux2 == 1) || ($aux2 == 2) || ($aux2 == 3))){
            echo ("<h1>Valido e-mail!</h1");
        }else{
            echo ("<h1>Invalido e-mail!</h1");
        }
    }

    function exe06_validaCPF($cpf) {
        // Remove todos os caracteres que não são dígitos
        $cpf = preg_replace('/[^0-9]/', '', $cpf);
    
        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se todos os dígitos são iguais, o que torna o CPF inválido
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Calcula o primeiro dígito verificador
        $sum = 0;
        for ($i = 0; $i < 9; $i++) {
            $sum += ($cpf[$i] * (10 - $i));
        }
        $remainder = $sum % 11;
        $digit1 = ($remainder < 2) ? 0 : (11 - $remainder);
    
        // Calcula o segundo dígito verificador
        $sum = 0;
        for ($i = 0; $i < 10; $i++) {
            $sum += ($cpf[$i] * (11 - $i));
        }
        $remainder = $sum % 11;
        $digit2 = ($remainder < 2) ? 0 : (11 - $remainder);
    
        // Verifica se os dígitos verificadores estão corretos
        if ($cpf[9] == $digit1 && $cpf[10] == $digit2) {
            return true;
        } else {
            return false;
        }
    }

    function exe07_calcularImpostoRenda($rendaMensal) {
        $imposto = 0;
    
        // Calcula o imposto de renda com base na renda mensal
        if ($rendaMensal <= 1903.98) {
            $imposto = 0;
        } elseif ($rendaMensal <= 2826.65) {
            $imposto = ($rendaMensal * 0.075) - 142.80;
        } elseif ($rendaMensal <= 3751.05) {
            $imposto = ($rendaMensal * 0.15) - 354.80;
        } elseif ($rendaMensal <= 4664.68) {
            $imposto = ($rendaMensal * 0.225) - 636.13;
        } else {
            $imposto = ($rendaMensal * 0.275) - 869.36;
        }
    
        return $imposto;
    }

    function exe08_anoBissexto($ano){
        //Dica: um ano é bissexto se:
        //For divisível por 4 e não for divisível por 100 ou
        //For divisível por 4 e por 400.
        if( ( ( ($ano % 4) == 0 ) && ( ($ano % 100) != 0 ) ) || 
            ( ( ($ano % 4) == 0 ) && ( ($ano % 400) == 0 ) ) ){
                return true;              
        }else{
            return false;
        }
    }

    function exe09_verificarIdade($idade) {
        if ($idade < 18) {
            // Se o aluno for menor de idade
            echo "<p style='color: red;'>Aluno Menor de Idade – É necessário a assinatura do Pai ou Responsável!</p>";
        } else {
            // Se o aluno for maior de idade
            echo "<p style='color: blue;'>Matrícula realizada com sucesso</p>";
        }
    }

    function exe10_criarTabela($linhas, $colunas, $conteudo) {
        echo "<h2>Tabela Gerada</h2>";
        echo "<table border='1'>";

        for ($i = 0; $i < $linhas; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $colunas; $j++) {
                echo "<td>$conteudo</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }

    function exe11_exibirImagem($url, $alt = "", $height = "", $width = "") {
        echo "<img src='$url' alt='$alt' height='$height' width='$width'>";
    }
?>