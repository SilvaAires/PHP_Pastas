<?php
    include_once "conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: index.php");
        exit; // Sair do script PHP
    }

    if(isset($_POST["botao"])){
        if((!empty($_POST["nome"])) && (!empty($_POST["email"])) && (!empty($_POST["cargo"]))){
            $_SESSION["consulta_realizada"] = true;
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cargo = $_POST["cargo"];

            insert($nome, $email, $cargo);

            echo ("<h2>Cadastro realizado com sucesso!</h2>");

            consultarNome2($nome);
            echo ('<br>
                   <form name="voltar" method="post" action="index.php">
                   <input type="submit" name="botao" value="Voltar">
                   </form>');
        }else{
            header('Location: index.php');
        }
    }

    function insert($nome, $email, $cargo){
        $conexao = conectar("agenda", "root", "");
        $sql = "INSERT INTO agenda (nome, email, cargo) values (:nome, :email, :cargo)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":email", $email);
        $pstmt->bindValue(":cargo", $cargo);
        $pstmt->execute();
        $conexao = encerrar();
    }

    function consultarNome2($nome){
        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT * FROM agenda WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
            echo ("<tr><b>");
                echo ("<td><b> ID </b></td>");
                echo ("<td><b> NOME </b></td>");
                echo ("<td><b> EMAIL </b></td>");
                echo ("<td><b> CARGO </b></td>");
            echo ("</tr></b>");
        while($linha = $pstmt->fetch()){
            echo ("<tr><b>");
                echo ("<td><b> ". $linha["id"] ."</b></td>");
                echo ("<td><b> ". $linha["nome"] ."</b></td>");
                echo ("<td><b> ". $linha["email"] ."</b></td>");
                echo ("<td><b> ". $linha["cargo"] ."</b></td>");
            echo ("</b></tr>");
        }
        echo ("</table>");
        $conexao = encerrar();
    }
?>