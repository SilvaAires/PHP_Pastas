<?php
    include_once ("BDUpdate_Delete.php");
    include_once ("../Menu/Conexao.php");
    include_once ("../Select/BDSelect.php");
?>
<!DOCTYPE html>
<html lang="en">
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
                <div class="col">
                    <div class="text-center">
                        <?php
                            combCPF();
                        ?>
                    </div>
                </div>
                <div class="col">
                    <div class="text-center">
                        <?php
                            inputCPF();
                        ?>
                    </div>
                </div>
            </div>
            <?php
                if(isset($_POST["cpf2"])){
                    $op = $_POST["cpf2"];
                    if($op != "0"){
                        updateCPF($op);
                    }
                }else{
                    if(isset($_POST["comboUp"])){
                        $oap = $_POST["comboUp"];
                        if($oap != "0"){
                            updateCPF($oap);
                        }
                    }
                }
                if(isset($_POST['altUp'])){
                    altHospede($_POST["cpf"], $_POST["nome"], $_POST["sobrenome"], $_POST["sexo"], $_POST["data"]);
                    $ciasAereas = implode(", ", $_POST["cia"]);
                    altControle($_POST["cpf"], $_POST["pais"], $_POST["previsao"], $ciasAereas);
                    echo ('<div class="alert alert-success success-msg" role="alert"><b>Dados alterados com sucesso!</b></div>');
                }else{
                    if(isset($_POST['excDel'])){
                        delControle($_POST["cpf"]);
                        delHospede($_POST["cpf"]);
                        echo ('<div class="alert alert-success success-msg" role="alert"><b>Dados deletados com sucesso!</b></div>');
                    }
                }
                if(isset($_POST["cpf"])){
                    consCPF($_POST["cpf"]);
                }
            ?>
        </div>
    </div>
</body>
</html>
