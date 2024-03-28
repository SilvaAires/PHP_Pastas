<?php
    include_once "conexao.php";
    
    session_start();
    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        // Limpar a variável de sessão
        unset($_SESSION["consulta_realizada"]);
        // Não exibir a tabela novamente
        header("Location: index.php");
        exit; // Sair do script PHP
    }
    
    if(isset($_POST["combo"])){
        $_SESSION["consulta_realizada"] = true;
        $op = $_POST["combo"];
        if($op != "0"){
            consultarNome($op);
        }
        echo '<br>
             <form name="voltar" method="post" action="index.php">
             <input type="submit" name="botao" value="Voltar">
             </form>';
    }

    if(isset($_POST["botao"])){
        $_SESSION["consulta_realizada"] = true;
        consultar();
        echo '<br>
             <form name="voltar" method="post" action="index.php">
             <input type="submit" name="botao" value="Voltar">
             </form>';
        
    }

    function consultar(){
        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT * FROM agenda";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        echo ("<table border=\"1\" width=\"300px\">");
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
        $conexao = encerrar();
    }

    function listarFuncionariosNoCombo(){
        echo '
        <form name="menu" method="post" action="consulta.php">
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
        echo '</select> <input type="submit" value="consulta"></form>';
    }

    function consultarNome($nome){
        $conexao = conectar("agenda", "root", "");
        $sql = "SELECT * FROM agenda WHERE nome = :nome";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":nome", $nome);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
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
        $conexao = encerrar();
    }
?>