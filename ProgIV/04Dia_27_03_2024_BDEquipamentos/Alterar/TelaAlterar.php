<?php
    include_once "UsuarioUpdate.php";
    include_once "EquipamentoUpdate.php";
    include_once "EmprestimoUpdate.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["aux"] = "a";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Informações</title>
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css" />
</head>
<body>
    <header class="container header">
    <h3 class="usuario"><?php echo "Usuário Logado: ".$_SESSION["usuario_sessao"]; ?></h3>
        <nav class="menu-opcoes">
            <ul>
                <li><a href="../Principais/Index.php">Principal</a></li>
                <li><a href="../Consulta/TelaConsulta.php">Consultar informações</a></li>
                <li><a href="../Inserir/TelaInserir.php">Adicionar informações</a></li>
                <li><a href="../Alterar/TelaAlterar.php">Alterar informações</a></li>
                <li><a href="../Principais/Sair.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="user-form">
            <p>
                <b>Update Usuários</b>
            </p>
            <?php
                listarUsAlterar();

                if(isset($_POST["combo"])){
                    $op = $_POST["combo"];
                    if($op != "0"){
                        consUsAlt($op);
                    }
                }
                if(isset($_POST['altUs'])){
                    altUser($_POST["id"], $_POST["nome"], $_POST["senha"]);
                    header("Location: TelaAlterar.php");
                }else{
                    if(isset($_POST['excUs'])){
                        delUser($_POST["id"]);
                        header("Location: TelaAlterar.php");
                    }
                }
            ?>
        </div>

        <div class="user-form">
            <p>
                <b>Update Equipamentos</b>
            </p>
            <?php
                listarEquiAlterar();
                
                if(isset($_POST["comboEqui"])){
                    $op = $_POST["comboEqui"];
                    if($op != "0"){
                        consEquiAlt($op);
                    }
                }
                if(isset($_POST['altEq'])){
                    altEq($_POST["id"], $_POST["descricao"], $_POST["setor"]);
                    header("Location: TelaAlterar.php");
                }else{
                    if(isset($_POST['excEq'])){
                        delEq($_POST["id"]);
                        header("Location: TelaAlterar.php");
                    }
                }
            ?>
        </div>

        <div class="user-form">
            <p>
                <b>Update Emprestimos</b>
            </p>
            <?php
                listarEmpAlterar();

                if(isset($_POST["comboEmp"])){
                    $op = $_POST["comboEmp"];
                    if($op != "0"){
                        consEmpAlt($op);
                    }
                }
                if(isset($_POST['altEmp'])){
                    altEmp($_POST["id"], $_POST["equipamento"], $_POST["usuario"]);
                    header("Location: TelaAlterar.php");
                }else{
                    if(isset($_POST['excEmp'])){
                        delEmp($_POST["id"]);
                        header("Location: TelaAlterar.php");
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>