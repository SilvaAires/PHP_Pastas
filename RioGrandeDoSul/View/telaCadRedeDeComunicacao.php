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

        $fk = insert_User_Return_ID($_SESSION["USER_LOGIN"], $_SESSION["USER_PASSAWORD"], $_SESSION["USER_TIPO"]);
        insert_Rede($_POST['facebook'], $_POST['twitter'], $_POST['linkedin'], $_POST['whatsApp'], $_POST['site'], $_POST['portifolio'], $fk);
        
        switch ($_SESSION["USER_TIPO"]) {
            case 'cidade':
                insert_Cidade($_SESSION["USER_NOME"], $_SESSION["USER_POPULACAO"], $_SESSION["USER_FERIDOS"], $_SESSION["USER_MORTOS"], $_SESSION["USER_DESABRIGADOS"], $_SESSION["USER_PIX"], $_SESSION["USER_ESTADOSITUACAO"], $_SESSION["USER_PREJUIZO"], $_SESSION["USER_VALORARRECADADO"], $_SESSION["USER_DESEMPREGO"], $_SESSION["USER_TELEFONE"], $_SESSION["USER_EMAIL"], $fk);
                header("Location: telaCadImagens.php");
                break;
            case 'empresa':
                header("Location: telaCadImagens.php");
                break;
            case 'pessoa':
                insert_Pessoa($_SESSION["USER_NOME"], $_SESSION["USER_CPF"], $_SESSION["USER_TELEFONE"], $_SESSION["USER_EMAIL"], $_SESSION["USER_PIX"], $_SESSION["USER_PREJUIZO"], $_SESSION["USER_VALORARRECADADO"], $_SESSION["USER_ENDERECO"], $_SESSION["USER_CIDADE"], $_SESSION["USER_COMPROVANTE"], $_SESSION["USER_SITUACAODEEMPREGO"], $fk);
                header("Location: telaCadImagens.php");
                break;
            case 'ponto':
                header("Location: telaCadImagens.php");
                break;
        }
        exit;
    }
?>