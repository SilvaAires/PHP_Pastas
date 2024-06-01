<?php 
	include_once __DIR__ . '/../Rotas/Constantes.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Carros</title>
    <link rel="stylesheet" href="<?=HOME?>src/View/css/materialize.css">
    <link rel="stylesheet" href="<?=HOME?>src/View/css/template.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <h2 class="center-align titulo corPadrao1">Cadastre Um Carro</h2>

    <div class="container">
        <div class="row card">
            <div class="col s1"></div>
            <div class="col s10">
            	<form method='post' action='<?=HOME?>controller/cadastrar'>
            		<div class='input-field'>
            			<input type='text' name='marca' id='marca' autocomplete='off' required>
            			<label for='marca'>Marca</label>
            		</div>
            		<div class='input-field'>
            			<input type='text' name='modelo' id='modelo' autocomplete='off' required>
            			<label for='modelo'>Modelo</label>
            		</div>
            		<div class='input-field'>
            			<input type='text' name='anoFabricacao' id='anofabricacao' autocomplete='off' required onkeyup='onlyNumbers(this)' maxlength='4'>
            			<label for='anofabricacao'>Ano de Fabricação</label>
            		</div>
            		<div class='center'>
            			<button class='btn btn-submit corPadrao1'>Cadastrar</button>
            		</div>
            	</form>
            	<div class='center-align'>
            		<a href='<?=HOME?>' class='btn btn-submit corPadrao1'>Voltar</a>
            	</div>
            
            </div>
        </div>              
    </div>

<script src="<?=HOME?>src/View/js/jquery-3.3.1.min.js"></script>
<script src="<?=HOME?>src/View/js/materialize.js"></script>
<script src="<?=HOME?>src/View/js/onlynumbers.js"></script>
</body>
</html>