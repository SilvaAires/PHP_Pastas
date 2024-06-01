<?php
include_once __DIR__ . '/../Controller/CarroDAO.php';
include_once __DIR__ . '/../Rotas/Constantes.php';
		
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $carro = new CarroDAO();
    $carro->remover($id);    
} else {
    header("Location: " . HOME . "home/acessoNegado");
}