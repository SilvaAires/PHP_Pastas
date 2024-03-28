<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Vogais</title>
</head>
<body>
    <h1>
        2) Escreva um programa que leia uma String e mostre a
        quantidade de vogais na String.
    </h1>
    <h2>Contar Vogais</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="texto">Digite uma String:</label>
        <input type="text" id="texto" name="texto" required><br><br>

        <input type="submit" value="Contar Vogais">
    </form>

    <?php
    // Função para contar vogais em uma string
    function contarVogais($texto) {
        // Define uma lista de vogais
        $vogais = ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'];
        $contagem = 0;
        // Itera sobre cada caractere da string
        for ($i = 0; $i < strlen($texto); $i++) {
            // Verifica se o caractere é uma vogal
            if (in_array($texto[$i], $vogais)) {
                $contagem++;
            }
        }
        return $contagem;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo o texto do formulário
        $texto = $_POST["texto"];

        // Chamando a função para contar vogais
        $quantidadeVogais = contarVogais($texto);

        // Exibindo a quantidade de vogais
        echo "<p>A quantidade de vogais na string é: $quantidadeVogais</p>";
    }
    ?>
</body>
</html>
