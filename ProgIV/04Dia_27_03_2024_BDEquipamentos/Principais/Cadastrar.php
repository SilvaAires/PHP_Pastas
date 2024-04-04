<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../Estilo/TelaLogin.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Cadastrar-se</h1>
            <form action="login.php" method="post">
                <label for="nome">Usuário:</label>
                <input type="text" name="nome" id="nome" required>

                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="senha" required>

                <input type="submit" value="Confirmar" name="Confirmar">
            </form>
        </div>
    </div>
</body>
</html>