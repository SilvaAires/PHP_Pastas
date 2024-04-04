<?php
    include_once "../ConexaoBD/Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    function consultarEqu(){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM equipamentos";
        $pstmt = $conexao->prepare($sql);
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

    function listarEquiCons(){
        echo '
        <form name="menu" method="post" action="TelaConsulta.php">
            <select name="comboEquiCons">
                <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT descricao FROM equipamentos ORDER BY descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["descricao"].'">'.$linha["descricao"].'</option>';
        }
        $conexao = encerrar();
        echo 
            '</select> 
            <input type="submit" value="consulta">
        </form>';
    }

    function consEquiCons($descricao){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM equipamentos WHERE descricao = :descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":descricao", $descricao);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<caption><strong>Registro encontrado com sucesso</strong></caption>";
        echo "<thead>";
            echo "<tr>";
                echo "<th style=\"$thStyle\">ID</th>";
                echo "<th style=\"$thStyle\">DESCRIÇÂO</th>";
                echo "<th style=\"$thStyle\">SETOR</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    
        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo '<td style="' . $tdStyle . '">'. htmlspecialchars($linha["id"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["descricao"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["setor"]) . '</td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        $conexao = encerrar();
    }
?>