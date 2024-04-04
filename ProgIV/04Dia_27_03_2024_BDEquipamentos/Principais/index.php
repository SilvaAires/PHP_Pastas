<?php
    include_once "../ConexaoBD/Conexao.php";
    include_once ("../Consulta/EquipamentoConsulta.php");
    include_once ("../Consulta/UsuarioConsulta.php");
    include_once ("../Inserir/EmprestimoInserir.php");
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
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css" />
</head>
<body>
    <header class="container header">
    <h3 class="usuario"><?php echo "Usuário Logado: ".$_SESSION["usuario_sessao"]; ?></h3>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="Index.php">Principal</a></li>
                <li><a href="../Consulta/TelaConsulta.php">Consultar informações</a></li>
                <li><a href="../Inserir/TelaInserir.php">Adicionar informações</a></li>
                <li><a href="../Alterar/TelaAlterar.php">Alterar informações</a></li>
                <li><a href="Sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="user-form">
            <h1>Informações de Usuários</h1>
            <?php consultarUser(); ?>
        </div>

        <div class="user-form">
            <h1>Informações de Equipamentos</h1>
            <?php consultarEqu(); ?>
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
                <label for="data_hora">Data e Hora:</label>
                <input type="datetime-local" id="data_hora" name="data_hora">
                <p>
                    <input type="submit" name="botaoEmp" value="Cadastrar Emprestimo">
                </p>
            </form>
        </div>
    </div>
</body>
</html>S