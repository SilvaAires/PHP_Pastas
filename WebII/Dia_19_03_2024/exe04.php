<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>4) Escreva um programa que leia uma String
correspondendo ao nome de uma pessoa e crie uma nova
String contendo apenas as iniciais do nome. (Ex: "João da
Silva" => "JdS")
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
    $aux = " ";
    for($i = 0; $i < count($string)-1; $i++){
        $aux += substr($string[$i],2,1);
    }
    echo $aux;

}
?>
