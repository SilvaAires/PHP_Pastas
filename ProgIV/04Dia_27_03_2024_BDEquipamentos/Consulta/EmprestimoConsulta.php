<?php
    include_once "../ConexaoBD/Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    function consultarEmp(){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT em.id, eq.descricao, us.nome, em.dia
                FROM emprestimos em, equipamentos eq, usuarios us
                WHERE em.equipamento = eq.id AND em.usuario = us.id;";
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
        echo "<th style=\"$thStyle\">DIA</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["id"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["descricao"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["nome"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["dia"]) . '</td>';
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }

    function listarEmpConsr(){
        echo '
        <form name="menu" method="post" action="TelaConsulta.php">
            <select name="comboEmpCons">
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

    function consEmpConsulta($id){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT em.id, eq.descricao, us.nome, em.dia
                FROM emprestimos em, equipamentos eq, usuarios us
                WHERE em.id = :id AND em.equipamento = eq.id AND em.usuario = us.id;";
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

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["id"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["descricao"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["nome"]) . '</td>';
            echo '<td style="' . $tdStyle . '">' . htmlspecialchars($linha["dia"]) . '</td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        $conexao = encerrar();
    }
?>