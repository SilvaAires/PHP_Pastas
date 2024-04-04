<?php
    include_once ('../SQL/Consulta.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP e Banco de Dados</h1>
    <div>
        <p>Pesquisa Marca</p>
        <?php 
            comboxMarca(); 
        ?>
    </div>
    
    <div>
        <p>Pesquisa Modelo</p>
        <?php 
            comboxModelo(); 
        ?>
    </div>

    <div>
        <p>Pesquisar Todos</p>
        <form method="post" action="../SQL/Consulta.php">
            <input type="submit" name="botao" value="Pesquisar Todos">
        </form>
    </div>
    
</body>
</html>