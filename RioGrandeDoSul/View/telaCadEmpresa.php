<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Empresa</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Empresa</b></p>
            <form id="form-form" action="telaCadEmpresa.php" enctype="multipart/form-data" method="post">
                <div id="direita">
                    <p>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </p>
                    <p>
                        <label for="cnpj">CNPJ:</label>
                        <input type="text" id="cnpj" name="cnpj" required>
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
                        <label for="prejuizo">Prejuizo:</label>
                        <input type="text" id="prejuizo" name="prejuizo" required>
                    </p>
                </div>
                <div id="esquerda">
                    <p>
                        <label for="valorArrecadado">Valor Arrecadado:</label>
                        <input type="text" id="valorArrecadado" name="valorArrecadado" required>
                    </p>
                    <p>
                        <label for="pix">Pix:</label>
                        <input type="text" id="pix" name="pix" required>
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
                        <label for="vagasDeEmprego">Vagas de emprego:</label>
                        <input type="text" id="vagasDeEmprego" name="vagasDeEmprego" required>
                    </p>
                </div>
                <div id="baixo">
                    <p>
                        <label for="empregadosTotal">Empregados Totais:</label>
                        <input type="text" id="empregadosTotal" name="empregadosTotal" required>
                    </p>
                    <p>
                        <label for="fileEMP">Comprovante de residência:</label>
                        <input type="file" name="fileEMP" id="fileEMP" required>
                    </p>
                    <p>
                        <input type="submit" name="btCadEmpresa" value="Próximo">
                    </p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['btCadEmpresa'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileEMP"])){
            // Pasta onde o arquivo será salvo
            $target_dir = "Comprovantes/";
            // Caminho completo do arquivo
            $target_file = $target_dir . basename($_FILES["fileEMP"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            if ($_FILES["fileEMP"]["size"] > 5000000) { // 5MB
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
                if (move_uploaded_file($_FILES["fileEMP"]["tmp_name"], $target_file)){
                    //echo "O arquivo " . htmlspecialchars(basename($_FILES["fileEMP"]["name"])) . " foi enviado.";

                    $_SESSION["EMP_NOME"] = $_POST['nome'];
                    $_SESSION["EMP_CNPJ"] = $_POST['cnpj'];
                    $_SESSION["EMP_TELE"] = $_POST['telefone'];
                    $_SESSION["EMP_EMAIL"] = $_POST['email'];
                    $_SESSION["EMP_PREJ"] = $_POST['prejuizo'];
                    $_SESSION["EMP_VAL"] = $_POST['valorArrecadado'];
                    $_SESSION["EMP_PIX"] = $_POST['pix'];
                    $_SESSION["EMP_END"] = $_POST['endereco'];
                    $_SESSION["EMP_CID"] = $_POST['cidade'];
                    $_SESSION["EMP_COMP"] = $target_file;
                    $_SESSION["EMP_VAG"] = $_POST['vagasDeEmprego'];
                    $_SESSION["EMP_EMPT"] = $_POST['empregadosTotal'];
                    header("Location: telaCadRedeDeComunicacao.php");
                }else {
                    echo "Desculpe, houve um erro ao enviar seu arquivo.";
                }
            }
        }  
    }
?>