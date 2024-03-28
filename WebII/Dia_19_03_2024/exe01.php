<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>1) Escreva um programa que leia 3 strings, depois crie uma
4ª string que contenha as 3 strings digitadas concatenadas,
exibindo-a no final.
        </h1>
    <form name="entrada" method="POST">
        <h2>Digite Letra:</h2>
        <input type="text" name="n[]">
        <br>
        <h2>Digite Letra:</h2>
        <input type="text" name="n[]">
        <br>
        <h2>Digite Letra:</h2>
        <input type="text" name="n[]">
        <br><br>
        <input type="submit" value="Mostrar">
    </form>
</body>
</html>

<?php
if(isset($_POST["n"])){
    $vetor = $_POST["n"];
$string = implode(", ", $vetor);
echo "<br>".$string;
}
?>
