<?php
    include_once "BDInsert.php";
    include_once ("../Menu/Conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Informações</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../Estilo/TelaAllEstilo.css">
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

            <div class="text-center">
                <?php
                    if(isset($_POST["botaoInserir"]) && isset($_POST["cia"])){
                        $boolean1 = inserirHospede($_POST["cpf"], $_POST["nome"], $_POST["sobrenome"], $_POST["sexo"], $_POST["data"]);
                        $ciasAereas = implode(", ", $_POST["cia"]);
                        $boolean2 = inserirControle($_POST["cpf"], $_POST["pais"], $_POST["previsao"], $ciasAereas);
                        $boolean3 = inserirQuarto($_POST["numQuarto"], $_POST["tipoQuarto"], $_POST["precoDiaria"], $_POST["cpf"], $_POST["dataEntrada"]);
                        if(($boolean1 == true) && ($boolean2 == true) && ($boolean3 == true)){
                            echo ('<div class="alert alert-success" role="alert"><b>Dados Cadastrados Com Sucesso!</b></div>');
                            consultarHospede($_POST["cpf"]);
                            consultarControle($_POST["cpf"]);
                            consultarQuarto($_POST["cpf"]);
                        }
                    }
                ?>
            </div>

            <div>
                <div class="text-center">
                    <h3>Cadastrar Dados do Cliente</h3>
                </div>
                <form action="TelaInsert.php" method="post" class="needs-validation" novalidate>

                    <div class="row">

                        <div class="col">

                            <div class="text-center">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input type="text" id="cpf" name="cpf" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input type="text" id="sobrenome" name="sobrenome" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="data_hora">Data de Nascimento</label>
                                    <input type="date" id="data_hora" name="data" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="dataEntrada">Data de Entrada</label>
                                    <input type="date" id="dataEntrada" name="dataEntrada" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="tipoQuarto">Tipo de Quarto</label>
                                    <select class="form-control" name="tipoQuarto" id="tipoQuarto">
                                        <option value="Quarto Standard" selected>Quarto Standard</option>
                                        <option value="Quarto Deluxe">Quarto Deluxe</option>
                                        <option value="Quarto Superior">Quarto Superior</option>
                                        <option value="Suíte Júnior">Suíte Júnior</option>
                                        <option value="Suíte">Suíte</option>
                                        <option value="Suíte Presidencial">Suíte Presidencial</option>
                                        <option value="Quarto Familiar">SQuarto Familiar</option>
                                        <option value="Quarto Acessível">Quarto Acessível</option>
                                    </select>
                                </div>

                            </div>

                        </div>

                        <div class="col">

                            <div class="text-center">
                                <div class="form-group">
                                    <label for="previsao">Previsão de Dias de Estadia</label>
                                    <select class="form-control" name="previsao" id="previsao">
                                        <option value="3 dias" selected>3 dias</option>
                                        <option value="5 dias">5 dias</option>
                                        <option value="1 semana">1 semana</option>
                                        <option value="2 semana">2 semanas</option>
                                        <option value="3 semana ou mais">3 semanas ou mais</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Sexo</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="sexo" value="M" class="form-check-input" required> 
                                        <label class="form-check-label">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="sexo" value="F" class="form-check-input" required> 
                                        <label class="form-check-label">Feminino</label>
                                    </div>
                                </div>
                            

                                <div class="form-group">
                                    <label>País de origem</label><br>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="brasil" class="form-check-input" required> 
                                        <label class="form-check-label">Brasil</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="argentina" class="form-check-input" required> 
                                        <label class="form-check-label">Argentina</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="peru" class="form-check-input" required> 
                                        <label class="form-check-label">Peru</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="paraguai" class="form-check-input" required> 
                                        <label class="form-check-label">Paraguai</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="Uruguai" class="form-check-input" required> 
                                        <label class="form-check-label">Uruguai</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="pais" value="chile" class="form-check-input" required> 
                                        <label class="form-check-label">Chile</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Companhias aéreas</label>

                                    <div class="row">

                                        <div class="col">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="gol">
                                                <label class="form-check-label">GOL</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="azul">
                                                <label class="form-check-label">AZUL</label>
                                            </div>

                                        </div>

                                        <div class="col">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="trip">
                                                <label class="form-check-label">TRIP</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="avianca">
                                                <label class="form-check-label">AVIANCA</label>
                                            </div>

                                        </div>
                                        
                                        <div class="col">

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="rissetti">
                                                <label class="form-check-label">RISSETTI</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="cia[]" value="global">
                                                <label class="form-check-label">GLOBAL</label>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="numQuarto">Número do Quarto</label>
                                    <input type="text" id="numQuarto" name="numQuarto" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="precoDiaria">Preço da Diária</label>
                                    <input type="text" id="precoDiaria" name="precoDiaria" class="form-control" required>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="text-center">
                        <button type="submit" name="botaoInserir" class="btn btn-primary">Cadastrar Dados</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                var forms = document.getElementsByClassName('needs-validation');
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>
</body>
</html>
