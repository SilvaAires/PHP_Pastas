<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contar Ocorrências de Caracteres</title>
    <style>
        table {
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>
        6)Escreva um programa que receba uma string e imprima
        uma tabela que informe o número de ocorrências de cada
        caracter na string.
    </h1>
    <h2>Contar Ocorrências de Caracteres</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="texto">Digite uma String:</label>
        <input type="text" id="texto" name="texto" required><br><br>

        <input type="submit" value="Contar Ocorrências">
    </form>

    <?php
    // Função para contar ocorrências de caracteres em uma string
    function contarOcorrencias($texto) {
        // Array para armazenar as contagens de caracteres
        $ocorrencias = array();

        // Convertendo a string para caracteres minúsculos para evitar diferenciação de maiúsculas e minúsculas
        $texto = strtolower($texto);

        // Iterando sobre cada caractere na string
        for ($i = 0; $i < strlen($texto); $i++) {
            $caractere = $texto[$i];
            // Incrementando a contagem para o caractere atual
            if (ctype_alpha($caractere)) { // Verificando se o caractere é uma letra
                if (isset($ocorrencias[$caractere])) {
                    $ocorrencias[$caractere]++;
                } else {
                    $ocorrencias[$caractere] = 1;
                }
            }
        }
        return $ocorrencias;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo a string do formulário
        $texto = $_POST["texto"];

        // Chamando a função para contar ocorrências
        $ocorrencias = contarOcorrencias($texto);

        // Exibindo a tabela de ocorrências
        echo "<h3>Tabela de Ocorrências</h3>";
        echo "<table>";
        echo "<tr><th>Caractere</th><th>Ocorrências</th></tr>";
        foreach ($ocorrencias as $caractere => $ocorrencia) {
            echo "<tr><td>$caractere</td><td>$ocorrencia</td></tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>
