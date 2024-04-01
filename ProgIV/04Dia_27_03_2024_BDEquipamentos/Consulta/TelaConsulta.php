<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    include_once "UsuarioConsulta.php";
    include_once "EquipamentoConsulta.php";
    include_once "EmprestimoConsulta.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de dados</title>
    <link rel="stylesheet" href="../Estilo/TelaConsultaEstilo.css">
</head>
<body>
    <header class="container header">
        <p class="usuario">Nenhum usuário logado</p>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="../Index.php">Principal</a></li>
                <li><a href="../Consulta/TelaConsulta.php">Consultar informações</a></li>
                <li><a href="../Inserir/TelaInserir.php">Adicionar informações</a></li>
                <li><a href="../Alterar/TelaAlterar.php">Alterar informações</a></li>
                <li><a href="../Sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="div-container">
            <h1>Informações dos Usuários</h1>
            <?php consultarUser(); ?>
        </div>

        <div class="div-container">
            <h1>Informações dos Equipamentos</h1>
            <?php consultarEqu(); ?>
        </div>

        <div class="div-container">
            <h1>Informações dos Empréstimos</h1>
            <?php consultarEmp(); ?>
        </div>
    </div>
</body>
</html>