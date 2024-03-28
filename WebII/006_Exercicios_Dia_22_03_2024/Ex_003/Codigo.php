<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Palavras</title>
</head>
<body>
    <h1>
        3) Escreva um programa que leia uma String e mostre a
        quantidade de palavras na String.       
    </h1>
    <h2>Contar Palavras</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="texto">Digite uma String:</label>
        <input type="text" id="texto" name="texto" required><br><br>

        <input type="submit" value="Contar Palavras">
    </form>

    <?php
    // Função para contar palavras em uma string
    function contarPalavras($texto) {
        // Usando a função str_word_count para contar palavras
        $quantidadePalavras = str_word_count($texto);
        return $quantidadePalavras;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo o texto do formulário
        $texto = $_POST["texto"];

        // Chamando a função para contar palavras
        $quantidadePalavras = contarPalavras($texto);

        // Exibindo a quantidade de palavras
        echo "<p>A quantidade de palavras na string é: $quantidadePalavras</p>";
    }
    ?>
</body>
</html>
