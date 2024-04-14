<?php
    include_once ("../Menu/Conexao.php");

    function inserirHospede($cpf, $nome, $sobrenome, $sexo, $dataNascimento){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "INSERT INTO hospede (cpf, nome, sobrenome, sexo, dataNascimento) 
        values (:cpf, :nome, :sobrenome, :sexo, :dataNascimento)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":sobrenome", $sobrenome);
        $pstmt->bindValue(":sexo", $sexo);
        $pstmt->bindValue(":dataNascimento", $dataNascimento);
        $boolean = $pstmt->execute();
        $conexao = encerrar();
        return $boolean;
    }

    function inserirControle($hospedeCpf, $paisOrigem, $previsaoEstadia, $ciasAereas){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "INSERT INTO controle (hospedeCpf, paisOrigem, previsaoEstadia, ciasAereas) 
        values (:hospedeCpf, :paisOrigem, :previsaoEstadia, :ciasAereas)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":hospedeCpf", $hospedeCpf);
        $pstmt->bindValue(":paisOrigem", $paisOrigem);
        $pstmt->bindValue(":previsaoEstadia", $previsaoEstadia);
        $pstmt->bindValue(":ciasAereas", $ciasAereas);
        $boolean = $pstmt->execute();
        $conexao = encerrar();
        return $boolean;
    }

    function consultarHospede($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<tr>";
        echo "<th style=\"$thStyle\">CPF</th>";
        echo "<th style=\"$thStyle\">NOME</th>";
        echo "<th style=\"$thStyle\">SOBRENOME</th>";
        echo "<th style=\"$thStyle\">SEXO</th>";
        echo "<th style=\"$thStyle\">DATA DE NASCIMENTO</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["cpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["nome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sobrenome"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["sexo"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["dataNascimento"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }

    function consultarControle($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM controle WHERE hospedeCpf = :hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":hospedeCpf", $cpf);
        $pstmt->execute();

        $tableStyle = 'border-collapse: collapse; width: 100%;';
        $thStyle = 'border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2; text-align: left;';
        $tdStyle = 'border: 1px solid #ddd; padding: 8px;';

        echo "<table style=\"$tableStyle\">";
        echo "<tr>";
        echo "<th style=\"$thStyle\">HOSPEDE CPF</th>";
        echo "<th style=\"$thStyle\">PAÍS DE ORIGEM</th>";
        echo "<th style=\"$thStyle\">PREVISÃO DE ESTADIA</th>";
        echo "<th style=\"$thStyle\">COMPANHIA AÉREAS</th>";
        echo "</tr>";

        while ($linha = $pstmt->fetch()) {
            echo "<tr>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["hospedeCpf"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["paisOrigem"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>";
            echo "<td style=\"$tdStyle\">" . htmlspecialchars($linha["ciasAereas"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        $conexao = encerrar();
    }
?>