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
            <p><b>Pesquisar Hospede</b></p>
            <?php
                comboCpf();
                if(isset($_POST["comboHospede"])){
                    $op = $_POST["comboHospede"];
                    if($op != "0"){
                        consCPF($op);
                    }
                }
            ?>
            <p><b>Informações de todos Hospedes</b></p>
            <?php consAll(); ?>
        </div>
    </div>
</body>
</html>
