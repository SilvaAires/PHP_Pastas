<?php
    include_once("consulta.php");
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
    <?php
        listarFuncionariosNoCombo();
    ?>
    <p>Pesquisar Todos</p>
    <form method="post" action="consulta.php">
        <input type="submit" name="botao" value="Pesquisar Todos">
    </form>
</body>
</html>
