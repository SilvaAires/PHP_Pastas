<?php

include_once 'CarroDAO.php';

$classe = new CarroDAO();

if (isset($_GET['function'])) {
    $metodo = $_GET['function'];
    if(method_exists($classe, $metodo)){
    	$classe->$metodo();
    }else{
    	die("Método $metodo não existe.");
    }
}