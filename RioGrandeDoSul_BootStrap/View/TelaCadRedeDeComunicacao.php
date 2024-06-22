<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Rede</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Rede</b></p>
            <form id="form-form" action="telaCadRedeDeComunicacao.php" enctype="multipart/form-data" method="post">
                <div id="direita">
                    <p>
                        <label for="facebook">Facebook:</label>
                        <input type="text" id="facebook" name="facebook" required>
                    </p>
                    <p>
                        <label for="twitter">Twitter:</label>
                        <input type="text" id="twitter" name="twitter" required>
                    </p>
                    <p>
                        <label for="linkedin">LinkedIn:</label>
                        <input type="text" id="linkedin" name="linkedin" required>
                    </p>
                </div>
                <div id="esquerda">
                    <p>
                        <label for="whatsApp">WhatsApp:</label>
                        <input type="text" id="whatsApp" name="whatsApp" required>
                    </p>
                    <p>
                        <label for="site">Site:</label>
                        <input type="text" id="site" name="site" required>
                    </p>
                    <p>
                        <label for="portifolio">Portifolio:</label>
                        <input type="text" id="portifolio" name="portifolio" required>
                    </p>
                </div>
                <div id="baixo">
                    <p>
                        <input type="submit" name="btCadRede" value="Cadastra Dados">
                    </p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    include_once 'funcoes.php';

    if(isset($_POST['btCadRede'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        $fk = insert_User_Return_ID($_SESSION["USER_LOGIN"], $_SESSION["USER_PASSAWORD"], 
                                    $_SESSION["USER_TIPO"]);
        
        $_SESSION["USER_FK"] = $fk;

        insert_Rede($_POST['facebook'], $_POST['twitter'], 
                    $_POST['linkedin'], $_POST['whatsApp'], 
                    $_POST['site'], $_POST['portifolio'], $fk);
        
        switch ($_SESSION["USER_TIPO"]) {
            case 'cidade':
                insert_Cidade($_SESSION["CIDADE_NOME"], $_SESSION["CIDADE_POPULACAO"], 
                              $_SESSION["CIDADE_FERIDOS"], $_SESSION["CIDADE_MORTOS"], 
                              $_SESSION["CIDADE_DESABRIGADOS"], $_SESSION["CIDADE_PIX"], 
                              $_SESSION["CIDADE_ESTADOSITUACAO"], $_SESSION["CIDADE_PREJUIZO"], 
                              $_SESSION["CIDADE_VALORARRECADADO"], $_SESSION["CIDADE_DESEMPREGO"], 
                              $_SESSION["CIDADE_TELEFONE"], $_SESSION["CIDADE_EMAIL"], $fk);
                header("Location: telaCadImagens.php");
                exit;
            case 'empresa':
                insert_Empresa($_SESSION["EMP_NOME"], $_SESSION["EMP_CNPJ"], 
                               $_SESSION["EMP_TELE"], $_SESSION["EMP_EMAIL"], 
                               $_SESSION["EMP_PREJ"], $_SESSION["EMP_VAL"], 
                               $_SESSION["EMP_PIX"], $_SESSION["EMP_END"], 
                               $_SESSION["EMP_CID"], $_SESSION["EMP_COMP"], 
                               $_SESSION["EMP_VAG"], $_SESSION["EMP_EMPT"], 
                               $fk);
                header("Location: telaCadImagens.php");
                exit;
            case 'pessoa':
                insert_Pessoa($_SESSION["PESSOA_NOME"], $_SESSION["PESSOA_CPF"], 
                              $_SESSION["PESSOA_TELEFONE"], $_SESSION["PESSOA_EMAIL"], 
                              $_SESSION["PESSOA_PIX"], $_SESSION["PESSOA_PREJUIZO"], 
                              $_SESSION["PESSOA_VALORARRECADADO"], $_SESSION["PESSOA_ENDERECO"], 
                              $_SESSION["PESSOA_CIDADE"], $_SESSION["PESSOA_COMPROVANTE"], 
                              $_SESSION["PESSOA_SITUACAODEEMPREGO"], $fk);
                header("Location: telaCadImagens.php");
                exit;
            case 'ponto':
                insert_Ponto($_SESSION["PONTO_TELEFONE"], $_SESSION["PONTO_EMAIL"],
                             $_SESSION["PONTO_ENDERECO"], $_SESSION["PONTO_CIDADE"],
                             $_SESSION["PONTO_CPF"], $_SESSION["PONTO_CNPJ"],
                             $_SESSION["PONTO_DESCRICAO"], $fk, $_SESSION["PONTO_NOME"]);
                header("Location: telaCadImagens.php");
                exit;
        }
        exit;
    }
?>