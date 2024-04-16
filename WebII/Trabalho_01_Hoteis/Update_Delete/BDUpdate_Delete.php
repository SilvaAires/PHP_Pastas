<?php
    include_once ("../Menu/Conexao.php");

    function combCPF(){
        echo '
        <form name="menu" method="post" action="TelaUpdate_Delete.php">
            <select name="comboUp">
                <option value="0" selected>(Selecione um nome:)</option>';

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

    function inputCPF(){
        echo '
        <form name="menu" method="post" action="TelaUpdate_Delete.php">
            <p>
                <label for="cpf2">Digite um CPF:</label>
                <input type="text" id="cpf2" name="cpf2" required>
                <input type="submit" value="consulta">
            </p>
        </form>';
    }

    function updateCPF($cpf){
        $conexao = conectar("bdhotel", "root", "");
        $sql = "SELECT * FROM hospede ho, controle co WHERE ho.cpf = co.hospedeCpf AND ho.cpf = :cpf";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":cpf", $cpf);
        $pstmt->execute();

        echo ('<form name="alterar" method="post" action="TelaUpdate_Delete.php">');
        while ($linha = $pstmt->fetch()) {
            echo '<p>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" value="'.$linha["cpf"].'" required readonly>
                  </p>';

            echo '<p>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value = "'.$linha["nome"].'" required>
                  </p>';

            echo '<p>
                    <label for="sobrenome">Sobreome:</label>
                    <input type="text" id="sobrenome" name="sobrenome" value = "'.$linha["sobrenome"].'" required>
                  </p>';

            echo '<p>
                    <input type="radio" name="sexo" value="M" required '.($linha["sexo"] == "M" ? "checked" : "").'> Masculino
                    <input type="radio" name="sexo" value="F" required '.($linha["sexo"] == "F" ? "checked" : "").'> Feminino
                  </p>';
            
            echo '<p>
                    <label for="data_hora">Data de Nascimento:</label>
                    <input type="date" id="data_hora" name="data" value = "'.$linha["dataNascimento"].'" required>
                  </p>';
            
            echo '<p>
                    <p><b>País de origem</b></p>
                        <input type="radio" name="pais" value="brasil" required '.($linha["paisOrigem"] == "brasil" ? "checked" : "").'> Brasil
                        <input type="radio" name="pais" value="argentina" required '.($linha["paisOrigem"] == "argentina" ? "checked" : "").'> Argentina
                        <input type="radio" name="pais" value="paraguai" required '.($linha["paisOrigem"] == "paraguai" ? "checked" : "").'> Paraguai
                        <input type="radio" name="pais" value="Uruguai" required '.($linha["paisOrigem"] == "Uruguai" ? "checked" : "").'> Uruguai
                        <input type="radio" name="pais" value="chile" required '.($linha["paisOrigem"] == "chile" ? "checked" : "").'> Chile
                        <input type="radio" name="pais" value="peru" required '.($linha["paisOrigem"] == "peru" ? "checked" : "").'> Peru
                  </p>';
        
            echo '<div class="mb-3">
                    <label for="" class="form-label">Previsão de Dias de Estadia</label>
                        <select class="form-select form-select-lg" name="previsao" id="previsao">
                            <option value="3 dias" '.($linha["previsaoEstadia"] == "3 dias" ? "selected" : "").'>3 dias</option>
                            <option value="5 dias" '.($linha["previsaoEstadia"] == "5 dias" ? "selected" : "").'>5 dias</option>
                            <option value="1 semana" '.($linha["previsaoEstadia"] == "1 semana" ? "selected" : "").' >1 semana</option>
                            <option value="2 semana" '.($linha["previsaoEstadia"] == "2 semana" ? "selected" : "").'>2 semana</option>
                            <option value="3 semana ou mais" '.($linha["previsaoEstadia"] == "3 semana ou mais" ? "selected" : "").'>3 semana ou mais</option>
                        </select>
                  </div>';
            
            $cia = explode(', ',$linha["ciasAereas"]);
            echo '<div class="list-group">
                    <p><b>Companhias aéreas</b></p>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="gol" '.(in_array("gol", $cia) ? "checked" : "").'/>
                            GOL
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="azul" '.(in_array("azul", $cia) ? "checked" : "").'/>
                            AZUL
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="trip" '.(in_array("trip", $cia) ? "checked" : "").'/>
                            TRIP
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="avianca" '.(in_array("avianca", $cia) ? "checked" : "").'/>
                            AVIANCA
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="rissetti" '.(in_array("rissetti", $cia) ? "checked" : "").'/>
                            RISSETTI
                        </label>
                        <label class="list-group-item">
                            <input class="form-check-input me-1" type="checkbox" name="cia[]" value="global" '.(in_array("global", $cia) ? "checked" : "").'/>
                            GLOBAL
                        </label>
                  </div>';
        }
        echo '<div style="margin-top: 10px;">';
            echo '<input type="submit" name="altUp" value="Alterar">';
            echo '<input type="submit" name="excDel" value="Excluir">';
        echo '</div>';
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