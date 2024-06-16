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
                        <label for="fileP">Comprovante de residência:</label>
                        <input type="file" name="fileP" id="fileP" required>
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

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileP"])){
            // Pasta onde o arquivo será salvo
            $target_dir = "Comprovantes/";
            // Caminho completo do arquivo
            $target_file = $target_dir . basename($_FILES["fileP"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["fileP"]["size"] > 5000000) { // 5MB
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
                if (move_uploaded_file($_FILES["fileP"]["tmp_name"], $target_file)){
                    //echo "O arquivo " . htmlspecialchars(basename($_FILES["fileP"]["name"])) . " foi enviado.";

                    $_SESSION["PESSOA_NOME"] = $_POST['nome'];
                    $_SESSION["PESSOA_CPF"] = $_POST['cpf'];
                    $_SESSION["PESSOA_TELEFONE"] = $_POST['telefone'];
                    $_SESSION["PESSOA_EMAIL"] = $_POST['email'];
                    $_SESSION["PESSOA_PIX"] = $_POST['pix'];
                    $_SESSION["PESSOA_PREJUIZO"] = $_POST['prejuizo'];
                    $_SESSION["PESSOA_VALORARRECADADO"] = $_POST['valorArrecadado'];
                    $_SESSION["PESSOA_ENDERECO"] = $_POST['endereco'];
                    $_SESSION["PESSOA_CIDADE"] = $_POST['cidade'];
                    $_SESSION["PESSOA_COMPROVANTE"] = $target_file;
                    $_SESSION["PESSOA_SITUACAODEEMPREGO"] = $_POST['situacaoDeEmprego'];
                    header("Location: telaCadRedeDeComunicacao.php");
                }else {
                    echo "Desculpe, houve um erro ao enviar seu arquivo.";
                }
            }
        }  
    }
?>