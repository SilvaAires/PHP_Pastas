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
    function conectar($db, $usuario, $senha){
        return new PDO("mysql:host=localhost; dbname=$db", $usuario, $senha);
    }

    function encerrar(){
        return null;
    }
    function inserirHos($login, $passaword){
        $criacao = date("Y-m-d H:i:s");
        $conexao = conectar("helprs", "root", "");
        $sql = "INSERT INTO user (login, passaword, criacao) 
        values (:login, :passaword, :criacao)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":login", $login);
        $pstmt->bindValue(":passaword", $passaword);
        $pstmt->bindValue(":criacao", $criacao);
        $boolean = $pstmt->execute();
        $conexao = encerrar();
        return $boolean;
    }
    if(isset($_POST["login"])){
        inserirHos($_POST["login"], $_POST["passaword"]);
        echo ":".$_POST["tipo"];
    }
?>