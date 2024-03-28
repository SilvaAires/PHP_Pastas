<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter Caracteres</title>
</head>
<body>
    <h1>
        7) Escreva um programa que receba uma string e converta
        todos os caracteres dos índices pares para maiúsculo e
        todos os caracteres dos índices ímpares para minúsculo –
        exibindo o resultado na tela. (Ex: "arara" => "aRaRa").
    </h1>
    <h2>Converter Caracteres</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="texto">Digite uma String:</label>
        <input type="text" id="texto" name="texto" required><br><br>

        <input type="submit" value="Converter">
    </form>

    <?php
    // Função para converter caracteres de índices pares para maiúsculo e ímpares para minúsculo
    function converterCaracteres($texto) {
        $resultado = '';
        // Iterando sobre cada caractere na string
        for ($i = 0; $i < strlen($texto); $i++) {
            // Convertendo caracteres dos índices pares para maiúsculo e ímpares para minúsculo
            if ($i % 2 == 0) {
                $resultado .= strtoupper($texto[$i]);
            } else {
                $resultado .= strtolower($texto[$i]);
            }
        }
        return $resultado;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo a string do formulário
        $texto = $_POST["texto"];

        // Chamando a função para converter caracteres
        $resultado = converterCaracteres($texto);

        // Exibindo o resultado
        echo "<p>O resultado da conversão é: $resultado</p>";
    }
    ?>
</body>
</html>
