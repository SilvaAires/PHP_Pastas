<?php
session_start();

if(isset($_POST["login"]) && isset($_POST["senha"])){

$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
$connect = mysqli_connect('localhost','root','','sistema');

    if (isset($entrar)) {
        $sql="SELECT * FROM usuarios WHERE login ='$login' AND senha = '$senha'";
        $verifica = mysqli_query($connect,$sql) or die("erro ao selecionar");
        if(mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='login.php';</script>";
            die();
        }else{
            $_SESSION["usuario_sessao"] = $_POST["login"];
            header("Location: index.php");
            exit(); 
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
        Usuario: <input type="text" name="login">
        Senha: <input type="password" name="senha">
        <input type="submit" value="entrar" name="entrar">
    </form>
</body>
</html>