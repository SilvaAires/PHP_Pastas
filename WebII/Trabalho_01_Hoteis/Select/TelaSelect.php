<?php
    include_once "BDSelect.php";
    include_once "../Menu/Conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Dados</title>
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css">
</head>
<body>
    <header class="container header">       
        <nav class="menu-opcoes">
            <ul>
                <li><a href="../Menu/TelaMenu.php">Principal</a></li>
                <li><a href="../Insert/TelaInsert.php">Inserir informações</a></li>
                <li><a href="../Select/TelaSelect.php">Consultar informações</a></li>
                <li><a href="../Update_Delete/TelaUpdate_Delete.php">Alterar informações</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="div-container">
            <p><b>Pesquisar hospede por CPF</b></p>
            <?php
                comboCpf();
                inCPF();
                if(isset($_POST["comboHospede"])){
                    $op = $_POST["comboHospede"];
                    if($op != "0"){
                        consCPF($op);
                    }
                }else{
                    if(isset($_POST["cpf2"])){
                        $op = $_POST["cpf2"];
                        if($op != "0"){
                            consCPF($op);
                        }
                    }
                }
            ?>
            <p><b>Pesquisar hospede por nome</b></p>
            <?php
                comboNome();
                inNome();
                if(isset($_POST["comboHospede"])){
                    $op = $_POST["comboHospede"];
                    if($op != "0"){
                        consNome($op);
                    }
                }else{
                    if(isset($_POST["nome1"])){
                        $op = $_POST["nome1"];
                        if($op != "0"){
                            consNome($op);
                        }
                    }
                }
            ?>
            <p><b>Informações de todos Hospedes</b></p>
            <?php consAll(); ?>
        </div>
    </div>
</body>
</html>
