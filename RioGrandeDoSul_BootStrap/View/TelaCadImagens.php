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
            <p>Cadastre pelo menos três!</p>
            <form id="form-form" action="telaCadImagens.php" enctype="multipart/form-data" method="post">
                <p id="desc">
                    <p>
                        <label for="descricao">Descrição:</label>
                    </p>
                    <input type="text" id="descricao" name="descricao">
                </p>
                <p id="imag">
                    <p>
                        <label for="fileIMG">Imagem:</label>
                    </p>
                    <input type="file" name="fileIMG" id="fileIMG">
                </p>
                <div id="bt">
                    <input type="submit" name="btCadImagem" value="Cadastrar Imagem">
                    <input type="submit" name="btProximaPag" value="Finalizar Cadastro">
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    include_once 'funcoes.php';
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (!isset($_SESSION["cont_aux"])) {
        $_SESSION["cont_aux"] = 0;
    }
    if(isset($_POST['btCadImagem'])){
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileIMG"])){
            // Pasta onde o arquivo será salvo
            $target_dir = "Imagens/";
            // Caminho completo do arquivo
            $target_file = $target_dir . basename($_FILES["fileIMG"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["fileIMG"]["size"] > 5000000) { // 5MB
                echo "Desculpe, o arquivo é muito grande.";
                $uploadOk = 0;
            }
        
            // Permite certos formatos de arquivo
            $allowed_types = array("jpg", "png", "jpeg", "gif", "pdf");
            if (!in_array($fileType, $allowed_types)) {
                echo "Desculpe, apenas arquivos JPG, JPEG, PNG, GIF e PDF são permitidos.";
                $uploadOk = 0;
            }
        
            // Verifica se $uploadOk é 0 por causa de um erro
            if ($uploadOk == 0) {
                echo "Desculpe, seu arquivo não foi enviado.";
            } else{
                if (move_uploaded_file($_FILES["fileIMG"]["tmp_name"], $target_file)){
                    //echo "O arquivo " . htmlspecialchars(basename($_FILES["fileIMG"]["name"])) . " foi enviado.";
                    insert_Imagem($_POST['descricao'], $target_file, $_SESSION["USER_FK"]);
                    $_SESSION["cont_aux"] += 1;
                    header("Location: telaCadImagens.php");
                    exit;
                }else {
                    echo "Desculpe, houve um erro ao enviar seu arquivo.";
                }
            }
        } 
    }else{
        if(isset($_POST['btProximaPag'])){
            if($_SESSION["cont_aux"] >= 3){
                header("Location: Tela0Menu.php");
                exit;
            }else{
                echo "<h1>".$_SESSION["cont_aux"]."</h1>";
            }
        }
    }
?>