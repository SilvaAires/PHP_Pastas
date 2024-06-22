<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisas de Ponto de Ajuda</title>
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

    <section class="section-corpo">
        <div>
            <form name="menu" method="post" action="TelaSelect.php">
                <p><label for="nome1">Pesquisar um Ponto de Ajuda</label></p>
                <p><input type="text" id="nome1" name="nome1" required></p>
                <p><input type="submit" id="nome1" value="consulta"></p>
            </form>
        </div>

        <div class="div-corpo">
            <?php
                include_once "../Controlle/pontoDeAjudaDAO.php";
                include_once "../Model/pontoDeAjuda.php";
                $pontoDeAjudaDAO = new pontoDeAjudaDAO();
                $lista = $pontoDeAjudaDAO->selectAllPonto();
            ?>
            <table>
                <tr><h1><tr>Lista de Todos Pontos de Ajuda</tr></h1></tr>
                <?php 
                    if($lista == null){
                        echo '<tr><h1><tr>Nenhuma ponto de ajuda cadastrada ainda!</tr></h1></tr>';
                    }
                    foreach ($lista as $ponto):
                    $ponto = new pontoDeAjuda($ponto);
                ?>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>CPF</th>
                </tr>
                <tr>
                    <th id="bd"><?php echo $ponto->getNome();?></th>
                    <th id="bd"><?php echo $ponto->getTelefone()?></th>
                    <th id="bd"><?php echo $ponto->getEmail()?></th>
                    <th id="bd"><?php echo $ponto->getEndereco()?></th>
                    <th id="bd"><?php echo $ponto->getCidade()?></th>
                    <th id="bd"><?php echo $ponto->getCpf()?></th>
                </tr>
                <tr>
                    <th colspan="3">CNPJ</th>
                    <th colspan="3">Descrição</th>
                </tr>
                <tr>
                    <th id="bd" colspan="3"><?php echo $ponto->getCnpj()?></th>
                    <th id="bd" colspan="3"><?php echo $ponto->getDescricao()?></th>
                </tr>
                <tr>
                    <th>Facebook</th>
                    <th>Twitter</th>
                    <th>LinkedIn</th>
                    <th>WhatsApp</th>
                    <th>Site</th>
                    <th>Portifolio</th>
                </tr>
                <!-- Select de Rede -->
                <?php 
                    include_once "../Controlle/redeDeComunicacaoDAO.php";
                    include_once "../Model/redeDeComunicacao.php";
                    $redeDAO = new redeDeComunicacaoDAO();
                    $listaRede = $redeDAO->selectAllRedeUser($ponto->getUserFK());
                    
                    if($listaRede == null){
                        echo '<tr><h1><tr>Nenhuma rede cadastrada ainda!</tr></h1></tr>';
                    }
                    foreach ($listaRede as $rede):
                        $rede = new redeDeComunicacao($rede);
                ?>
                <tr>
                    <th id="bd"><?php echo $rede->getFacebook()?></th>
                    <th id="bd"><?php echo $rede->getTwitter()?></th>
                    <th id="bd"><?php echo $rede->getLinkedin()?></th>
                    <th id="bd"><?php echo $rede->getWhatsApp()?></th>
                    <th id="bd"><?php echo $rede->getSite()?></th>
                    <th id="bd"><?php echo $rede->getPortifolio()?></th>
                </tr>
                <?php endforeach;?>

                <!-- Select de Imagens -->
                <?php 
                    include_once "../Controlle/imagemDAO.php";
                    include_once "../Model/imagem.php";
                    $imagemDAO = new imagemDAO();
                    $listaDeImg = $imagemDAO->selectAllFK($ponto->getUserFK());
                    
                    if($listaDeImg == null){
                        echo '<tr><h1><tr>Nenhuma imagem cadastrada ainda!</tr></h1></tr>';
                    }
                    if($listaDeImg != null):
                ?>
                <tr id="ultimo">
                    <!-- <td colspan="2" rowspan="1"></td> -->
                    <!-- <th id="ultimo" colspan="2" > -->
                    <th id="ultimo" colspan="6" >
                        <div id="carouselExampleCaptions<?php echo $ponto->getIdAjuda();?>" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $ponto->getIdAjuda();?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $ponto->getIdAjuda();?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $ponto->getIdAjuda();?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="<?php echo $listaDeImg[0]['caminho'];?>" class="d-block w-100 carousel-img" alt="<?php $listaDeImg[0]['descricao'];?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>First slide label</h5>
                                        <p><?php echo $listaDeImg[0]['descricao'];?></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $listaDeImg[1]['caminho'];?>" class="d-block w-100 carousel-img" alt="<?php $listaDeImg[1]['descricao'];?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Second slide label</h5>
                                        <p><?php echo $listaDeImg[1]['descricao'];?></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="<?php echo $listaDeImg[2]['caminho'];?>" class="d-block w-100 carousel-img" alt="<?php $listaDeImg[2]['descricao'];?>">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5>Third slide label</h5>
                                        <p><?php echo $listaDeImg[2]['descricao'];?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                </tr>
                <?php 
                    endif;
                ?>
                <tr id="branco">
                    <th id="branco" colspan="6"></th>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
