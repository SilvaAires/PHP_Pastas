<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concatenar Strings</title>
</head>
<body>
    <h1>
        1) Escreva um programa que leia 3 strings, depois crie uma
        4ª string que contenha as 3 strings digitadas concatenadas,
        exibindo-a no final.
    </h1>
    <h2>Concatenar Strings</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="str1">String 1:</label>
        <input type="text" id="str1" name="str1" required><br><br>

        <label for="str2">String 2:</label>
        <input type="text" id="str2" name="str2" required><br><br>

        <label for="str3">String 3:</label>
        <input type="text" id="str3" name="str3" required><br><br>

        <input type="submit" value="Concatenar">
    </form>

    <?php
    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo os valores do formulário
        $str1 = $_POST["str1"];
        $str2 = $_POST["str2"];
        $str3 = $_POST["str3"];

        // Concatenando as strings
        $concatenada = $str1 . $str2 . $str3;

        // Exibindo a string concatenada
        echo "<p>Strings concatenadas: $concatenada</p>";
    }
    ?>
</body>
</html>
