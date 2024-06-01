<?php

include_once __DIR__ .'/Rotas.php';

Rotas::add('/', 'View/home.php');
Rotas::add('/home', 'View/home.php');
Rotas::addGet('/home', 'View/home.php', 'toast');
Rotas::add('/cadastrar', 'View/cadastrarCarro.php');
Rotas::addGetInt('/editar', 'View/editarCarro.php', 'id');
Rotas::addGetInt('/excluir', 'View/excluir.php', 'id');
Rotas::addGet('/controller', 'Controller/CarroController.php', 'function');

Rotas::erro('View/404.php');
Rotas::exec();
?>

