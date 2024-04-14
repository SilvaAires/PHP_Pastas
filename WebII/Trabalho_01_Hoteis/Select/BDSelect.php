<?php
    include_once ("../Menu/Conexao.php");

    function consAll(){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co WHERE ho.cpf = co.hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';
        $tddStyle = 'solid #ddd; padding: 8px; background-color: #050505; text-align: left;';

        echo "<table style=\"$tableStyle\">";
        

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<th style=\"$thStyle\">CPF</th>";
            echo "<th style=\"$thStyle\">NOME</th>";
            echo "<th style=\"$thStyle\">SOBRENOME</th>";
            echo "<th style=\"$thStyle\">SEXO</th>";
            echo "<th style=\"$thStyle\">DATA DE NASCIMENTO</th>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["cpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["nome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sobrenome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sexo"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["dataNascimento"]) . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th style=\"$thStyle\">HOSPEDE CPF</th>";
            echo "<th style=\"$thStyle\">PAÍS DE ORIGEM</th>";
            echo "<th style=\"$thStyle\">PREVISÃO DE ESTADIA</th>";
            echo "<th style=\"$thStyle\">COMPANHIA AÉREAS</th>";
            echo "<th style=\"$thStyle\"></th>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["hospedeCpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["paisOrigem"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["ciasAereas"]) . "</td>";
            echo "<td style=\"$tdStyle\"></td>";
            echo "</tr>";
            echo "<tr>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  </tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }

    function comboCpf(){
        echo '
        <form name="menu" method="post" action="TelaSelect.php">
            <select name="comboHospede">
                <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT cpf FROM hospede ORDER BY cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["cpf"].'">'.$linha["cpf"].'</option>';
        }
        $conexao = encerrar();
        echo 
            '</select> 
            <input type="submit" value="consulta">
        </form>';
    }

    function consCPF($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co WHERE ho.cpf = co.hospedeCpf AND ho.cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';
        $tddStyle = 'solid #ddd; padding: 8px; background-color: #050505; text-align: left;';

        echo "<table style=\"$tableStyle\">";
        

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<th style=\"$thStyle\">CPF</th>";
            echo "<th style=\"$thStyle\">NOME</th>";
            echo "<th style=\"$thStyle\">SOBRENOME</th>";
            echo "<th style=\"$thStyle\">SEXO</th>";
            echo "<th style=\"$thStyle\">DATA DE NASCIMENTO</th>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["cpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["nome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sobrenome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sexo"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["dataNascimento"]) . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<th style=\"$thStyle\">HOSPEDE CPF</th>";
            echo "<th style=\"$thStyle\">PAÍS DE ORIGEM</th>";
            echo "<th style=\"$thStyle\">PREVISÃO DE ESTADIA</th>";
            echo "<th style=\"$thStyle\">COMPANHIA AÉREAS</th>";
            echo "<th style=\"$thStyle\"></th>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["hospedeCpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["paisOrigem"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["ciasAereas"]) . "</td>";
            echo "<td style=\"$tdStyle\"></td>";
            echo "</tr>";
            echo "<tr>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  <td style=\"$tddStyle\"></td>
                  </tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }
?>