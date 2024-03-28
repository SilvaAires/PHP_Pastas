<!DOCTYPE html>
<html>
<head>
    <title>Análise de Temperaturas</title>
</head>
<body>

<h2>Análise de Temperaturas</h2>

<form method="post">
    <?php
    // Array associativo com os nomes dos meses
    $months = array(
        "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
        "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
    );

    // Loop para criar campos de entrada para cada mês
    foreach ($months as $index => $month) {
        echo "<label for='temp$index'>Temperatura média de $month:</label>";
        echo "<input type='text' id='temp$index' name='temperatures[]'><br>";
    }
    ?>
    <br>
    <button type="submit">Analisar</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $temperatures = $_POST['temperatures'];
    $minTemperature = $temperatures[0];
    $maxTemperature = $temperatures[0];
    $minMonth = $maxMonth = $months[0];

    // Loop para encontrar a menor e a maior temperatura média e seus respectivos meses
    for ($i = 1; $i < count($temperatures); $i++) {
        if ($temperatures[$i] < $minTemperature) {
            $minTemperature = $temperatures[$i];
            $minMonth = $months[$i];
        }
        if ($temperatures[$i] > $maxTemperature) {
            $maxTemperature = $temperatures[$i];
            $maxMonth = $months[$i];
        }
    }

    echo "<h3>Resultado:</h3>";
    echo "Mês com menor temperatura média: $minMonth ($minTemperature °C)<br>";
    echo "Mês com maior temperatura média: $maxMonth ($maxTemperature °C)";
}
?>

</body>
</html>
