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
    <br><br>
    <form action="inserir.php" method="post">
        <p>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">&nbsp;
        </p><p>
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email">&nbsp;
        </p><p>
            <label for="cargo">Cargo:</label>
            <input type="text" id="cargo" name="cargo">&nbsp;
        </p><p>
            <input type="submit" name="botao" value="Cadastrar">
        </p>
        <br><br>
    </form>
</body>
</html>
