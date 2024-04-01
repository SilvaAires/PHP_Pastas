<?php
    include_once "../Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: TelaInserir.php");
        exit; // Sair do script PHP
    }

    if(isset($_POST["botaoEqui"])){
        if((!empty($_POST["descricao"])) && (!empty($_POST["setor"]))){
            $_SESSION["consulta_realizada"] = true;
            $descricao = $_POST["descricao"];
            $setor = $_POST["setor"];

            inserteUsuario($descricao, $setor);

            echo ("<h2>Cadastro realizado com sucesso!</h2>");

            consultarEqui($descricao);
            echo ('<br>
                   <form name="voltar" method="post" action="TelaInserir.php">
                   <input type="submit" name="botao" value="Voltar">
                   </form>');
        }else{
            header('Location: TelaInserir.php');
        }
    }

    function inserteUsuario($descricao, $setor){
        $conexao = conectar("bdequi", "root", "");
        $sql = "INSERT INTO equipamentos (descricao, setor) values (:descricao, :setor)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":descricao", $descricao);
        $pstmt->bindValue(":setor", $setor);
        $pstmt->execute();
        $conexao = encerrar();
    }

    function consultarEqui($descricao){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM equipamentos WHERE descricao = :descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":descricao", $descricao);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<tr>";
        echo "<th style=\"$thStyle\">ID</th>";
        echo "<th style=\"$thStyle\">DESCRIÇÂO</th>";
        echo "<th style=\"$thStyle\">SETOR</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["id"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["descricao"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["setor"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }
?>