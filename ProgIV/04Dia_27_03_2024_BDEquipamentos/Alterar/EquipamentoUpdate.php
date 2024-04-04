<?php
    include_once "../ConexaoBD/Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    function listarEquiAlterar(){
        echo '
        <form name="menu" method="post" action="TelaAlterar.php">
            <select name="comboEqui">
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

    function consEquiAlt($descricao){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM equipamentos WHERE descricao = :descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":descricao", $descricao);
        $pstmt->execute();

        // Estilos CSS
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
    
        echo ('<form name="alterar" method="post" action="TelaAlterar.php"');

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            // Adicionando as classes 'input-id', 'input-nome', 'input-senha' para referência em CSS/JavaScript, se necessário

            echo '<td style="' . $tdStyle . '"><input type="text" class="input-id" name="id" value="' . htmlspecialchars($linha["id"]) . '" readonly="readonly" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-nome" name="descricao" value="' . htmlspecialchars($linha["descricao"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-senha" name="setor" value="' . htmlspecialchars($linha["setor"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo '<div style="margin-top: 10px;">';
            echo '<input type="submit" name="altEq" value="Alterar">';
            echo '<input type="submit" name="excEq" value="Excluir">';
        echo '</div>';
        echo "</form>";
        $conexao = encerrar();
    }

    function delEq($id){
        $conexao = conectar("bdequi", "root", "");
        $sql = "DELETE FROM equipamentos WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function altEq($id, $descricao, $setor){
        $conexao = conectar("bdequi", "root", "");
        $sql = "UPDATE equipamentos SET descricao = :descricao, setor = :setor WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->bindValue(":descricao", $descricao);
        $pstmt->bindValue(":setor", $setor);
        $pstmt->execute();

        $conexao = encerrar();
    }
?>