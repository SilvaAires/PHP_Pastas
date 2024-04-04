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
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css">
</head>
<body>
    <header class="container header">
    <h3 class="usuario"><?php echo "Usuário Logado: ".$_SESSION["usuario_sessao"]; ?></h3>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="../Principais/index.php">Principal</a></li>
                <li><a href="../Consulta/TelaConsulta.php">Consultar informações</a></li>
                <li><a href="../Inserir/TelaInserir.php">Adicionar informações</a></li>
                <li><a href="../Alterar/TelaAlterar.php">Alterar informações</a></li>
                <li><a href="../Principais/Sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="div-container">
            <h1>Pesquisar Usuário</h1>
            <?php
                listarUsCons();
                if(isset($_POST["comConsUs"])){
                    $op = $_POST["comConsUs"];
                    if($op != "0"){
                        consUsCons($op);
                    }
                }
            ?>
            <h1>Informações dos Usuários</h1>
            <?php consultarUser(); ?>
        </div>

        <div class="div-container">
            <h1>Pesquisar Equipamento</h1>
            <?php
                listarEquiCons();
                if(isset($_POST["comboEquiCons"])){
                    $op = $_POST["comboEquiCons"];
                    if($op != "0"){
                        consEquiCons($op);
                    }
                }
            ?>
            <h1>Informações dos Equipamentos</h1>
            <?php consultarEqu(); ?>
        </div>

        <div class="div-container">
            <h1>Pesquisar Emprestimos</h1>
            <?php
                listarEmpConsr();
                if(isset($_POST["comboEmpCons"])){
                    $op = $_POST["comboEmpCons"];
                    if($op != "0"){
                        consEmpConsulta($op);
                    }
                }
            ?>
            <h1>Informações dos Emprestimos</h1>
            <?php consultarEmp(); ?>
        </div>
    </div>
</body>
</html>