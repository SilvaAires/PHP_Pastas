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
    <title>Alterar informações</title>
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
            <?php
                combCPF();
                inputCPF();
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
                    echo ("<p><b>Dados alterados com sucesso!</b></p>");
                    //header("Location: TelaUpdate_Delete.php");
                }else{
                    if(isset($_POST['excDel'])){
                        delControle($_POST["cpf"]);
                        delHospede($_POST["cpf"]);
                        echo ("<p><b>Dados deletados com sucesso!</b></p>");
                        //header("Location: TelaUpdate_Delete.php");
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