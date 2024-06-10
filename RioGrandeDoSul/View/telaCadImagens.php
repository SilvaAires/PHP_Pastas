<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Imagem</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Imagem</b></p>
            <form id="form-form" action="telaCadImagens.php" enctype="multipart/form-data" method="post">
                <p id="desc">
                    <p>
                        <label for="descricao">Descrição:</label>
                    </p>
                    <input type="text" id="descricao" name="descricao" required>
                </p>
                <p id="imag">
                    <p>
                        <label>Imagem:</label>
                    </p>
                    <input type="file" id="imagem" name="imagem" required>
                </p>
                <div id="baixo">
                    <div id="direita">
                        <p id="bt">
                            <input type="submit" name="btCadImagem" value="Cadastrar Imagem">
                        </p>
                    </div>
                    <div id="esquerda">
                        <p id="bt">
                            <input type="submit" name="btCadImagem" value="Finalizar Cadastro">
                        </p>
                    </div>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    include_once '../Model/user.php';
    include_once '../Controlle/userDAO.php';
    if(isset($_POST['nome'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $login = $_SESSION["USER_LOGIN"];
        
        $userDAo = new userDAO();

        $lista = $userDAo->selectLoginUser1($login);

        $funcionario = new user($lista[0]);
        $fk = $funcionario->getIdUser();
                    
        $arquivo = $_FILES["arquivo"]["tmp_name"]; 
        $tamanho = $_FILES["arquivo"]["size"];
        $tipo    = $_FILES["arquivo"]["type"];
        $nome  = $_FILES["arquivo"]["name"];

        if($arquivo != "none"){
            $fp = fopen($arquivo, "rb");
            $imagem = fread($fp, $tamanho);
            $imagem = addslashes($imagem);
            fclose($fp);  
            
            $arrrayImagem = array("descricao" => $_POST['descricao'], 
                            "imagem" => $imagem,
                            "userFK" => $fk
                        );

            $imagemDAO = new imagemDAO();
            $imagem = new imagem($arrrayImagem);

            $imagemDAO->insertImagem($imagem);
        }
        
    }
?>