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
    /*include_once '../Model/user.php';
    include_once '../Controlle/userDAO.php';
    if(isset($_POST['nome'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $login = $_SESSION["USER_LOGIN"];
        $passaword = $_SESSION["USER_PASSAWORD"];
        $tipo = $_SESSION["USER_TIPO"];
        
        $data_hora = date("Y-m-d H:i:s");
        $arrrayUser = array("login" => $login, 
                            "passaword" => $passaword, 
                            "criacao" => $data_hora, 
                            "tipoDeConta" => $tipo
                        );
        $userDAo = new userDAO();
        $user = new user($arrrayUser);

        $userDAo->insertUser($user);

        $lista = $userDAo->selectLoginUser1($login);

        $funcionario = new user($lista[0]);
        $fk = $funcionario->getIdUser();
            
        $arrrayRedeDeComunicacao = array("facebook" => $_POST['facebook'], 
                        "twitter" => $_POST['twitter'], 
                        "linkedin" => $_POST['linkedin'], 
                        "whatsApp" => $_POST['whatsApp'],
                        "site" => $_POST['site'],
                        "portifolio" => $_POST['portifolio'],
                        "userFKRede" => $fk
                    );

        $redeDeComunicacaoDAO = new redeDeComunicacaoDAO();
        $redeDeComunicacao = new redeDeComunicacao($arrrayRedeDeComunicacao);

        $redeDeComunicacaoDAO->insertRede($redeDeComunicacao);
    }*/
    include_once 'funcoes.php';

    if(isset($_POST['btCadRede'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["USER_FACEBOOK"] = $_POST['facebook'];
        $_SESSION["USER_TWITTER"] = $_POST['twitter'];
        $_SESSION["USER_LINKEDIN"] = $_POST['linkedin'];
        $_SESSION["USER_WHATSAPP"] = $_POST['whatsApp'];
        $_SESSION["USER_SITE"] = $_POST['site'];
        $_SESSION["USER_PORTIFOLIO"] = $_POST['portifolio'];

        $login = $_SESSION["USER_LOGIN"];
        $passaword = $_SESSION["USER_PASSAWORD"];
        $tipo = $_SESSION["USER_TIPO"];
        switch ($tipo) {
            case 'cidade':
                $fk = insert_User_Return_ID($login, $passaword, $tipo);
                insert_Cidade($_SESSION["USER_NOME"], $_SESSION["USER_POPULACAO"], $_SESSION["USER_FERIDOS"], $_SESSION["USER_MORTOS"], $_SESSION["USER_DESABRIGADOS"], $_SESSION["USER_PIX"], $_SESSION["USER_ESTADOSITUACAO"], $_SESSION["USER_PREJUIZO"], $_SESSION["USER_VALORARRECADADO"], $_SESSION["USER_DESEMPREGO"], $_SESSION["USER_TELEFONE"], $_SESSION["USER_EMAIL"], $fk);
                break;
            case 'empresa':
                header("Location: telaCadEmpresa.php");
                break;
            case 'pessoa':
                header("Location: telaCadPessoa.php");
                break;
            case 'ponto':
                header("Location: telaCadPontoDeAjuda.php");
                break;
        }
        exit;
    }
?>