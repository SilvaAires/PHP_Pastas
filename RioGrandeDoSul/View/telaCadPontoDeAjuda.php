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
                        <input type="submit" name="btCadPessoa" value="Próximo">
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
         
            
        $arrrayPontoDeAjuda = array("telefone" => $_POST['telefone'], 
                        "email" => $_POST['email'], 
                        "endereco" => $_POST['endereco'], 
                        "cidade" => $_POST['cidade'],
                        "cpf" => $_POST['cpf'],
                        "cnpj" => $_POST['cnpj'],
                        "descricao" => $_POST['descricao'],
                        "userFK" => $fk,
                        "nome" => $_POST['nome']
                    );

        $pontoDeAjudaDAO = new pontoDeAjudaDAO();
        $pontoDeAjuda = new pontoDeAjuda($arrrayPontoDeAjuda);

        $pontoDeAjudaDAO->insertPonto($pontoDeAjuda);        
    }
?>