<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inverter String</title>
</head>
<body>
    <h1>
        5) Escreva um programa que leia uma String e crie uma
        outra String que seja o inverso da primeira.
    </h1>
    <h2>Inverter String</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="texto">Digite uma String:</label>
        <input type="text" id="texto" name="texto" required><br><br>

        <input type="submit" value="Inverter String">
    </form>

    <?php
    // Função para inverter uma string
    function inverterString($texto) {
        return strrev($texto);
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo a string do formulário
        $texto = $_POST["texto"];

        // Chamando a função para inverter a string
        $textoInvertido = inverterString($texto);

        // Exibindo a string invertida
        echo "<p>A string invertida é: $textoInvertido</p>";
    }
    ?>
</body>
</html>
