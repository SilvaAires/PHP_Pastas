<?php
 include("conexao.php");
 try
	{
		//$conecta = new PDO("mysql:host=$servidor;dbname=$banco", $usuario , $senha);
		$result = mysqli_query($mysqli,"SELECT arquivo_tipo, arquivo_conteudo FROM tb_arquivos WHERE arquivo_id=$_GET[id]");
        while($resultado = mysqli_fetch_array($result))
        {
            $tipo = $resultado['arquivo_tipo'];
            $conteudo = $resultado['arquivo_conteudo'];
            header("Content-Type: $tipo");
            echo $conteudo;
		}	
    }catch(Exception $erro)
	{
		echo("Errrooooo! foi esse: " . $erro->getMessage());
	}
?>