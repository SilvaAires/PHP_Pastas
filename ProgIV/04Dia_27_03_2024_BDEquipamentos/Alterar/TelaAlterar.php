<?php
    include_once "UsuarioUpdate.php";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Informações</title>
</head>
<body>
    <div>
        <p>
            <b>Update Usuários</b>
        </p>
        <?php
            listarUsAlterar();
            if(isset($_POST["combo"])){
                $op = $_POST["combo"];
                if($op != "0"){
                    consUsAlt($op);
                }
            }
        ?>
    </div>

    <div>
        <p>
            <b>Update Equipamentos</b>
        </p>
        <?php
            listarUsAlterar();
            if(isset($_POST["combo"])){
                $op = $_POST["combo"];
                if($op != "0"){
                    consUsAlt($op);
                }
            }
        ?>
    </div>

    <div>
        <p>
            <b>Update Emprestimos</b>
        </p>
        <?php
            listarUsAlterar();
            if(isset($_POST["combo"])){
                $op = $_POST["combo"];
                if($op != "0"){
                    consUsAlt($op);
                }
            }
        ?>
    </div>
</body>
</html>