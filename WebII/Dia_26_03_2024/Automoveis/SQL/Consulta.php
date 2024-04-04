<?php
    include_once ('Conexao.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION["consulta_realizada"] == "a";
    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] === true) {
        unset($_SESSION["consulta_realizada"]);
        header("Location: index.php");
        exit;
    }

    if(isset($_SESSION["consulta_realizada"]) && $_SESSION["consulta_realizada"] == "a"){
        if(isset($_POST["comboMarca"])){
            $_SESSION["consulta_realizada"] = true;
            $op = $_POST["comboMarca"];
            if($op != "0"){
                consultarMarca($op);
            }
            echo '<br>
                 <form name="voltar" method="post" action="../Telas/TelaConsulta.php">
                 <input type="submit" name="botao" value="Voltar">
                 </form>';
        }
    
        if(isset($_POST["comboModelo"])){
            $_SESSION["consulta_realizada"] = true;
            $op = $_POST["comboModelo"];
            if($op != "0"){
                consultarModelo($op);
            }
            echo '<br>
                 <form name="voltar" method="post" action="../Telas/TelaConsulta.php">
                 <input type="submit" name="botao" value="Voltar">
                 </form>';
        }
    
        if(isset($_POST["botao"])){
            $_SESSION["consulta_realizada"] = true;
            consultaGeralCar();
            echo '<br>
                 <form name="voltar" method="post" action="../Telas/TelaConsulta.php">
                 <input type="submit" name="botao2" value="Voltar">
                 </form>';
        }    
    }
    function consultaGeralCar(){
        $conexao = conectar("automoveis", "root", "");
        $sql = "SELECT * FROM veiculos";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
            echo ("<tr><b>");
                echo ("<td><b> ID </b></td>");
                echo ("<td><b> MARCA </b></td>");
                echo ("<td><b> MODELO </b></td>");
                echo ("<td><b> COR </b></td>");
                echo ("<td><b> ANO </b></td>");
                echo ("<td><b> PLACA </b></td>");
                echo ("<td><b> CHASSI </b></td>");
            echo ("</tr></b>");
        while($linha = $pstmt->fetch()){
            echo ("<tr><b>");
                echo ("<td><b> ". $linha["id"] ."</b></td>");
                echo ("<td><b> ". $linha["marca"] ."</b></td>");
                echo ("<td><b> ". $linha["modelo"] ."</b></td>");
                echo ("<td><b> ". $linha["cor"] ."</b></td>");
                echo ("<td><b> ". $linha["ano"] ."</b></td>");
                echo ("<td><b> ". $linha["placa"] ."</b></td>");
                echo ("<td><b> ". $linha["chassi"] ."</b></td>");
            echo ("</b></tr>");
        }
        echo ("</table>");
        $conexao = encerrar();
    }

    function comboxMarca(){
        echo '
        <form name="menu" method="post" action="../SQL/Consulta.php">
        <select name="comboMarca">
        <option value="0" selected>(selecione uma marca:)</option>';

        $conexao = conectar("automoveis", "root", "");
        $sql = "SELECT marca FROM veiculos ORDER BY marca";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["marca"].'">'.$linha["marca"].'</option>';
        }
        $conexao = encerrar();
        echo '</select> <input type="submit" value="Consultar"></form>';
    }

    function comboxModelo(){
        echo '
        <form name="menu" method="post" action="../SQL/Consulta.php">
        <select name="comboModelo">
        <option value="0" selected>(selecione uma modelo:)</option>';

        $conexao = conectar("automoveis", "root", "");
        $sql = "SELECT modelo FROM veiculos ORDER BY modelo";
        $pstmt = $conexao->prepare($sql);
        $pstmt->execute();
        while($linha = $pstmt->fetch()){
            echo '<option value="'.$linha["modelo"].'">'.$linha["modelo"].'</option>';
        }
        $conexao = encerrar();
        echo '</select> <input type="submit" value="Consultar"></form>';
    }

    function consultarMarca($marca){
        $conexao = conectar("automoveis", "root", "");
        $sql = "SELECT * FROM veiculos WHERE marca = :marca";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":marca", $marca);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
            echo ("<tr><b>");
                echo ("<td><b> ID </b></td>");
                echo ("<td><b> MARCA </b></td>");
                echo ("<td><b> MODELO </b></td>");
                echo ("<td><b> COR </b></td>");
                echo ("<td><b> ANO </b></td>");
                echo ("<td><b> PLACA </b></td>");
                echo ("<td><b> CHASSI </b></td>");
            echo ("</tr></b>");
        while($linha = $pstmt->fetch()){
            echo ("<tr><b>");
                echo ("<td><b> ". $linha["id"] ."</b></td>");
                echo ("<td><b> ". $linha["marca"] ."</b></td>");
                echo ("<td><b> ". $linha["modelo"] ."</b></td>");
                echo ("<td><b> ". $linha["cor"] ."</b></td>");
                echo ("<td><b> ". $linha["ano"] ."</b></td>");
                echo ("<td><b> ". $linha["placa"] ."</b></td>");
                echo ("<td><b> ". $linha["chassi"] ."</b></td>");
            echo ("</b></tr>");
        }
        echo ("</table>");
        $conexao = encerrar();
    }

    function consultarModelo($modelo){
        $conexao = conectar("automoveis", "root", "");
        $sql = "SELECT * FROM veiculos WHERE modelo = :modelo";
        $pstmt = $conexao->prepare($sql);
        $pstmt->bindValue(":modelo", $modelo);
        $pstmt->execute();

        echo ("<table border=\"1\" width=\"300px\">");
            echo ("<tr><b>");
                echo ("<td><b> ID </b></td>");
                echo ("<td><b> MARCA </b></td>");
                echo ("<td><b> MODELO </b></td>");
                echo ("<td><b> COR </b></td>");
                echo ("<td><b> ANO </b></td>");
                echo ("<td><b> PLACA </b></td>");
                echo ("<td><b> CHASSI </b></td>");
            echo ("</tr></b>");
        while($linha = $pstmt->fetch()){
            echo ("<tr><b>");
                echo ("<td><b> ". $linha["id"] ."</b></td>");
                echo ("<td><b> ". $linha["marca"] ."</b></td>");
                echo ("<td><b> ". $linha["modelo"] ."</b></td>");
                echo ("<td><b> ". $linha["cor"] ."</b></td>");
                echo ("<td><b> ". $linha["ano"] ."</b></td>");
                echo ("<td><b> ". $linha["placa"] ."</b></td>");
                echo ("<td><b> ". $linha["chassi"] ."</b></td>");
            echo ("</b></tr>");
        }
        echo ("</table>");
        $conexao = encerrar();
    }
?>