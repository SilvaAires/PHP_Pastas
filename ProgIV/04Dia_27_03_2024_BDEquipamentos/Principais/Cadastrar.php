<?php
    include_once ("../Inserir/UsuarioInserir.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_POST["Confirmar"])){
        if((!empty($_POST["nome"])) && (!empty($_POST["senha"]))){
            inserteUsuario($_POST["nome"], $_POST["senha"]);
            echo"
                <script language='javascript' type='text/javascript'>
                    alert('Cadastrado com Sucesso');window.location.href='login.php';
                </script>";
        }else{
            header("Location: Cadastrar.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Estilo/TelaLogin.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Cadastrar-se</h1>
            <form action="Cadastrar.php" method="post">
                <label for="nome">Usuário:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>

                <input type="submit" value="Confirmar" name="Confirmar">
            </form>
        </div>
    </div>
</body>
</html>