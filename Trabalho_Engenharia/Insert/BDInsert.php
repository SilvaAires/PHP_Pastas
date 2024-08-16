<?php
    include_once ("../Menu/Conexao.php");

    function inserirQuarto($numQuarto, $tipoQuarto, $precoDiaria, $fkHospede , $dataEntrada){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "INSERT INTO quarto (numQuarto, tipoQuarto, precoDiaria, fkHospede, dataEntrada) 
        values (?, ?, ?, ?, ?)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(1, $numQuarto);
        $pstmt->bindValue(2, $tipoQuarto);
        $pstmt->bindValue(3, $precoDiaria);
        $pstmt->bindValue(4, $fkHospede);
        $pstmt->bindValue(5, $dataEntrada);
        $boolean = $pstmt->execute();
        $conexao = encerrar();
        return $boolean;
    }

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

    function consultarHospede($cpf) {
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();
    
        echo '
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>CPF</th>
                        <th>Nome</th>
                        <th>Sobrenome</th>
                        <th>Sexo</th>
                        <th>Nascimento</th>
                    </tr>
                </thead>
                <tbody>';
    
        while ($linha = $pstmt->fetch()) {
            echo '  <tr>
                        <td id="bd">' . htmlspecialchars($linha["cpf"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["nome"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["sobrenome"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["sexo"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["dataNascimento"]) . '</td>
                    </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>';
    
        $conexao = encerrar();
    }
    
    function consultarQuarto($cpf) {
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM quarto WHERE fkHospede = ?";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(1, $cpf);
        $pstmt->execute();
    
        echo '
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Número do Quarto</th>
                        <th>Tipo do Quarto</th>
                        <th>Preço da Diária</th>
                        <th>Hóspede</th>
                        <th>Data da Entrada</th>
                    </tr>
                </thead>
                <tbody>';
    
        while ($linha = $pstmt->fetch()) {
            echo '  <tr>
                        <td id="bd">' . htmlspecialchars($linha["numQuarto"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["tipoQuarto"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["precoDiaria"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["fkHospede"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["dataEntrada"]) . '</td>
                    </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>';
    
        $conexao = encerrar();
    }

    function consultarControle($cpf) {
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM controle WHERE hospedeCpf = :hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":hospedeCpf", $cpf);
        $pstmt->execute();
    
        echo '
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>Hóspede</th>
                        <th>Natural</th>
                        <th>Estadia</th>
                        <th>CIA Aéreas</th>
                    </tr>
                </thead>
                <tbody>';
    
        while ($linha = $pstmt->fetch()) {
            echo '  <tr>
                        <td id="bd">' . htmlspecialchars($linha["hospedeCpf"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["paisOrigem"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["previsaoEstadia"]) . '</td>
                        <td id="bd">' . htmlspecialchars($linha["ciasAereas"]) . '</td>
                    </tr>';
        }
    
        echo '
                </tbody>
            </table>
        </div>';
    
        $conexao = encerrar();
    }
    
?>