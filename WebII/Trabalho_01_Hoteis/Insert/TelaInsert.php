<?php
    include_once "BDInsert.php";
    include_once ("../Menu/Conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de informações</title>
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            <p><b>Cadastrar Dados do Cliente</b></p>
            <form action="TelaInsert.php" method="post">

                <p>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" required>
                </p>

                <p>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                </p>

                <p>
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" id="sobrenome" name="sobrenome" required>
                </p>

                <p>
                    <input type="radio" name="sexo" value="M" required> Masculino
                    <input type="radio" name="sexo" value="F" required> Feminino
                </p>

                <p>
                    <label for="data_hora">Data de Nascimento:</label>
                    <input type="date" id="data_hora" name="data" required>
                </p>

                <p>
                    <p><b>País de origem</b></p>
                    <input type="radio" name="pais" value="brasil" required> Brasil
                    <input type="radio" name="pais" value="argentina" required> Argentina
                    <input type="radio" name="pais" value="paraguai" required> Paraguai
                    <input type="radio" name="pais" value="Uruguai" required> Uruguai
                    <input type="radio" name="pais" value="chile" required> Chile
                    <input type="radio" name="pais" value="peru" required> Peru
                </p>

                <div class="mb-3">
                    <label for="" class="form-label">Previsão de Dias de Estadia</label>
                    <select class="form-select form-select-lg" name="previsao" id="previsao">
                        <option value="3 dias" selected>3 dias</option>
                        <option value="5 dias">5 dias</option>
                        <option value="1 semana">1 semana</option>
                        <option value="2 semana">2 semana</option>
                        <option value="3 semana ou mais">3 semana ou mais</option>
                    </select>
                </div>
                
                <div class="list-group">
                    <p><b>Companhias aéreas</b></p>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="gol"/>
                        GOL
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="azul"/>
                        AZUL
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="trip"/>
                        TRIP
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="avianca"/>
                        AVIANCA
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="rissetti"/>
                        RISSETTI
                    </label>
                    <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cia[]" value="global"/>
                        GLOBAL
                    </label>
                </div>
                
                <p>
                    <input type="submit" name="botaoInserir" value="Cadastrar Dados">
                </p>
            </form>
        </div>

        <div class="div-container">
            <?php
                if(isset($_POST["botaoInserir"]) && isset($_POST["cia"])){
                    $boolean1 = inserirHospede($_POST["cpf"], $_POST["nome"], $_POST["sobrenome"], $_POST["sexo"], $_POST["data"]);
                    $ciasAereas = implode(", ", $_POST["cia"]);
                    $boolean2 = inserirControle($_POST["cpf"], $_POST["pais"], $_POST["previsao"], $ciasAereas);
                    if(($boolean1 == true) && ($boolean2 == true)){
                        echo ('<p><b>Dados Cadastrados Com Sucesso!</b></p>');
                        consultarHospede($_POST["cpf"]);
                        consultarControle($_POST["cpf"]);
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>