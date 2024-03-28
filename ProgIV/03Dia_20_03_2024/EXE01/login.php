<?php
session_start();

if(isset($_SESSION["usuario_sessao"])){
    header("Location: index.php");
    exit(); 
}

if(isset($_POST["usuario"]) && isset($_POST["senha"])){
    if($_POST["usuario"] == "root" && $_POST["senha"] == "123"){
        $_SESSION["usuario_sessao"] = $_POST["usuario"];
        header("Location: index.php");
        exit();
    }else{
        echo"Erro";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php" method="post">
        Usuario: <input type="text" name="usuario">
        Senha: <input type="password" name="senha">
        <input type="submit" value="Logar">
    </form>
</body>
</html>