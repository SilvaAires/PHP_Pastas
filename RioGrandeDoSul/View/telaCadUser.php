<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastramento de Usuário</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Usuário</b></p>
            <form id="form-form" action="telaCadUser.php" method="post">
                <p>
                    <label for="login">Login:</label>
                    <input type="text" id="login" name="login" required>
                </p>
                <p>
                    <label for="passaword">Senha:</label>
                    <input type="text" id="passaword" name="passaword" required>
                </p>
                <p>
                    <p><b>Tipo de Conta</b></p>
                    <input type="radio" name="tipo" value="cidade" required> Cidade
                    <input type="radio" name="tipo" value="pessoa" required> Pessoa
                    <input type="radio" name="tipo" value="empresa" required> Empresa
                    <input type="radio" name="tipo" value="ponto" required> Ponto de Ajuda
                </p>
                <p>
                    <input type="submit" name="btCadUser" value="Cadastrar Usuário">
                </p>
            </form>
        </div>
    </section>
</body>
</html>

<?php
    include_once "../Model/user.php";
    include_once '../Controlle/userDAO.php';

    if(isset($_POST['login']) && isset($_POST['passaword']) && isset($_POST['tipo'])){
        $data_hora = date("Y-m-d H:i:s");
        $art = array("login" => $_POST['login'], "passaword" => $_POST['passaword'], "criacao" => $data_hora);
        $userDAo = new userDAO();
        $user = new user($art);

        $userDAo->insertUser($user);

        $lista = $userDAo->selectAllUser();

        foreach ($lista as $funcionario){
            $funcionario = new user($funcionario);
             echo $funcionario;
        }
    }
?>