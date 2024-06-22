<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Estli.css">
    <title>Logar no Sistema</title>
</head>
<body>
    <section id="sec-form">
        <div id="div-form">
            <p id="p-form"><b>Entrar</b></p>
            <form id="form-form" action="Tela0Logar.php" method="post">
                <p>
                    <p>
                        <label for="login">Login</label>
                    </p>
                    <input type="text" id="login" name="login" required>
                </p>
                <p>
                    <p>
                        <label for="passaword">Senha</label>
                    </p>
                    <input type="text" id="passaword" name="passaword" required>
                </p>
                <p>
                    <input type="submit" name="btCadUser" value="Entrar">
                </p>
            </form>
            <?php
                include_once "../Controlle/userDAO.php";
                include_once "../Model/user.php";
                if(isset($_POST['login']) && isset($_POST['passaword'])){
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    $userDAO = new userDAO();
                    $linha = $userDAO->selectLoginUser1($_POST['login']);

                    if($linha == null){
                        echo '<h1>Não exite conta!</h1>';
                    }else{
                        if($linha != null){
                            $user = new user($linha[0]);
                            if(($user->getLogin() == $_POST['login']) && ($user->getPassaword() == $_POST['passaword'])){
                                $_SESSION["USER_LOGIN"] = $_POST['login'];
                                $_SESSION["USER_PASSAWORD"] = $_POST['passaword'];
                                header("Location: tela0Menu.php");
                                exit;
                            }else{
                                echo '<h1>Erro!</h1>';
                            }
                        }
                    }  
                }
            ?>
        </div>
    </section>
</body>
</html>

