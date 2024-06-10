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
                        <label for="vagasDeEmprego">Vagas de emprego:</label>
                        <input type="text" id="vagasDeEmprego" name="vagasDeEmprego" required>
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
                </div>
                <div id="baixo">
                    <p>
                        <label for="empregadosTotal">Empregados Totais:</label>
                        <input type="text" id="empregadosTotal" name="empregadosTotal" required>
                    </p>
                    <p>
                        <label>Comprovante de residência:</label>
                        <input type="file" name="arquivo" required>
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
    include_once '../Model/user.php';
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
                    
        $arquivo = $_FILES["arquivo"]["tmp_name"]; 
        $tamanho = $_FILES["arquivo"]["size"];
        $tipo    = $_FILES["arquivo"]["type"];
        $nome  = $_FILES["arquivo"]["name"];

        if($arquivo != "none"){
            $fp = fopen($arquivo, "rb");
            $comprovante = fread($fp, $tamanho);
            $comprovante = addslashes($comprovante);
            fclose($fp);  
            
            $arrrayEmpresa = array("nome" => $_POST['nome'], 
                            "cnpj" => $_POST['cnpj'], 
                            "telefone" => $_POST['telefone'], 
                            "email" => $_POST['email'],
                            "pix" => $_POST['pix'],
                            "prejuizo" => $_POST['prejuizo'],
                            "valorArrecadado" => $_POST['valorArrecadado'],
                            "endereco" => $_POST['endereco'],
                            "cidade" => $_POST['cidade'],
                            "comprovanteResidencia" => $comprovante,
                            "vagasDeEmprego" => $_POST['vagasDeEmprego'],
                            "empregadosTotal" => $_POST['empregadosTotal'],
                            "userFKEmpresa" => $fk
                        );

            $empresaDAO = new empresaDAO();
            $empresa = new empresa($arrrayEmpresa);

            $empresaDAO->insertEmpresa($empresa);
        }
        
    }
?>