<?php
    include_once ("conexao.php");

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

    function consultarNome($nome){
        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT * FROM agenda WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
            echo ("<tr><b>");
                echo ("<td><b> Registro encontado com sucesso </b></td>");
            echo ("</tr></b>");
            echo ("<tr><b>");
                echo ("<td><b> ID </b></td>");
                echo ("<td><b> NOME </b></td>");
                echo ("<td><b> EMAIL </b></td>");
                echo ("<td><b> CARGO </b></td>");
            echo ("</tr></b>");
        while($linha = $pstmt->fetch()){
            echo ("<tr><b>");
                echo ("<td><b> ". $linha["id"] ."</b></td>");
                echo ("<td><b> ". $linha["nome"] ."</b></td>");
                echo ("<td><b> ". $linha["email"] ."</b></td>");
                echo ("<td><b> ". $linha["cargo"] ."</b></td>");
            echo ("</b></tr>");
        }
        echo ("</table>");

        echo ('<input type="submit" name="alterar" value="Alterar">');
        echo ('<input type="submit" name="excluir" value="Excluir">
               </form>');
        $conexao = encerrar();
    }

    function alterar(){
        
    }
?>