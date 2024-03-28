<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Somar Números Inteiros</title>
</head>
<body>
    <h1>3) Faça um programa em PHP que receba 5 números
        inteiros e armazene em um vetor. Após chame uma função
        que some estes valores e retorne o resultado.       
    </h1>
    <h2>Somar Números Inteiros</h2>
    <form action="" method="post">
        <label for="num1">Número 1:</label>
        <input type="number" id="num1" name="numeros[]" required><br><br>
        
        <label for="num2">Número 2:</label>
        <input type="number" id="num2" name="numeros[]" required><br><br>
        
        <label for="num3">Número 3:</label>
        <input type="number" id="num3" name="numeros[]" required><br><br>
        
        <label for="num4">Número 4:</label>
        <input type="number" id="num4" name="numeros[]" required><br><br>
        
        <label for="num5">Número 5:</label>
        <input type="number" id="num5" name="numeros[]" required><br><br>

        <input type="submit" value="Somar">
    </form>

    <?php
        // Função para somar os números inteiros
        function somarNumeros($numeros) {
            $soma = 0;
            foreach ($numeros as $numero) {
                $soma += $numero;
            }
            return $soma;
        }

        // Verifica se os números foram enviados pelo formulário
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numeros"])) {
            // Recupera os números do formulário
            $numeros = $_POST["numeros"];

            // Chama a função para somar os números
            $resultado = somarNumeros($numeros);
            echo "<p>A soma dos números é: $resultado</p>";
        }
    ?>
</body>
</html>
