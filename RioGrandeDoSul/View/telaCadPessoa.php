<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Pessoa</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Pessoa</b></p>
            <form id="form-form" action="telaCadPessoa.php" enctype="multipart/form-data" method="post">
                <div id="direita">
                    <p>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </p>
                    <p>
                        <label for="cpf">CPF:</label>
                        <input type="text" id="cpf" name="cpf" required>
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
                        <label for="pix">Pix:</label>
                        <input type="text" id="pix" name="pix" required>
                    </p>
                </div>
                <div id="esquerda">
                    <p>
                        <label for="prejuizo">Prejuizo:</label>
                        <input type="text" id="prejuizo" name="prejuizo" required>
                    </p>
                    <p>
                        <label for="valorArrecadado">Valor Arrecadado:</label>
                        <input type="text" id="valorArrecadado" name="valorArrecadado" required>
                    </p>
                    <p>
                        <label for="endereco">Endereço:</label>
                        <input type="text" id="endereco" name="endereco" required>
                    </p>
                    <p>
                        <label for="cidade">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" required>
                    </p>
                    <p>
                        <label for="situacaoDeEmprego">Situacao de emprego:</label>
                        <input type="text" id="situacaoDeEmprego" name="situacaoDeEmprego" required>
                    </p>
                </div>
                <div id="baixo">
                    <p>
                        <label>Comprovante de residência:</label>
                        <input type="file" name="arquivo" required>
                    </p>
                    <p>
                        <input type="submit" name="btCadPessoa" value="Próximo">
                    </p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['btCadPessoa'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $arquivo = $_FILES["arquivo"]["tmp_name"]; 
        $tamanho = $_FILES["arquivo"]["size"];

        if($arquivo != "none"){
            $fp = fopen($arquivo, "rb");
            $comprovante = fread($fp, $tamanho);
            $comprovante = addslashes($comprovante);
            fclose($fp); 
        
            $_SESSION["USER_NOME"] = $_POST['nome'];
            $_SESSION["USER_CPF"] = $_POST['cpf'];
            $_SESSION["USER_TELEFONE"] = $_POST['telefone'];
            $_SESSION["USER_EMAIL"] = $_POST['email'];
            $_SESSION["USER_PIX"] = $_POST['pix'];
            $_SESSION["USER_PREJUIZO"] = $_POST['prejuizo'];
            $_SESSION["USER_VALORARRECADADO"] = $_POST['valorArrecadado'];
            $_SESSION["USER_ENDERECO"] = $_POST['endereco'];
            $_SESSION["USER_CIDADE"] = $_POST['cidade'];
            $_SESSION["USER_COMPROVANTE"] = $comprovante;
            $_SESSION["USER_SITUACAODEEMPREGO"] = $_POST['situacaoDeEmprego'];
            header("Location: telaCadRedeDeComunicacao.php");
        }
        
    }
?>