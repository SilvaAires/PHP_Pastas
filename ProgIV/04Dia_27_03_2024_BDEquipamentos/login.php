<?php
    //Sessão
    include_once "Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    //Final de Sessão

    if(isset($_POST["nome"]) && isset($_POST["senha"])){
        if(isset($_POST['entrar'])){
            $conexao = conectar("bdequi", "root", "");
            $sql = "SELECT nome, senha FROM usuarios WHERE nome = :nome AND senha = :senha";
            $pstmt = $conexao->prepare($sql);
            $pstmt->bindValue(":nome", $_POST['nome']);
            $pstmt->bindValue(":senha", $_POST['senha']);
            $pstmt->execute();
            while($linha = $pstmt->fetch()){
                if(($linha["nome"]==$_POST['nome']) && ($linha["senha"]==$_POST['senha'])){
                    $_SESSION["usuario_sessao"] =  $linha["nome"];
                    header("Location: Index.php");
                    exit();
                }else{
                    echo "<script language='javascript' type='text/javascript'>
                            alert('Login e/ou senha incorretos');window.location.href='login.php';
                           </script>";
                }
            }
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
        Usuario: <input type="text" name="nome">
        Senha: <input type="password" name="senha">
        <input type="submit" value="entrar" name="entrar">
    </form>
</body>
</html>