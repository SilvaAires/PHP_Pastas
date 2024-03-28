<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encontrar Maior Valor</title>
</head>
<body>
    <h1>5) Faça um programa em PHP que leia valores e armazene
        em uma matriz de 3 por 3. A seguir, chame uma função que
        retorne o maior valor da matriz.
    </h1>
    <h2>Encontrar Maior Valor em uma Matriz</h2>
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
        <input type="submit" value="Encontrar Maior Valor">
    </form>

    <?php
    // Função para encontrar o maior valor na matriz
    function encontrarMaiorValor($matriz) {
        $maior = $matriz[0][0];
        foreach ($matriz as $linha) {
            foreach ($linha as $valor) {
                if ($valor > $maior) {
                    $maior = $valor;
                }
            }
        }
        return $maior;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo os valores da matriz do formulário
        $dados = $_POST['matriz'];
        // Chamando a função para encontrar o maior valor na matriz
        $maiorValor = encontrarMaiorValor($dados);
        echo "<p>O maior valor na matriz é: $maiorValor</p>";
    }
    ?>
</body>
</html>
