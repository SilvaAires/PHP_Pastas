<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>3) Escreva um programa que leia uma String e mostre a
    quantidade de palavras na String.
    </h1>
    <form name="entrada" method="POST">
        <h2>Digite Palavra:</h2>
        <input type="text" name="n">
        <br><br>
        <input type="submit" value="Mostrar">
    </form>
</body>
</html>

<?php
if(isset($_POST["n"])){
    $vetor = $_POST["n"];
    $string = explode(" ", $vetor);
    echo "<br>". count($string);
}
?>
