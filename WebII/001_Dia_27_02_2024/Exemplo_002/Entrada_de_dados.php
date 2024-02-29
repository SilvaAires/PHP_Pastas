<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrada de Dados</title>
</head>
<body>
    <h1>Entrada de dados para o Programa em PHP via POST</h1>
    <form name="entrada" method="post" action="#">
        <h2>Variavel a:</h2>
        <input type="text" name="a">
        <br>
        <h2>Variavel b:</h2>
        <input type="text" name="b">
        <br>
        <br>
        <input type="submit" value="Iniciar">
    </form>
    <?php
        if(isset($_POST["a"]) && isset($_POST["b"])){
            $a = $_POST["a"];
            $b = $_POST["b"];

            echo ("Variavel A: " . $a . "<br>");
            echo ("Variavel B: " . $b);
        }
        /*php
        $a = $_POST["a"];
        $b = $_POST["b"];

        echo ("Variavel A: " . $a . "<br>");
        echo ("Variavel B: " . $b);
        */
    ?>
</body>
</html>