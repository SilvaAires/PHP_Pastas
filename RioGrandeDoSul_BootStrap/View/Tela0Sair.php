<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    unset($_SESSION["USER_LOGIN"]);
    unset($_SESSION["USER_PASSAWORD"]);
    unset($_SESSION["USER_TIPO"]);

    unset($_SESSION["PONTO_TELEFONE"]);
    unset($_SESSION["PONTO_EMAIL"]);
    unset($_SESSION["PONTO_ENDERECO"]);
    unset($_SESSION["PONTO_CIDADE"]);
    unset($_SESSION["PONTO_CPF"]);
    unset($_SESSION["PONTO_CNPJ"]);
    unset($_SESSION["PONTO_DESCRICAO"]);
    unset($_SESSION["PONTO_NOME"]);

    unset($_SESSION["PESSOA_NOME"]);
    unset($_SESSION["PESSOA_CPF"]) ;
    unset($_SESSION["PESSOA_TELEFONE"]);
    unset($_SESSION["PESSOA_EMAIL"]);
    unset($_SESSION["PESSOA_PIX"]);
    unset($_SESSION["PESSOA_PREJUIZO"]);
    unset($_SESSION["PESSOA_VALORARRECADADO"]);
    unset($_SESSION["PESSOA_ENDERECO"]);
    unset($_SESSION["PESSOA_CIDADE"]);
    unset($_SESSION["PESSOA_COMPROVANTE"]);
    unset($_SESSION["PESSOA_SITUACAODEEMPREGO"]);

    unset($_SESSION["EMP_NOME"]);
    unset($_SESSION["EMP_CNPJ"]);
    unset($_SESSION["EMP_TELE"]);
    unset($_SESSION["EMP_EMAIL"]);
    unset($_SESSION["EMP_PREJ"]);
    unset($_SESSION["EMP_VAL"]);
    unset($_SESSION["EMP_PIX"]);
    unset($_SESSION["EMP_END"]);
    unset($_SESSION["EMP_CID"]);
    unset($_SESSION["EMP_COMP"]);
    unset($_SESSION["EMP_VAG"]);
    unset($_SESSION["EMP_EMPT"]);

    unset($_SESSION["CIDADE_NOME"]);
    unset($_SESSION["CIDADE_POPULACAO"]);
    unset($_SESSION["CIDADE_FERIDOS"]);
    unset($_SESSION["CIDADE_MORTOS"]);
    unset($_SESSION["CIDADE_DESABRIGADOS"]);
    unset($_SESSION["CIDADE_PIX"]);
    unset($_SESSION["CIDADE_ESTADOSITUACAO"]);
    unset($_SESSION["CIDADE_PREJUIZO"]);
    unset($_SESSION["CIDADE_VALORARRECADADO"]);
    unset($_SESSION["CIDADE_DESEMPREGO"]);
    unset($_SESSION["CIDADE_TELEFONE"]);
    unset($_SESSION["CIDADE_EMAIL"]);

    header("Location: tela0Menu.php");
    exit();
?>