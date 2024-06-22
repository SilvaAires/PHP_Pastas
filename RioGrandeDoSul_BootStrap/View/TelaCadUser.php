<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastramento de Usuário</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Usuário</b></p>
            <form id="form-form" action="telaCadUser.php" method="post">
                <p>
                    <p>
                        <label for="login">Login:</label>
                    </p>
                    <input type="text" id="login" name="login" required>
                </p>
                <p>
                    <p>
                        <label for="passaword">Senha:</label>
                    </p>
                    <input type="text" id="passaword" name="passaword" required>
                </p>
                <p><b>Tipo de Conta</b><br></p>
                <p id="radioTipo">
                    <div id="borde">
                        <label for="cidade">Cidade</label>
                        <input type="radio" id="cidade" name="tipo" value="cidade" required>
                    </div>
                    <div id="borde">
                        <label for="pessoa">Pessoa</label>
                        <input type="radio" id="pessoa" name="tipo" value="pessoa" required>
                    </div>
                    <div id="borde">
                        <label for="empresa">Empresa</label>
                        <input type="radio" id="empresa" name="tipo" value="empresa" required>
                    </div>
                    <div id="borde">
                        <label for="ponto">Ponto de Ajuda</label>
                        <input type="radio" id="ponto" name="tipo" value="ponto" required>
                    </div>
                </p>
                <p>
                    <input type="submit" name="btCadUser" value="Próximo">
                </p>
            </form>
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['login']) && isset($_POST['passaword']) && isset($_POST['tipo'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["USER_LOGIN"] = $_POST['login'];
        $_SESSION["USER_PASSAWORD"] = $_POST['passaword'];
        $_SESSION["USER_TIPO"] = $_POST['tipo'];
        switch ($_POST['tipo']) {
            case 'cidade':
                header("Location: telaCadCidade.php");
                exit;
            case 'empresa':
                header("Location: telaCadEmpresa.php");
                exit;
            case 'pessoa':
                header("Location: telaCadPessoa.php");
                exit;
            case 'ponto':
                header("Location: telaCadPontoDeAjuda.php");
                exit;
        }
        exit; 
    }
?>