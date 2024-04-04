<?php
    include_once "../ConexaoBD/Conexao.php";
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

        // Estilos CSS
        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<caption><strong>Registro encontrado com sucesso</strong></caption>";
        echo "<thead>";
            echo "<tr>";
                echo "<th style=\"$thStyle\">ID</th>";
                echo "<th style=\"$thStyle\">NOME</th>";
                echo "<th style=\"$thStyle\">SENHA</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        echo ('<form name="alterar" method="post" action="TelaAlterar.php"');

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            // Adicionando as classes 'input-id', 'input-nome', 'input-senha' para referência em CSS/JavaScript, se necessário

            echo '<td style="' . $tdStyle . '"><input type="text" class="input-id" name="id" value="' . htmlspecialchars($linha["id"]) . '" readonly="readonly" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-nome" name="nome" value="' . htmlspecialchars($linha["nome"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo '<td style="' . $tdStyle . '"><input type="text" class="input-senha" name="senha" value="' . htmlspecialchars($linha["senha"]) . '" style="width: 100%; box-sizing: border-box; border: none;"></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo '<div style="margin-top: 10px;">';
            echo '<input type="submit" name="altUs" value="Alterar">';
            echo '<input type="submit" name="excUs" value="Excluir">';
        echo '</div>';
        echo "</form>";
        $conexao = encerrar();
    }

    function delUser($id){
        $conexao = conectar("bdequi", "root", "");
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function altUser($id, $nome, $senha){
        $conexao = conectar("bdequi", "root", "");
        $sql = "UPDATE usuarios SET nome = :nome, senha = :senha WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":senha", $senha);
        $pstmt->execute();

        $conexao = encerrar();
    }
?>