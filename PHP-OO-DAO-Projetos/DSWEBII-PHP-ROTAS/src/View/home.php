<?php
	include_once __DIR__ . '/../Controller/CarroDAO.php';
	include_once __DIR__ . '/../Rotas/Constantes.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">    
    <title>Carros</title>
    <link rel="stylesheet" href="<?=HOME?>src/View/css/materialize.css">
    <link rel="stylesheet" href="<?=HOME?>src/View/css/template.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<h2 class="center-align titulo corPadrao1 tituloTemplate">Selecione um Carro</h2>

<div class="container">
    <div class="row card">
        <div class="col s1"></div>
        <div class="col s10">
            <div class="input-field col s6">
                <select id="selectMarca"></select>
            </div>
            <div class="input-field col s6">
                <select id="selectModelo"></select>
            </div>
            <div class="center-align col s4">
                <button class="btn btn-submit corPadrao1" id="btnBuscarMarca">Buscar por Marca</button>
            </div>
            <div class="center-align col s4">
                <button class="btn btn-submit corPadrao1" id="btnBuscarTodos">Buscar Todos</button>
            </div>
            <div class="center-align col s4">
                <button class="btn btn-submit corPadrao1" id="btnBuscarModelo">Buscar por Modelo</button>
            </div>
            <div id="pasteHere" class="center-align"></div>
            <div class="center-align">
                <a href="<?=HOME?>cadastrar" class="btn btn-submit corPadrao1" id="cadastrar">Cadastrar Carro</a>
            </div>
        </div>
    </div>    
</div>

<script src="<?=HOME?>src/View/js/jquery-3.3.1.min.js"></script>
<script src="<?=HOME?>src/View/js/materialize.js"></script>
<script src="<?=HOME?>src/View/js/toast.js"></script>
<script src="<?=HOME?>src/View/js/main.js"></script>
<script>
    <?php
        if (isset($_GET['toast'])) {        	
        	switch ($_GET['toast']){
        		case 'cadastroSucesso': ?>
        			toast('Carro cadastrado com sucesso'); <?php
        			break;
				case 'cadastroErro': ?>
					toast('Erro ao cadastrar carro!'); <?php
					break;
				case 'deleteSucesso': ?>
					toast('Carro deletado com sucesso'); <?php 
					break;
				case 'deleteErro': ?>
					toast('Erro ao deletar carro!'); <?php 
					break;
				case 'acessoNegado': ?>
					toast('Acesso Negado!!!'); <?php 
					break;
				case 'editSucesso': ?>
					toast('Carro editado com sucesso!'); <?php 
					break;
				case 'editErro': ?>
					toast('Erro ao editar carro!'); <?php 
					break;
				default:?>
					toast('Acesso Negado!!!'); <?php
					break;	
        	}
        }       
    ?>
</script>
</body>
</html>