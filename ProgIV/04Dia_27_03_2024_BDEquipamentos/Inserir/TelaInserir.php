<?php
    include_once "../Inserir/EmprestimoInserir.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de dados</title>
    <link rel="stylesheet" href="../Estilo/TelaInserirEstilo.css" />
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
    <div class="container"> <!-- Envolve as divs em um container -->
        <div class="user-form">
            <h1>Cadastrar Usuário</h1>
            <form action="../Inserir/UsuarioInserir.php" method="post">
                <p>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome">
                </p>
                <p>
                    <label for="senha">Senha:</label>
                    <input type="text" id="senha" name="senha">
                </p>
                <p>
                    <input type="submit" name="b" value="Cadastrar Usuário">
                </p>
            </form>
        </div>

        <div class="user-form">
            <h1>Cadastrar Equipamento</h1>
            <form action="../Inserir/EquipamentoInserir.php" method="post">
                <p>
                    <label for="descricao">Descrição:</label>
                    <input type="text" id="descricao" name="descricao">
                </p>
                <p>
                    <label for="setor">Setor:</label>
                    <input type="text" id="setor" name="setor">
                </p>
                <p>
                    <input type="submit" name="botaoEqui" value="Cadastrar Equipamento">
                </p>
            </form>
        </div>

        <div class="user-form">
            <h1>Cadastrar Emprestimo</h1>
            <form action="../Inserir/EmprestimoInserir.php" method="post">
                <p>
                    <label for="nome3">Lista de Nome:</label>
                    <?php
                        echo listarUser();
                    ?>
                </p>
                <p>
                    <label for="email3">Lista de Equipamentos:</label>
                    <?php
                        echo listarEqui();
                    ?>
                </p>
                <p>
                    <input type="submit" name="botaoEmp" value="Cadastrar Emprestimo">
                </p>
            </form>
        </div>
    </div>
</body>
</html>