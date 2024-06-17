<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
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
            <nav class="menu-opcoes">
                <ul id="direita">
                    <li id="direita"><a href="tela0Menu.php"><img src="ImagensLocais/Brasão_rio_grande_do_sul.png" alt=""></a></li>
                    <li id="direita"><input type="text" placeholder="Pesquisar por Nome"><a href=""><i class='bx bx-search icon' ></i></a></li>
                </ul>

                <ul id="centro">
                    <li id="centro"><a href="tela0Menu.php">Principal</a></li>
                    <li id="centro"><a href="tela1Cidades.php">Cidades</a></li>
                    <li id="centro"><a href="tela1Empresa.php">Empresas</a></li>
                    <li id="centro"><a href="tela1Pessoa.php">Pessoa</a></li>
                    <li id="centro"><a href="tela1Ponto.php">Ponto de Ajuda</a></li>
                </ul>

                <ul id="esquerda">
                    <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        if(isset($_SESSION["USER_LOGIN"])):
                    ?>
                    <li id="esquerda"><a href="telaCadUser.php">Quantidade de User</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Add Imagem</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Perfil</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Sair</a></li>
                    <?php 
                        endif; 
                        if(!isset($_SESSION["USER_LOGIN"])):
                    ?>
                    <li id="esquerda"><a href="telaCadUser.php">Quantidade de User</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Chaves Pix</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Se Logar</a></li>
                    <li id="esquerda"><a href="telaCadUser.php">Se Cadastrar</a></li>
                    <?php endif;?>
                </ul>
            </nav>
        </header>
    </section>

    <section class="section-corpo">
        <div>
            <form name="menu" method="post" action="TelaSelect.php">
                <p><label for="nome1">Digite um nome</label></p>
                <p><input type="text" id="nome1" name="nome1" required></p>
                <p><input type="submit" value="consulta"></p>
                
            </form>
        </div>

        <div class="div-corpo">
            <?php
                include_once "../Controlle/cidadeDAO.php";
                include_once "../Model/cidade.php";
                $cidadeDAO = new cidadeDAO();
                $lista = $cidadeDAO->selectAllCidade();
            ?>
            <table>
                <tr><h1><tr>Principais cidades</tr></h1></tr>
                <?php 
                    if($lista == null){
                        echo '<tr><h1><tr>Nenhuma cidade cadastrada ainda!</tr></h1></tr>';
                    }
                    foreach ($lista as $cidade):
                    $cidade = new cidade($cidade);
                ?>
                <tr>
                    <th>Nome</th>
                    <th>População</th>
                    <th>Feridos</th>
                    <th>Mortos</th>
                    <th>Desabrigados</th>
                    <th>Pix</th>
                </tr>
                <tr>
                    <th><?php echo $cidade->getNome();?></th>
                    <th><?php echo $cidade->getPopulacao()?></th>
                    <th><?php echo $cidade->getFeridos()?></th>
                    <th><?php echo $cidade->getMortos()?></th>
                    <th><?php echo $cidade->getDesabrigados()?></th>
                    <th><?php echo $cidade->getPix()?></th>
                </tr>
                <tr>
                    <th>Situação</th>
                    <th>Prejuízo</th>
                    <th>Valor Arrecadado</th>
                    <th>Desemprego</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <th><?php echo $cidade->getEstadoSituacao()?></th>
                    <th><?php echo $cidade->getPrejuizo()?></th>
                    <th><?php echo $cidade->getValorArrecadado()?></th>
                    <th><?php echo $cidade->getDesemprego()?></th>
                    <th><?php echo $cidade->getTelefone()?></th>
                    <th><?php echo $cidade->getEmail()?></th>
                </tr>
                <!-- Select de Imagens -->
                <?php 
                    include_once "../Controlle/imagemDAO.php";
                    include_once "../Model/imagem.php";
                    $imagemDAO = new imagemDAO();
                    $listaDeImg = $imagemDAO->selectAllFK($cidade->getUserFKCidade());
                    
                    if($listaDeImg == null){
                        echo '<tr><h1><tr>Nenhuma imagem cadastrada ainda!</tr></h1></tr>';
                    }
                    if($listaDeImg != null):
                ?>
                <tr id="ultimo">
                    <!-- <td colspan="2" rowspan="1"></td> -->
                    <!-- <th id="ultimo" colspan="2" > -->
                    <th id="ultimo" colspan="6" >
                        <div id="carouselExampleCaptions<?php echo $cidade->getIdCidade();?>" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $cidade->getIdCidade();?>" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $cidade->getIdCidade();?>" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions<?php echo $cidade->getIdCidade();?>" data-bs-slide-to="2" aria-label="Slide 3"></button>
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
