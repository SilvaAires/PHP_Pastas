<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extrair Iniciais</title>
</head>
<body>
    <h1>
        4) Escreva um programa que leia uma String
        correspondendo ao nome de uma pessoa e crie uma nova
        String contendo apenas as iniciais do nome. (Ex: "João da
        Silva" => "JdS")
    </h1>
    <h2>Extrair Iniciais</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="nome">Digite o Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <input type="submit" value="Extrair Iniciais">
    </form>

    <?php
    // Função para extrair iniciais do nome
    function extrairIniciais($nome) {
        // Dividindo o nome em palavras
        $palavras = explode(' ', $nome);
        $iniciais = '';
        // Iterando sobre as palavras para extrair as iniciais
        foreach ($palavras as $palavra) {
            $iniciais .= substr($palavra, 0, 1);
        }
        return strtoupper($iniciais); // Convertendo para maiúsculas
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo o nome do formulário
        $nome = $_POST["nome"];

        // Chamando a função para extrair iniciais
        $iniciais = extrairIniciais($nome);

        // Exibindo as iniciais
        echo "<p>As iniciais do nome são: $iniciais</p>";
    }
    ?>
</body>
</html>
