<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embaralhar Strings</title>
</head>
<body>
    <h1>
        8) Construir um programa que seja capaz de embaralhar
        uma string s1 com uma string s2 e colocar o resultado em
        uma string s3. Para embaralhar s1 com s2 é necessário
        preencher os índices pares de s3 com os elementos de s1 e
        os ímpares com os elementos de s2 até que os elementos
        de uma das duas strings termine e os demais elementos de
        S3 serão preenchidos com os elementos da string restante.
        Considere o índice 0 (zero) como sendo par. Por exemplo:
        • s1 = local
        • s2 = misterio
        • Nova string s3 = lmoicsatlerio
    </h1>
    <h2>Embaralhar Strings</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="str1">String 1:</label>
        <input type="text" id="str1" name="str1" required><br><br>

        <label for="str2">String 2:</label>
        <input type="text" id="str2" name="str2" required><br><br>

        <input type="submit" value="Embaralhar">
    </form>

    <?php
    // Função para embaralhar duas strings
    function embaralharStrings($s1, $s2) {
        $s3 = '';
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        $maxLength = max($len1, $len2);

        // Itera sobre o comprimento máximo entre s1 e s2
        for ($i = 0; $i < $maxLength; $i++) {
            // Adiciona o caractere de s1 se o índice for par ou se s2 acabou
            if ($i % 2 == 0 || $i >= $len2) {
                $s3 .= $s1[$i / 2] ?? '';
            } else {
                // Adiciona o caractere de s2 se o índice for ímpar ou se s1 acabou
                $s3 .= $s2[($i - 1) / 2] ?? '';
            }
        }
        return $s3;
    }

    // Verifica se os dados do formulário foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtendo os valores do formulário
        $str1 = $_POST["str1"];
        $str2 = $_POST["str2"];

        // Chamando a função para embaralhar as strings
        $str3 = embaralharStrings($str1, $str2);

        // Exibindo o resultado
        echo "<p>Resultado do embaralhamento: $str3</p>";
    }
    ?>
</body>
</html>
