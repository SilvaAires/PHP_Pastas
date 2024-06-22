<?php
    include_once "../Controlle/userDAO.php";
    include_once "../Model/user.php";
    include_once "../Controlle/pessoaDAO.php";
    include_once "../Model/pessoa.php";
    include_once "../Controlle/cidadeDAO.php";
    include_once "../Model/cidade.php";
    include_once "../Controlle/empresaDAO.php";
    include_once "../Model/empresa.php";
    include_once "../Controlle/pontoDeAjudaDAO.php";
    include_once "../Model/pontoDeAjuda.php";
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verificação de sessão
    if (!isset($_SESSION["USER_LOGIN"])) {
        header("Location: Tela0Logar.php"); // Redireciona se não houver login
        exit(); // Encerra o script para evitar saídas desnecessárias
    }

    $userDAO = new userDAO();
    $linha = $userDAO->selectLoginUser1($_SESSION["USER_LOGIN"]);
    $user = new user($linha[0]);
    $tipo = $user->getTipoDeConta();

    if ($tipo == 'pessoa') {
        $pessoaDAO = new pessoaDAO();
        $linhaPessoa = $pessoaDAO->selectAllPessoaUser($user->getIdUser());
        $pessoa = new pessoa($linhaPessoa[0]);
    } else {
        if($tipo == 'empresa'){
            $empresaDAO = new empresaDAO();
            $linhaEmpresa = $empresaDAO->selectAllEmpresaUser($user->getIdUser());
            $empresa = new empresa($linhaEmpresa[0]);
        }else{
            if($tipo == 'cidade'){
                $cidadeDAO = new cidadeDAO();
                $linhaCidade = $cidadeDAO->selectAllCidadeUser($user->getIdUser());
                $cidade = new cidade($linhaCidade[0]);
            }else{
                if($tipo == 'ponto'){
                    $pontoDAO = new pontoDeAjudaDAO();
                    $linhaPonto = $pontoDAO->selectAllPontoUser($user->getIdUser());
                    $ponto = new pontoDeAjuda($linhaPonto[0]);
                }
            }
        }
    }
    if(isset($_POST['Alterar'])){
        if ($tipo == 'pessoa') {
            $arrrayPessoa = array("nome" => $_POST['nome'], 
                                    "cpf" => $_POST['cpf'], 
                                    "telefone" => $_POST['telefone'], 
                                    "email" => $_POST['email'],
                                    "pix" => $_POST['pix'],
                                    "prejuizo" => $_POST['preju'],
                                    "valorArrecadado" => $_POST['valor'],
                                    "endereco" => $_POST['end'],
                                    "cidade" => $_POST['cidade'],
                                    "situacaoDeEmprego" => $_POST['sit'],
                                    "userFKPessoa" => $user->getIdUser()
                                );
            $pessoaDAO = new pessoaDAO();
            $pessoa = new pessoa($arrrayPessoa);
            $retorno = $pessoaDAO->updatePessoa($pessoa);
        } else {
            if($tipo == 'empresa'){
                $arrrayEmpresa = array("nome" => $_POST['nome'], 
                                        "cnpj" => $_POST['cnpj'], 
                                        "telefone" => $_POST['telefone'], 
                                        "email" => $_POST['email'],
                                        "prejuizo" => $_POST['preju'],
                                        "valorArrecadado" => $_POST['valor'],
                                        "pix" => $_POST['pix'],
                                        "endereco" => $_POST['end'],
                                        "cidade" => $_POST['cidade'],
                                        "vagasDeEmprego" => $_POST['vagas'],
                                        "empregadosTotal" => $_POST['emp'],
                                        "userFKEmpresa" => $user->getIdUser()
                                    );
                $empresaDAO = new empresaDAO();
                $empresa = new empresa($arrrayEmpresa);
                $retorno = $empresaDAO->updateEmpresa($empresa);
            }else{
                if($tipo == 'cidade'){
                    $arrrayCidade = array("nome" => $_POST['nome'], 
                                            "populacao" => $_POST['popu'], 
                                            "feridos" => $_POST['feridos'], 
                                            "mortos" => $_POST['mortos'],
                                            "desabrigados" => $_POST['desabri'],
                                            "pix" => $_POST['pix'],
                                            "estadoSituacao" => $_POST['sit'],
                                            "prejuizo" => $_POST['preju'],
                                            "valorArrecadado" => $_POST['valor'],
                                            "desemprego" => $_POST['desemprego'],
                                            "telefone" => $_POST['telefone'],
                                            "email" => $_POST['email'],
                                            "userFKCidade" => $user->getIdUser()
                                        );
                    $cidadeDAO = new cidadeDAO();
                    $cidade = new cidade($arrrayCidade);
                    $retorno = $cidadeDAO->updateCidade($cidade);
                }else{
                    if($tipo == 'ponto'){
                        $arrrayPontoDeAjuda = array("telefone" => $_POST['telefone'], 
                                                    "email" => $_POST['email'], 
                                                    "endereco" => $_POST['end'], 
                                                    "cidade" => $_POST['cidade'],
                                                    "cpf" => $_POST['cpf'],
                                                    "cnpj" => $_POST['cnpj'],
                                                    "descricao" => $_POST['descricao'],
                                                    "userFK" => $user->getIdUser(),
                                                    "nome" => $_POST['nome']
                                                );
                        $pontoDAO = new pontoDeAjudaDAO();
                        $ponto = new pontoDeAjuda($arrrayPontoDeAjuda);
                        $retorno = $pontoDAO->updatePonto($ponto);
                    }
                }
            }
        }

        header("Location: Tela0Perfil.php");
    }else{
        if(isset($_POST['Excluir'])){
            if ($tipo == 'pessoa') {
                $pessoaDAO = new pessoaDAO();
                $retorno = $pessoaDAO->deletePessoa($user->getIdUser());
            } else {
                if($tipo == 'empresa'){
                    $empresaDAO = new empresaDAO();
                    $retorno = $empresaDAO->deleteEmpresa($user->getIdUser());
                }else{
                    if($tipo == 'cidade'){
                        $cidadeDAO = new cidadeDAO();
                        $retorno = $cidadeDAO->deleteCidade($user->getIdUser());
                    }else{
                        if($tipo == 'ponto'){
                            $pontoDAO = new pontoDeAjudaDAO();
                            $retorno = $pontoDAO->deletePonto($user->getIdUser());
                        }
                    }
                }
            }

            header("Location: Tela0Sair.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil da Conta</title>
    <link rel="stylesheet" href="../CSS/EstiloMenu.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
        <div class="div-corpo">
        <?php
            if($tipo == 'pessoa'):
        ?>
        <form  name="menu" method="post" action="Tela0Perfil.php">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="nome" id="nome1" value="<?php echo htmlspecialchars($pessoa->getNome());?>"></th>
                    <th id="bd"><input type="text" name="cpf" id="nome1" value="<?php echo htmlspecialchars($pessoa->getCpf());?>"></th>
                    <th id="bd"><input type="text" name="telefone" id="nome1" value="<?php echo htmlspecialchars($pessoa->getTelefone());?>"></th>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <th>Pix</th>
                    <th>Prejuízo</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="email" id="nome1" value="<?php echo htmlspecialchars($pessoa->getEmail());?>"></th>
                    <th id="bd"><input type="text" name="pix" id="nome1" value="<?php echo htmlspecialchars($pessoa->getPix());?>"></th>
                    <th id="bd"><input type="text" name="preju" id="nome1" value="<?php echo htmlspecialchars($pessoa->getPrejuizo());?>"></th>
                </tr>
                <tr>
                    <th>Valor Arrecadado</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="valor" id="nome1" value="<?php echo htmlspecialchars($pessoa->getValorArrecadado());?>"></th>
                    <th id="bd"><input type="text" name="end" id="nome1" value="<?php echo htmlspecialchars($pessoa->getEndereco());?>"></th>
                    <th id="bd"><input type="text" name="cidade" id="nome1" value="<?php echo htmlspecialchars($pessoa->getCidade());?>"></th>
                </tr>
                <tr>
                    <th>Comp de Residência</th>
                    <th>Sit de Emprego</th>
                    <th>Vazio</th>
                </tr>
                <tr>
                    <th id="bd">
                        <a href="<?php echo $pessoa->getComprovanteResidencia();?>" target="_blank">
                            <i class="fas fa-file-pdf fa-2x"></i>
                        </a>
                    </th>
                    <th id="bd"><input type="text" name="sit" id="nome1" value="<?php echo htmlspecialchars($pessoa->getSituacaoDeEmprego());?>"></th>
                    <th id="bd">Vazio</th>
                </tr>
            </table>
            <div style="margin-top: 10px;">
                <input type="submit" id="nome1" name="Alterar" value="Alterar">
                <input type="submit" id="nome1" name="Excluir" value="Excluir">
            </div>
        </form>
        <?php
            elseif ($tipo == 'empresa'):
        ?>
        <form  name="menu" method="post" action="Tela0Perfil.php">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>CNPJ</th>
                    <th>Telefone</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="nome" id="nome1" value="<?php echo htmlspecialchars($empresa->getNome());?>"></th>
                    <th id="bd"><input type="text" name="cnpj" id="nome1" value="<?php echo htmlspecialchars($empresa->getCnpj());?>"></th>
                    <th id="bd"><input type="text" name="telefone" id="nome1" value="<?php echo htmlspecialchars($empresa->getTelefone());?>"></th>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <th>Prejuízo</th>
                    <th>Valor Arrecadado</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="email" id="nome1" value="<?php echo htmlspecialchars($empresa->getEmail());?>"></th>
                    <th id="bd"><input type="text" name="preju" id="nome1" value="<?php echo htmlspecialchars($empresa->getPrejuizo());?>"></th>
                    <th id="bd"><input type="text" name="valor" id="nome1" value="<?php echo htmlspecialchars($empresa->getValorArrecadado());?>"></th>
                </tr>
                <tr>
                    <th>Pix</th>
                    <th>Enderço</th>
                    <th>Cidade</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="pix" id="nome1" value="<?php echo htmlspecialchars($empresa->getPix());?>"></th>
                    <th id="bd"><input type="text" name="end" id="nome1" value="<?php echo htmlspecialchars($empresa->getEndereco());?>"></th>
                    <th id="bd"><input type="text" name="cidade" id="nome1" value="<?php echo htmlspecialchars($empresa->getCidade());?>"></th>
                </tr>
                <tr>
                    <th>Vagas de Emprego</th>
                    <th>Total de Empregados</th>
                    <th>Comp de Residência</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="vagas" id="nome1" value="<?php echo htmlspecialchars($empresa->getVagasDeEmprego());?>"></th>
                    <th id="bd"><input type="text" name="emp" id="nome1" value="<?php echo htmlspecialchars($empresa->getEmpregadosTotal());?>"></th>
                    <th id="bd">
                        <a href="<?php echo $empresa->getComprovanteResidencia();?>" target="_blank">
                            <i class="fas fa-file-pdf fa-2x"></i>
                        </a>
                    </th>
                </tr>
            </table>
            <div style="margin-top: 10px;">
                <input type="submit" id="nome1" name="Alterar" value="Alterar">
                <input type="submit" id="nome1" name="Excluir" value="Excluir">
            </div>
        </form>
        <?php
            elseif ($tipo == 'cidade'):
        ?>
        <form  name="menu" method="post" action="Tela0Perfil.php">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>População</th>
                    <th>Feridos</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="nome" id="nome1" value="<?php echo htmlspecialchars($cidade->getNome());?>"></th>
                    <th id="bd"><input type="text" name="popu" id="nome1" value="<?php echo htmlspecialchars($cidade->getPopulacao());?>"></th>
                    <th id="bd"><input type="text" name="feridos" id="nome1" value="<?php echo htmlspecialchars($cidade->getFeridos());?>"></th>
                </tr>
                <tr>
                    <th>Mortos</th>
                    <th>Desabrigados</th>
                    <th>Pix</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="mortos" id="nome1" value="<?php echo htmlspecialchars($cidade->getMortos());?>"></th>
                    <th id="bd"><input type="text" name="desabri" id="nome1" value="<?php echo htmlspecialchars($cidade->getDesabrigados());?>"></th>
                    <th id="bd"><input type="text" name="pix" id="nome1" value="<?php echo htmlspecialchars($cidade->getPix());?>"></th>
                </tr>
                <tr>
                    <th>Situação</th>
                    <th>Prejuízo</th>
                    <th>Valor Arrecadado</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="sit" id="nome1" value="<?php echo htmlspecialchars($cidade->getEstadoSituacao());?>"></th>
                    <th id="bd"><input type="text" name="preju" id="nome1" value="<?php echo htmlspecialchars($cidade->getPrejuizo());?>"></th>
                    <th id="bd"><input type="text" name="valor" id="nome1" value="<?php echo htmlspecialchars($cidade->getValorArrecadado());?>"></th>
                </tr>
                <tr>
                    <th>Desemprego</th>
                    <th>Telefone</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="desemprego" id="nome1" value="<?php echo htmlspecialchars($cidade->getDesemprego());?>"></th>
                    <th id="bd"><input type="text" name="telefone" id="nome1" value="<?php echo htmlspecialchars($cidade->getTelefone());?>"></th>
                    <th id="bd"><input type="text" name="email" id="nome1" value="<?php echo htmlspecialchars($cidade->getEmail());?>"></th>
                </tr>
            </table>
            <div style="margin-top: 10px;">
                <input type="submit" id="nome1" name="Alterar" value="Alterar">
                <input type="submit" id="nome1" name="Excluir" value="Excluir">
            </div>
        </form>
        <?php
            elseif ($tipo == 'ponto'): 
        ?>
        <form  name="menu" method="post" action="Tela0Perfil.php">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                </tr>
                <tr>
                    <th id="bd"><input type="text" name="nome" id="nome1" value="<?php echo htmlspecialchars($ponto->getNome());?>"></th>
                    <th id="bd"><input type="text" name="telefone" id="nome1" value="<?php echo htmlspecialchars($ponto->getTelefone());?>"></th>
                    <th id="bd"><input type="text" name="email" id="nome1" value="<?php echo htmlspecialchars($ponto->getEmail());?>"></th>
                    <th id="bd"><input type="text" name="end" id="nome1" value="<?php echo htmlspecialchars($ponto->getEndereco());?>"></th>
                </tr>
                <tr>
                    <th id="bd">Cidade</th>
                    <th id="bd">CPF</th>
                    <th id="bd">CNPJ</th>
                    <th id="bd">Descrição</th>
                </tr>
                <tr>
                    <th id="bd"><input type="cidade" name="cidade" id="nome1" value="<?php echo htmlspecialchars($ponto->getCidade());?>"></th>
                    <th id="bd"><input type="text" name="cpf" id="nome1" value="<?php echo htmlspecialchars($ponto->getCpf());?>"></th>
                    <th id="bd"><input type="text" name="cnpj" id="nome1" value="<?php echo htmlspecialchars($ponto->getCnpj());?>"></th>
                    <th id="bd"><input type="text" name="descricao" id="nome1" value="<?php echo htmlspecialchars($ponto->getDescricao());?>"></th>
                </tr>
            </table>
            <div style="margin-top: 10px;">
                <input type="submit" id="nome1" name="Alterar" value="Alterar">
                <input type="submit" id="nome1" name="Excluir" value="Excluir">
            </div>
        </form>
        <?php endif; ?>
        </div>
    </section>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
</body>
</html>
