<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Inicial</title>
    <link rel="stylesheet" href="../CSS/EstiloMenu.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section class="section-inicio">
        <header class="header-inicio">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="Tela0Menu.php"><img src="ImagensLocais/Brasão_rio_grande_do_sul.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="Tela0Menu.php">Principal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Tela1Cidades.php">Cidades</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Tela1Empresa.php">Empresas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Tela1Pessoa.php">Pessoa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Tela1Ponto.php">Ponto de Ajuda</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Pesquisar por Nome" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit"><i class='bx bx-search icon'></i></button>
                        </form>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if(isset($_SESSION["USER_LOGIN"])):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaQtd.php">Quantidade de User</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaImagem.php">Add Imagem</a></li>
                            <li class="nav-item"><a class="nav-link" href="Tela0Perfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="Tela0Sair.php">Sair</a></li>
                            <?php 
                                endif; 
                                if(!isset($_SESSION["USER_LOGIN"])):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaQtd.php">Quantidade de User</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaPix.php">Chaves Pix</a></li>
                            <li class="nav-item"><a class="nav-link" href="Tela0Logar.php">Logar</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadUser.php">Cadastrar</a></li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>

    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
