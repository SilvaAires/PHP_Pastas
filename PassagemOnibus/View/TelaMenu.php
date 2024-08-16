<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Rodoviária</title>
</head>
<body>
    <section class="section-inicio">
        <header class="header-inicio">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] == "adm"):
                            ?>
                            <li class="nav-item"><a class="nav-link" href="TelaCadCompanhia.php">Companhias</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadOnibus.php">Onibus</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if(isset($_SESSION["USER_LOGIN"]) && $_SESSION["USER_LOGIN"] != "adm"): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaPerfil.php">Perfil</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaSair.php">Sair</a></li>
                            <?php endif; ?>
                            <?php if(!isset($_SESSION["USER_LOGIN"])): ?>
                            <li class="nav-item"><a class="nav-link" href="TelaLogin.php">Logar</a></li>
                            <li class="nav-item"><a class="nav-link" href="TelaCadUser.php">Cadastrar</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </section>

    <header>
        <nav>
            <div class="container mt-4">
                <form id="form-form" action="TelaMenu.php" method="post">
                    <div class="d-flex">
                        <div class="form-group mr-3">
                            <label for="origem" class="form-label">Origem:</label>
                            <input type="text" id="origem" name="origem" class="form-control" required>
                        </div>
                        <div class="form-group mr-3">
                            <label for="destino" class="form-label">Destino:</label>
                            <input type="text" id="destino" name="destino" class="form-control" required>
                        </div>
                        <div class="form-group mr-3">
                            <label for="dia" class="form-label">Dia:</label>
                            <input type="date" id="dia" name="dia" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" name="btPesquisa" class="btn btn-primary mt-3">Pesquisar</button>
                </form>
            </div>
        </nav>
    </header>

    <?php
        if(isset($_POST['btPesquisa'])):
            include_once "../Controller/ConOnibus.php";
            include_once "../Model/Onibus.php";
            include_once "../Controller/ConCompanhia.php";
            include_once "../Model/CompanhiaOnibus.php";
            $ConOnibus = new ConOnibus();
            $lista = $ConOnibus->selectPesOnibus($_POST['origem'], $_POST['destino'], $_POST['dia']);
            if($lista == null):
                echo '<div class="container mt-4"><h1>Nenhum ônibus encontrado!</h1></div>';
            else:
                foreach ($lista as $onibus_data):
                    $onibus = new Onibus($onibus_data);
                    $ConCia = new ConCompanhia();
                    $linha = $ConCia->selectLogo($onibus->getfkCIA());
                    foreach ($linha as $cia_data):
                        $cia = new CompanhiaOnibus($cia_data);
    ?>

    <section class="container mt-4">
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $cia->getlogo();?>" class="img-fluid rounded-start" alt="<?php echo $cia->getnomeCIA(); ?>">
                </div>
                <div class="col-md-8">
                    <form action="TelaPassagem.php" method="post">
                        <div class="card-body d-flex flex-column flex-md-row align-items-md-center justify-content-md-between">
                            <input type="hidden" name="onibus" value="<?php echo $onibus->getnumOnibus()?>">
                            <input type="hidden" name="origem" value="<?php echo $onibus->getlocalOrigem()?>">
                            <input type="hidden" name="destino" value="<?php echo $onibus->getlocalDestino()?>">
                            <input type="hidden" name="saida" value="<?php echo $onibus->getdataHoraSaida()?>">
                            <input type="hidden" name="chegada" value="<?php echo $onibus->getdataHoraPrevisao()?>">
                            <input type="hidden" name="tipo" value="<?php echo $onibus->gettipoOnibus()?>">
                            <input type="hidden" name="preco" value="<?php echo $onibus->getpreco()?>">
                            <p class="card-text" name="onibus">Ônibus Nº: <?php echo $onibus->getnumOnibus()?></p>
                            <p class="card-text" name="origem">Origem: <?php echo $onibus->getlocalOrigem()?></p>
                            <p class="card-text" name="destino">Destino: <?php echo $onibus->getlocalDestino()?></p>
                            <p class="card-text" name="saida">Saída: <?php echo $onibus->getdataHoraSaida()?></p>
                            <p class="card-text" name="chegada">Chegada: <?php echo $onibus->getdataHoraPrevisao()?></p>
                            <p class="card-text" name="tipo">Tipo: <?php echo $onibus->gettipoOnibus()?></p>
                            <p class="card-text" name="preco">Preço: <?php echo $onibus->getpreco()?></p>
                            <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php endforeach; endforeach; endif; endif; ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
