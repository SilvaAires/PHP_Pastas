<?php
    session_start();
    if(isset($_SESSION["usuario_sessao"])){
        header('Location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <a href="index.php">Home</a>
    <a href="cadastro.php">Cadastro</a>
    <a href="sair.php">Sair</a>
</body>
</html>