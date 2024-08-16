<?php
    include_once ("../Menu/Conexao.php");

    function consAll2(){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co, quarto qu WHERE ho.cpf = co.hospedeCpf AND ho.cpf = qu.fkHospede";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        echo '<table class="table table-striped">';

        while ($linha = $pstmt->fetch()) {
            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Sexo</th>
                    
                </tr>";
            echo '</thead>';
            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["cpf"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["nome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sobrenome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sexo"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Nascimento</th>
                    <th>Natural</th>
                    <th>Estadia</th>
                    <th>CIA Aéreas</th>
                </tr>";
            echo '</thead>';
            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["dataNascimento"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["paisOrigem"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["ciasAereas"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Número do Quarto</th>
                    <th>Tipo do Quarto</th>
                    <th>Preço da Diária</th>
                    <th>Data da Entrada</th>
                </tr>";
            echo '</thead>';
            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["numQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["tipoQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["precoDiaria"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["dataEntrada"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-blue">';
            echo "<tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>";
            echo '</thead>';
        }
        echo '</table>';

        $conexao = encerrar();
    }

    function consAll(){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co, quarto qu WHERE ho.cpf = co.hospedeCpf AND ho.cpf = qu.fkHospede";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        echo '<table class="table table-striped">';

        while ($linha = $pstmt->fetch()) {
            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Sexo</th>
                    <th>Nascimento</th>
                    <th>Natural</th>
                </tr>";
            echo '</thead>';
            echo '<tbody>';

            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["cpf"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["nome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sobrenome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sexo"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["dataNascimento"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["paisOrigem"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Estadia</th>
                    <th>CIA Aéreas</th>
                    <th>Número do Quarto</th>
                    <th>Tipo do Quarto</th>
                    <th>Preço da Diária</th>
                    <th>Data da Entrada</th>
                </tr>";
            echo '</thead>';
            echo '<tbody>';

            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["ciasAereas"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["numQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["tipoQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["precoDiaria"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["dataEntrada"]) . "</td>
                  </tr>";
            
            echo "<tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                  </tr>";
            echo '</tbody>';
        }

        echo '</table>';

        $conexao = encerrar();
    }

    function comboCpf(){
        echo '
        <div class="text-center">
        <form name="menu" method="post" action="TelaSelect.php">
            <div class="form-group">
                <label for="comboHospedeCPF">Selecione um CPF:</label>
                <select class="form-control" name="comboHospedeCPF" id="comboHospedeCPF">
                    <option value="0" selected>Selecione um CPF</option>';

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
            </div>
            <button type="submit" class="btn btn-primary">Consulta</button>
        </form>
        </div>';
    }

    function consCPF($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co, quarto qu WHERE ho.cpf = co.hospedeCpf AND ho.cpf = :cpf AND ho.cpf = qu.fkHospede";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        echo '<table class="table table-striped">';

        while ($linha = $pstmt->fetch()) {
            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Sexo</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["cpf"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["nome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sobrenome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sexo"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Nascimento</th>
                    <th>Natural</th>
                    <th>Estadia</th>
                    <th>CIA Aéreas</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["dataNascimento"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["paisOrigem"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["ciasAereas"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Número do Quarto</th>
                    <th>Tipo do Quarto</th>
                    <th>Preço da Diária</th>
                    <th>Data da Entrada</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["numQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["tipoQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["precoDiaria"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["dataEntrada"]) . "</td>
                  </tr>";
                  
            echo "<tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                  </tr>";

            echo '</tbody>';

        }
        echo '</table>';

        $conexao = encerrar();
    }

    function comboNome(){
        echo '
        <form name="menu" method="post" action="TelaSelect.php">
            <div class="form-group">
                <label for="comboHospedeNome">Selecione um nome:</label>
                <select class="form-control" name="comboHospede" id="comboHospedeNome">
                    <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT nome FROM hospede ORDER BY nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["nome"].'">'.$linha["nome"].'</option>';
        }
        $conexao = encerrar();
        echo 
                '</select>
            </div>
            <button type="submit" class="btn btn-primary">Consulta</button>
        </form>';
    }

    function consNome($nome){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co, quarto qu WHERE ho.cpf = co.hospedeCpf AND ho.nome = :nome AND ho.cpf = qu.fkHospede";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        echo '<table class="table table-striped">';

        while ($linha = $pstmt->fetch()) {
            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>CPF</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Sexo</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["cpf"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["nome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sobrenome"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["sexo"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Nascimento</th>
                    <th>Natural</th>
                    <th>Estadia</th>
                    <th>CIA Aéreas</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["dataNascimento"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["paisOrigem"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["previsaoEstadia"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["ciasAereas"]) . "</td>
                  </tr>";
            echo '</tbody>';

            echo '<thead class="thead-dark">';
            echo "<tr>
                    <th>Número do Quarto</th>
                    <th>Tipo do Quarto</th>
                    <th>Preço da Diária</th>
                    <th>Data da Entrada</th>
                </tr>";
            echo '</thead>';

            echo '<tbody>';
            echo "<tr>
                    <td id='bd'>" . htmlspecialchars($linha["numQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["tipoQuarto"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["precoDiaria"]) . "</td>
                    <td id='bd'>" . htmlspecialchars($linha["dataEntrada"]) . "</td>
                  </tr>";

            echo "<tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                  </tr>";

            echo '</tbody>';
        }
        echo '</table>';

        $conexao = encerrar();
    }

    function inNome(){
        echo '
        <form name="menu" method="post" action="TelaSelect.php">
            <div class="form-group">
                <label for="nome1">Digite um nome:</label>
                <input type="text" class="form-control" id="nome1" name="nome1" required>
            </div>
            <button type="submit" class="btn btn-primary">Consulta</button>
        </form>';
    }

    function inCPF(){
        echo '
        <form name="menu" method="post" action="TelaSelect.php">
            <div class="form-group">
                <label for="cpf2">Digite um CPF:</label>
                <input type="text" class="form-control" id="cpf2" name="cpf2" required>
            </div>
            <button type="submit" class="btn btn-primary">Consulta</button>
        </form>';
    }
?>
