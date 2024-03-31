<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION["usuario_sessao"])){
        header('Location: login.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <header class="container">
        <p class="usuario">Nenhum usuário logado</p>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="Consulta/TelaConsulta.php">Consultar informações</a></li>
                <li><a href="Inserir/TelaInserir.php">Adicionar informações</a></li>
                <li><a href="Alterar/TelaAlterar.php">Alterar informações</a></li>
                <li><a href="sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>