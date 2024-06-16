<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Cadastro de Cidade</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Cadastro de Cidade</b></p>
            <form id="form-form" action="telaCadCidade.php" enctype="multipart/form-data" method="post">
                <div id="direita">
                    <p>
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </p>
                    <p>
                        <label for="populacao">População:</label>
                        <input type="text" id="populacao" name="populacao" required>
                    </p>
                    <p>
                        <label for="feridos">Feridos:</label>
                        <input type="text" id="feridos" name="feridos" required>
                    </p>
                    <p>
                        <label for="mortos">Mortos:</label>
                        <input type="text" id="mortos" name="mortos" required>
                    </p>
                    <p>
                        <label for="desabrigados">Desabrigados:</label>
                        <input type="text" id="desabrigados" name="desabrigados" required>
                    </p>
                    <p>
                        <label for="pix">Pix:</label>
                        <input type="text" id="pix" name="pix" required>
                    </p>
                </div>
                <div id="esquerda">
                    <p>
                        <label for="estadoSituacao">Estado da situação:</label>
                        <input type="text" id="estadoSituacao" name="estadoSituacao" required>
                    </p>
                    <p>
                        <label for="prejuizo">Prejuízo:</label>
                        <input type="text" id="prejuizo" name="prejuizo" required>
                    </p>
                    <p>
                        <label for="valorArrecadado">Valor arrecadado:</label>
                        <input type="text" id="valorArrecadado" name="valorArrecadado" required>
                    </p>
                    <p>
                        <label for="desemprego">Desemprego:</label>
                        <input type="text" id="desemprego" name="desemprego" required>
                    </p>
                    <p>
                        <label for="telefone">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" required>
                    </p>
                    <p>
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" name="email" required>
                    </p>
                </div>
                <div id="baixo">
                    <p>
                        <input type="submit" name="btCadCidade" value="Próximo">
                    </p>
                </div>
            </form> 
        </div>
    </section>
</body>
</html>

<?php
    if(isset($_POST['btCadCidade'])){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["CIDADE_NOME"] = $_POST['nome'];
        $_SESSION["CIDADE_POPULACAO"] = $_POST['populacao'];
        $_SESSION["CIDADE_FERIDOS"] = $_POST['feridos'];
        $_SESSION["CIDADE_MORTOS"] = $_POST['mortos'];
        $_SESSION["CIDADE_DESABRIGADOS"] = $_POST['desabrigados'];
        $_SESSION["CIDADE_PIX"] = $_POST['pix'];
        $_SESSION["CIDADE_ESTADOSITUACAO"] = $_POST['estadoSituacao'];
        $_SESSION["CIDADE_PREJUIZO"] = $_POST['prejuizo'];
        $_SESSION["CIDADE_VALORARRECADADO"] = $_POST['valorArrecadado'];
        $_SESSION["CIDADE_DESEMPREGO"] = $_POST['desemprego'];
        $_SESSION["CIDADE_TELEFONE"] = $_POST['telefone'];
        $_SESSION["CIDADE_EMAIL"] = $_POST['email'];
        header("Location: telaCadRedeDeComunicacao.php");
    }
?>