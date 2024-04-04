<?php
    include_once "../ConexaoBD/Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    function listarEmpAlterar(){
        echo '
        <form name="menu" method="post" action="TelaAlterar.php">
            <select name="comboEmp">
                <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT id FROM emprestimos";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["id"].'">'.$linha["id"].'</option>';
        }
        $conexao = encerrar();
        echo 
            '</select> 
            <input type="submit" value="consulta">
        </form>';
    }

    function consEmpAlt($id){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM emprestimos WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
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
                echo "<th style=\"$thStyle\">EQUIPAMENTO</th>";
                echo "<th style=\"$thStyle\">USUÁRIO</th>";
                echo "<th style=\"$thStyle\">DIA</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
    
        echo ('<form name="alterar" method="post" action="TelaAlterar.php"');

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-id" name="id" value="' . htmlspecialchars($linha["id"]) . '" readonly="readonly" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-equipamento" name="equipamento" value="' . htmlspecialchars($linha["equipamento"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-usuario" name="usuario" value="' . htmlspecialchars($linha["usuario"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-dia" name="dia" value="' . htmlspecialchars($linha["dia"]) . '" readonly="readonly" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo '<div style="margin-top: 10px;">';
            echo '<input type="submit" name="altEmp" value="Alterar">';
            echo '<input type="submit" name="excEmp" value="Excluir">';
        echo '</div>';
        echo "</form>";
        $conexao = encerrar();
    }

    function delEmp($id){
        $conexao = conectar("bdequi", "root", "");
        $sql = "DELETE FROM emprestimos WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function altEmp($id, $equipamento, $usuario){
        $conexao = conectar("bdequi", "root", "");
        $sql = "UPDATE emprestimos SET equipamento = :equipamento, usuario = :usuario WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->bindValue(":equipamento", $equipamento);
        $pstmt->bindValue(":usuario", $usuario);
        $pstmt->execute();

        $conexao = encerrar();
    }
?>