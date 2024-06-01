<?php
include_once __DIR__ . '/Controller/CarroDAO.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $carro = new CarroDAO();
    $carro->remover($id);    
} else {
    header("Location: index.php?toast=acessoNegado");
}