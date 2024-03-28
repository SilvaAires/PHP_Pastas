<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicio 08</title>
</head>
<body>
    <h1>8) Crie um programa em PHP que recebe um ano por
        parâmetro e escreve se este é um ano bissexto ou não.
        </h1>
    <form name="entrada" method="post" >
        <h2>Digite um ano:</h2>
        <input type="number" name="n1">
        <br><br>
        <input type="submit" value="Verificar">
    </form>
</body>
</html>

<?php
    include_once '004_Exercicios_Dia_13_03_2024\Funcoes_dos_Exercicios.php';

    if (isset($_POST['n1'])){
        $boolean = exe08_anoBissexto($_POST["n1"]);
        if ($boolean) {
            echo ("Ano Bissexto");
        }else{
            echo ("Ano normal");
        }
    }
?>