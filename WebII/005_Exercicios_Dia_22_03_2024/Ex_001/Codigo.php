<!DOCTYPE html>
<html>
<head>
    <title>Análise de Números</title>
</head>
<body>

<h2>Análise de Números</h2>

<form method="post">
    <label for="numbers">Digite 6 números separados por vírgula:</label><br>
    <input type="text" id="numbers" name="numbers"><br><br>
    <button type="submit">Analisar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numbers = explode(",", $_POST["numbers"]);
    $evenCount = 0;
    $oddCount = 0;
    $evenNumbers = array();
    $oddNumbers = array();

    foreach ($numbers as $number) {
        $number = trim($number); // Remover espaços em branco
        if (is_numeric($number)) {
            if ($number % 2 == 0) {
                $evenCount++;
                $evenNumbers[] = $number;
            } else {
                $oddCount++;
                $oddNumbers[] = $number;
            }
        }
    }

    echo "<h3>Resultado:</h3>";
    echo "Quantidade de números pares: $evenCount<br>";
    echo "Números pares: " . implode(", ", $evenNumbers) . "<br>";
    echo "Quantidade de números ímpares: $oddCount<br>";
    echo "Números ímpares: " . implode(", ", $oddNumbers);
}
?>

</body>
</html>
