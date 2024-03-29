<?php
    include_once ("conexao.php");
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: index.php");
        exit; // Sair do script PHP
    }

    if(isset($_POST["combo"])){
        $op = $_POST["combo"];
        if($op != "0"){
            consultarNome1($op);
        }
        echo 
            ('<br>
              <form name="voltar" method="post" action="index.php">
                  <input type="submit" name="botao" value="voltar">
              </form>');
    }
    if(isset($_POST['alterar'])){
        $_SESSION["consulta_realizada"] = true;
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $cargo = $_POST["cargo"];

        alterar($id, $nome, $email, $cargo);

        echo ('<br>
               <form name="voltar" method="post" action="index.php">
               <input type="submit" name="botao" value="voltar">
               </form>');
    }else{
        if(isset($_POST['excluir'])){
            $_SESSION["consulta_realizada"] = true;
            $id = $_POST["id"];
            delete($id);
            echo ('<br>
                   <form name="voltar" method="post" action="index.php">
                   <input type="submit" name="botao" value="voltar">
                   </form>');
        }
    }
    

    function listarFuncionariosNoCombo2(){
        echo '
        <form name="menu" method="post" action="alterar.php">
            <select name="combo">
                <option value="0" selected>(selecione um nome:)</option>';

        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT nome FROM agenda ORDER BY nome";
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

    function consultarNome1($nome){
        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT * FROM agenda WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        echo "<table border='1' width='300px'>";
        echo "<caption><strong>Registro encontrado com sucesso</strong></caption>";
        echo "<thead>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>NOME</th>";
                echo "<th>EMAIL</th>";
                echo "<th>CARGO</th>";
            echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        echo ('<form name="alterar" method="post" action="alterar.php"');

        while($linha = $pstmt->fetch()){
            echo "<tr>";
                echo '<td><input type="text" name="id" value="' . htmlspecialchars($linha["id"]) . '" readonly="readonly"></td>';
                echo '<td><input type="text" name="nome" value="' . htmlspecialchars($linha["nome"]) . '"></td>';
                echo '<td><input type="text" name="email" value="' . htmlspecialchars($linha["email"]) . '"></td>';
                echo '<td><input type="text" name="cargo" value="' . htmlspecialchars($linha["cargo"]) . '"></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";

        echo '<div style="margin-top: 10px;">';
            echo '<input type="submit" name="alterar" value="Alterar">';
            echo '<input type="submit" name="excluir" value="Excluir">';
        echo '</div>';
        echo "</form>";
        $conexao = encerrar();
    }

    function alterar($id, $nome, $email, $cargo){
        $conexao = conectar("agenda", "root", "");
        $sql = "UPDATE agenda SET nome = :nome, email = :email, cargo = :cargo WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->bindValue(":email", $email);
        $pstmt->bindValue(":cargo", $cargo);
        $pstmt->execute();

        echo ("<h2>Registro alterado com sucesso</h2>");

        $conexao = encerrar();
    }

    function delete($id){
        $conexao = conectar("agenda", "root", "");
        $sql = "DELETE FROM agenda WHERE id = :id";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":id", $id);
        $pstmt->execute();

        echo ("<h2>Registro deletado com sucesso</h2>");

        $conexao = encerrar();
    }
?>