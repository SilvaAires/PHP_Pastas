<?php
    include_once "BDSelect.php";
    include_once "../Menu/Conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css">
    <title>Hotel Management</title>
</head>
<body>
    <header class="container header">       
        <nav class="menu-opcoes">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link" href="../Menu/TelaMenu.php">Principal</a></li>
                <li class="nav-item"><a class="nav-link" href="../Insert/TelaInsert.php">Inserir Informações</a></li>
                <li class="nav-item"><a class="nav-link" href="../Select/TelaSelect.php">Consultar Informações</a></li>
                <li class="nav-item"><a class="nav-link" href="../Update_Delete/TelaUpdate_Delete.php">Alterar Informações</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="div-container">
            <div class="row">
                <div id="direita" class="col">
                    <div class="text-center">
                        <p><b>Pesquisar hospede por CPF</b></p>
                        <?php
                            comboCpf();
                            inCPF();
                        ?>
                    </div>
                </div>
                <div id="esquerda" class="col">
                    <div class="text-center">
                        <p><b>Pesquisar hospede por nome</b></p>
                        <?php
                            comboNome();
                            inNome();
                        ?>
                    </div>
                </div>
            </div>
            <div id="embaixo" class="text-center">
                <?php 
                    if(isset($_POST["comboHospedeCPF"])){
                        $op = $_POST["comboHospedeCPF"];
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
            </div>
            <div id="embaixo" class="text-center">
                <?php consAll(); ?>
            </div>
        </div>
    </div>
</body>
</html>
