<?php
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
$connect = mysqli_connect('localhost','root','','sistema');

  if (isset($entrar)) {
    $sql="SELECT * FROM usuarios WHERE login ='$login' AND senha = '$senha'";
    $verifica = mysqli_query($connect,$sql) or die("erro ao selecionar");
      if (mysqli_num_rows($verifica)<=0){
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.php';</script>";
        die();
      }else{
        
        header("Location:index.php");
      }
  }
?>