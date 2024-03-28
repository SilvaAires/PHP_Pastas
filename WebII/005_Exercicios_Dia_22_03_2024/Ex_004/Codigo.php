<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Análise de Matriz</title>
</head>
<body>
    <h1>4) Faça um programa em PHP que leia valores e armazene
        em uma matriz de 3 por 3. Em seguida, escreva a matriz, a
        soma de todos os elementos e a soma dos elementos que
        estão na diagonal principal.
    </h1>
    <h2>Análise de Matriz</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <?php
        // Definindo a matriz de 3x3
        $matriz = array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0));

        // Lendo valores para preencher a matriz
        echo "<p>Insira os valores na matriz:</p>";
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                echo "<input type='number' name='matriz[$i][$j]' required>";
            }
            echo "<br>";
        }
        ?>

        <br>
        <input type="submit" value="Analisar Matriz">
    </form>

    <?php
    // Função para calcular a soma dos elementos da matriz
    function somaTotal($matriz) {
        $soma = 0;
        foreach ($matriz as $linha) {
            foreach ($linha as $valor) {
                $soma += $valor;
            }
        }
        return $soma;
    }

    // Função para calcular a soma dos elementos da diagonal principal
    function somaDiagonalPrincipal($matriz) {
        $soma = 0;
        for ($i = 0; $i < count($matriz); $i++) {
            $soma += $matriz[$i][$i];
        }
        return $soma;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo os valores da matriz do formulário
        $dados = $_POST['matriz'];

        // Escrevendo a matriz
        echo "<h3>Matriz:</h3>";
        echo "<table border='1'>";
        foreach ($dados as $linha) {
            echo "<tr>";
            foreach ($linha as $valor) {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        // Calculando e exibindo a soma total dos elementos
        $somaTotal = somaTotal($dados);
        echo "<p>A soma total dos elementos da matriz é: $somaTotal</p>";

        // Calculando e exibindo a soma dos elementos da diagonal principal
        $somaDiagonalPrincipal = somaDiagonalPrincipal($dados);
        echo "<p>A soma dos elementos da diagonal principal é: $somaDiagonalPrincipal</p>";
    }
    ?>
</body>
</html>
