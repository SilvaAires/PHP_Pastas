<?php
    include_once "../Conexao.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: TelaInserir.php");
        exit; // Sair do script PHP
    }

    if(isset($_POST["botaoEmp"])){
        if((isset($_POST["comboUser"])) && (isset($_POST["comboEqui"])) && 
           ($_POST["comboUser"] != "0") && ($_POST["comboEqui"] != "0")){
            $_SESSION["consulta_realizada"] = true;

            $usa = consU($_POST["comboUser"]);
            $equ = consE($_POST["comboEqui"]);
            inserteEmp($usa, $equ);

            echo ("<h2>Cadastro realizado com sucesso!</h2>");

            echo ('<br>
                   <form name="voltar" method="post" action="TelaInserir.php">
                   <input type="submit" name="botao" value="Voltar">
                   </form>');
        }else{
            header('Location: TelaInserir.php');
        }
    }

    function consU($User){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM usuarios WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $User);
        $pstmt->execute();
        $r = 0;
        while ($linha = $pstmt->fetch()) {
            $r = $linha["id"];
        }
        $conexao = encerrar();
        return $r;
    }

    function consE($Equi){
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT * FROM equipamentos WHERE descricao = :descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":descricao", $Equi);
        $pstmt->execute();
        $r = 0;
        while ($linha = $pstmt->fetch()) {
            $r = $linha["id"];
        }
        $conexao = encerrar();
        return $r;
    }

    function inserteEmp($nome, $descricao){
        $conexao = conectar("bdequi", "root", "");
        $sql = "INSERT INTO emprestimos (usuario, equipamento) values (:usuario, :equipamento)";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":equipamento", $descricao);
        $pstmt->bindValue(":usuario", $nome);
        $pstmt->execute();
        $conexao = encerrar();
    }

    function listarUser(){
        echo '<select name="comboUser">
            <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT nome FROM usuarios ORDER BY nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["nome"].'">'.$linha["nome"].'</option>';
        }
        $conexao = encerrar();
        echo '</select>';
    }

    function listarEqui(){
        echo '<select name="comboEqui">
              <option value="0" selected>(selecione um nome:)</option>';
    
        $conexao = conectar("bdequi", "root", "");
        $sql = "SELECT descricao FROM equipamentos ORDER BY descricao";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["descricao"].'">'.$linha["descricao"].'</option>';
        }
        $conexao = encerrar();
        echo '</select>';
    }

?>