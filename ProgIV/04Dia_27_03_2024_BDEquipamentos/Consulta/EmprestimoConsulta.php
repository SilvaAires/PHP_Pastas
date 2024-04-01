<?php
    include_once "../Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    function consultarEmp(){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM emprestimos";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<tr>";
        echo "<th style=\"$thStyle\">ID</th>";
        echo "<th style=\"$thStyle\">EQUIPAMENTO</th>";
        echo "<th style=\"$thStyle\">USUÁRIO</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["id"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["equipamento"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["usuario"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }
?>