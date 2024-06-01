<?php
include_once __DIR__ . '/Controller/CarroDAO.php';
include_once __DIR__ . '/Model/Carro.php';
 

$carroDAO = new CarroDAO();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $carro = new Carro($carroDAO->selectPorId($id)->fetch());
    ?>
    <!doctype html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="css/materialize.css">
        <link rel="stylesheet" href="css/template.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>
    <body>
    <h2 class="center-align titulo corPadrao1">Edite o Carro</h2>

    <div class="container">
        <div class="row card">
            <div class="col s1"></div>
            <div class="col s10">
                <form action="Controller/CarroController.php?function=editar" method="post">
                    <input type="text" name="id" value="<?= $carro->getId() ?>" hidden>
                    <div class="input-field">
                        <input type="text" name="marca" id="marca" value="<?= $carro->getMarca() ?>">
                        <label for="marca">Marca</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="modelo" id="modelo" value="<?= $carro->getModelo() ?>">
                        <label for="modelo">Modelo</label>
                    </div>
                    <div class="input-field">
                        <input type="text" name="anoFabricacao" id="anoFabricacao" value="<?= $carro->getAnoFabricacao() ?>" maxlength="4" onkeyup="onlyNumbers(this)">
                        <label for="anoFabricacao">Ano de Fabricação</label>
                    </div>
                    <div class="center">
                        <button class="btn btn-submit corPadrao1">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/materialize.js"></script>
    <script src="js/onlynumbers.js"></script>    
    </body>
    </html>
    <?php
} else {
    header("Location: index.php?toast=acessoNegado");
}