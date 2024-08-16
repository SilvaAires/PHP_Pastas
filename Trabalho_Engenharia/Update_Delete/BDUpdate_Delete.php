<?php
    include_once ("../Menu/Conexao.php");

    function combCPF(){
        echo '
        <div class="text-center">
        <form name="menu" method="post" action="TelaUpdate_Delete.php">
            <div class="form-group">
                <label for="comboUp">Selecione um nome:</label>
                <select class="form-control" name="comboUp" id="comboUp">
                    <option value="0" selected>Selecione um Nome</option>';

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

    function inputCPF(){
        echo '
        <div class="text-center">
        <form name="menu" method="post" action="TelaUpdate_Delete.php" class="needs-validation" novalidate>
            <div class="form-group">
                <label for="cpf2">Digite um CPF:</label>
                <input type="text" class="form-control" id="cpf2" name="cpf2" required>
                <div class="invalid-feedback">Por favor, insira o CPF.</div>
            </div>
            <button type="submit" class="btn btn-primary">Consulta</button>
        </form>
        </div>';
    }

    function updateCPF($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co WHERE ho.cpf = co.hospedeCpf AND ho.cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        echo '<form name="alterar" method="post" action="TelaUpdate_Delete.php" class="needs-validation" novalidate>';
        while ($linha = $pstmt->fetch()) {
            echo '<div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="'.$linha["cpf"].'" required readonly>
                  </div>';

            echo '<div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="'.$linha["nome"].'" required>
                  </div>';

            echo '<div class="form-group">
                    <label for="sobrenome">Sobrenome:</label>
                    <input type="text" class="form-control" id="sobrenome" name="sobrenome" value="'.$linha["sobrenome"].'" required>
                  </div>';

            echo '<div class="form-group">
                    <label>Sexo:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="masculino" value="M" required '.($linha["sexo"] == "M" ? "checked" : "").'>
                        <label class="form-check-label" for="masculino">Masculino</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="feminino" value="F" required '.($linha["sexo"] == "F" ? "checked" : "").'>
                        <label class="form-check-label" for="feminino">Feminino</label>
                    </div>
                    <div class="invalid-feedback">Por favor, selecione o sexo.</div>
                  </div>';
            
            echo '<div class="form-group">
                    <label for="data_hora">Data de Nascimento:</label>
                    <input type="date" class="form-control" id="data_hora" name="data" value="'.$linha["dataNascimento"].'" required>
                  </div>';
            
            echo '<div class="form-group">
                    <label>País de origem:</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="brasil" value="brasil" required '.($linha["paisOrigem"] == "brasil" ? "checked" : "").'>
                        <label class="form-check-label" for="brasil">Brasil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="argentina" value="argentina" required '.($linha["paisOrigem"] == "argentina" ? "checked" : "").'>
                        <label class="form-check-label" for="argentina">Argentina</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="paraguai" value="paraguai" required '.($linha["paisOrigem"] == "paraguai" ? "checked" : "").'>
                        <label class="form-check-label" for="paraguai">Paraguai</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="uruguai" value="Uruguai" required '.($linha["paisOrigem"] == "Uruguai" ? "checked" : "").'>
                        <label class="form-check-label" for="uruguai">Uruguai</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="chile" value="chile" required '.($linha["paisOrigem"] == "chile" ? "checked" : "").'>
                        <label class="form-check-label" for="chile">Chile</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pais" id="peru" value="peru" required '.($linha["paisOrigem"] == "peru" ? "checked" : "").'>
                        <label class="form-check-label" for="peru">Peru</label>
                    </div>
                  </div>';
        
            echo '<div class="form-group">
                    <label for="previsao">Previsão de Dias de Estadia:</label>
                    <select class="form-control" name="previsao" id="previsao">
                        <option value="3 dias" '.($linha["previsaoEstadia"] == "3 dias" ? "selected" : "").'>3 dias</option>
                        <option value="5 dias" '.($linha["previsaoEstadia"] == "5 dias" ? "selected" : "").'>5 dias</option>
                        <option value="1 semana" '.($linha["previsaoEstadia"] == "1 semana" ? "selected" : "").'>1 semana</option>
                        <option value="2 semanas" '.($linha["previsaoEstadia"] == "2 semanas" ? "selected" : "").'>2 semanas</option>
                        <option value="3 semanas ou mais" '.($linha["previsaoEstadia"] == "3 semanas ou mais" ? "selected" : "").'>3 semanas ou mais</option>
                    </select>
                  </div>';
            
            $cia = explode(', ',$linha["ciasAereas"]);
            echo '<div class="form-group">
                    <label>Companhias aéreas:</label><br>';
            $cias = ['gol', 'azul', 'trip', 'avianca', 'rissetti', 'global'];
            foreach ($cias as $c) {
                echo '<div class="form-check">
                        <input class="form-check-input" type="checkbox" name="cia[]" id="'.$c.'" value="'.$c.'" '.(in_array($c, $cia) ? "checked" : "").'>
                        <label class="form-check-label" for="'.$c.'">'.strtoupper($c).'</label>
                      </div>';
            }
            echo '</div>';
        }
        echo '<div class="form-group mt-3">
                <button type="submit" name="altUp" class="btn btn-warning">Alterar</button>
                <button type="submit" name="excDel" class="btn btn-danger">Excluir</button>
              </div>';
        echo "</form>";

        $conexao = encerrar();
    }

    function delHospede($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "DELETE FROM hospede WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function delControle($hospedeCpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "DELETE FROM controle WHERE hospedeCpf = :hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":hospedeCpf", $hospedeCpf);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function altHospede($cpf, $nome, $sobrenome, $sexo, $dataNascimento){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "UPDATE hospede SET nome = :nome, sobrenome = :sobrenome, 
                        sexo = :sexo, dataNascimento = :dataNascimento WHERE cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":sobrenome", $sobrenome);
        $pstmt->bindValue(":sexo", $sexo);
        $pstmt->bindValue(":dataNascimento", $dataNascimento);
        $pstmt->execute();

        $conexao = encerrar();
    }

    function altControle($hospedeCpf, $paisOrigem, $previsaoEstadia, $ciasAereas){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "UPDATE controle SET paisOrigem = :paisOrigem, 
                    previsaoEstadia = :previsaoEstadia, ciasAereas = :ciasAereas 
                    WHERE hospedeCpf = :hospedeCpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":hospedeCpf", $hospedeCpf);
        $pstmt->bindValue(":paisOrigem", $paisOrigem);
        $pstmt->bindValue(":previsaoEstadia", $previsaoEstadia);
        $pstmt->bindValue(":ciasAereas", $ciasAereas);
        $pstmt->execute();

        $conexao = encerrar();
    }
?>