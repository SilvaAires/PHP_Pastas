<?php
    include_once "../Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    function listarUsAlterar(){
        echo '
        <form name="menu" method="post" action="TelaAlterar.php">
            <select name="combo">
                <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT nome FROM usuarios ORDER BY nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["nome"].'">'.$linha["nome"].'</option>';
        }
        $conexao = encerrar();
        echo 
            '</select> 
            <input type="submit" value="consulta">
        </form>';
    }

    function consUsAlt($nome){
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