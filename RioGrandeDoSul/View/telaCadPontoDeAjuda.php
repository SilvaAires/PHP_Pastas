<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Ponto De Ajuda</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Ponto De Ajuda</b></p>
            <form id="form-form" action="telaCadPontoDeAjuda.php" enctype="multipart/form-data" method="post">
                <div id="direita">
                    <p>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </p>
                    <p>
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" required>
                    </p>
                    <p>
                        <label for="email">Email:</label>
                        <input type="text" id="email" name="email" required>
                    </p>
                    <p>
                        <label for="endereco">Endereço:</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </p>
                </div>
                <div id="esquerda">
                    <p>
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" required>
                    </p>
                    <p>
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required>
                    </p>
                    <p>
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" id="cnpj" name="cnpj" required>
                    </p>
                    <p>
                        <label for="descricao">Descrição:</label>
                        <input type="text" id="descricao" name="descricao" required>
                    </p>
                </div>
                <div id="baixo">
                    <p>
                        <input type="submit" name="btCadPonto" value="Próximo">
                    </p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['btCadPonto'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["PONTO_TELEFONE"] = $_POST['telefone'];
        $_SESSION["PONTO_EMAIL"] = $_POST['email'];
        $_SESSION["PONTO_ENDERECO"] = $_POST['endereco'];
        $_SESSION["PONTO_CIDADE"] = $_POST['cidade'];
        $_SESSION["PONTO_CPF"] = $_POST['cpf'];
        $_SESSION["PONTO_CNPJ"] = $_POST['cnpj'];
        $_SESSION["PONTO_DESCRICAO"] = $_POST['descricao'];
        $_SESSION["PONTO_NOME"] = $_POST['nome'];
        header("Location: telaCadRedeDeComunicacao.php");      
    }
?>