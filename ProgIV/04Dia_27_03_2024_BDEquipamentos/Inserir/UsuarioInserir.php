<?php
    include_once "../Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: ../Inserir/TelaInserir.php");
        exit; // Sair do script PHP
    }

    if(isset($_POST["b"])){
        if((!empty($_POST["nome"])) && (!empty($_POST["senha"]))){
            $_SESSION["consulta_realizada"] = true;
            $nome = $_POST["nome"];
            $senha = $_POST["senha"];

            inserteUsuario($nome, $senha);

            echo ("<h2>Cadastro realizado com sucesso!</h2>");

            consultarUsuario($nome);
            echo ('<br>
                   <form name="voltar" method="post" action="../Inserir/TelaInserir.php">
                   <input type="submit" name="botao" value="Voltar">
                   </form>');
        }else{
            header('Location: ../Inserir/TelaInserir.php');
        }
    }


    function inserteUsuario($nome, $senha){
        $conexao = conectar("bdequi", "root", "");
        $sql = "INSERT INTO usuarios (nome, senha) values (:nome, :senha)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":senha", $senha);
        $pstmt->execute();
        $conexao = encerrar();
    }

    function consultarUsuario($nome){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM usuarios WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<tr>";
        echo "<th style=\"$thStyle\">ID</th>";
        echo "<th style=\"$thStyle\">NOME</th>";
        echo "<th style=\"$thStyle\">SENHA</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["id"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["nome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["senha"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }
?>