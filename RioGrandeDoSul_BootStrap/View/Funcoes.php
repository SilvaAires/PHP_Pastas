<?php
    include_once '../Model/user.php';
    include_once '../Model/pessoa.php';
    include_once '../Model/cidade.php';
    include_once '../Model/empresa.php';
    include_once '../Model/pontoDeAjuda.php';
    include_once '../Model/redeDeComunicacao.php';
    include_once '../Model/imagem.php';

    include_once '../Controlle/userDAO.php';
    include_once '../Controlle/pessoaDAO.php';
    include_once '../Controlle/cidadeDAO.php';
    include_once '../Controlle/empresaDAO.php';
    include_once '../Controlle/pontoDeAjudaDAO.php';
    include_once '../Controlle/redeDeComunicacaoDAO.php';
    include_once '../Controlle/imagemDAO.php';

    function insert_User_Return_ID($login, $passaword, $tipo){
        $data_hora = date("Y-m-d H:i:s");
        $arrrayUser = array("login" => $login, 
                            "passaword" => $passaword, 
                            "criacao" => $data_hora, 
                            "tipoDeConta" => $tipo
                        );
        $userDAo = new userDAO();
        $user = new user($arrrayUser);

        $userDAo->insertUser($user);

        $lista = $userDAo->selectLoginUser1($login);

        $funcionario = new user($lista[0]);
        $fk = $funcionario->getIdUser();
        return $fk;
    }
    function insert_Pessoa($nome, $cpf, $telefone, $email, $pix, $prejuizo, $valorArrecadado, $endereco, $cidade, $comprovante, $situacaoDeEmprego, $fk){
        $arrrayPessoa = array("nome" => $nome, 
                            "cpf" => $cpf, 
                            "telefone" => $telefone, 
                            "email" => $email,
                            "pix" => $pix,
                            "prejuizo" => $prejuizo,
                            "valorArrecadado" => $valorArrecadado,
                            "endereco" => $endereco,
                            "cidade" => $cidade,
                            "comprovanteResidencia" => $comprovante,
                            "situacaoDeEmprego" => $situacaoDeEmprego,
                            "userFKPessoa" => $fk
                        );

        $pessoaDAO = new pessoaDAO();
        $pessoa = new pessoa($arrrayPessoa);

        $pessoaDAO->insertPessoa($pessoa);
    }
    function insert_Empresa($nome, $cnpj, $telefone, $email, $pix, $prejuizo, $valorArrecadado, $endereco, $cidade, $comprovante, $vagasDeEmprego, $empregadosTotal, $fk){
        $arrrayEmpresa = array("nome" => $nome, 
                            "cnpj" => $cnpj, 
                            "telefone" => $telefone, 
                            "email" => $email,
                            "prejuizo" => $prejuizo,
                            "valorArrecadado" => $valorArrecadado,
                            "pix" => $pix,
                            "endereco" => $endereco,
                            "cidade" => $cidade,
                            "comprovanteResidencia" => $comprovante,
                            "vagasDeEmprego" => $vagasDeEmprego,
                            "empregadosTotal" => $empregadosTotal,
                            "userFKEmpresa" => $fk
                        );

        $empresaDAO = new empresaDAO();
        $empresa = new empresa($arrrayEmpresa);
            
        $empresaDAO->insertEmpresa($empresa);
    }
    function insert_Cidade($nome, $populacao, $feridos, $mortos, $desabrigados, $pix, $estadoSituacao, $prejuizo, $valorArrecadado, $desemprego, $telefone, $email, $fk){
        $arrrayCidade = array("nome" => $nome, 
                            "populacao" => $populacao, 
                            "feridos" => $feridos, 
                            "mortos" => $mortos,
                            "desabrigados" => $desabrigados,
                            "pix" => $pix,
                            "estadoSituacao" => $estadoSituacao,
                            "prejuizo" => $prejuizo,
                            "valorArrecadado" => $valorArrecadado,
                            "desemprego" => $desemprego,
                            "telefone" => $telefone,
                            "email" => $email,
                            "userFKCidade" => $fk
                        );

        $cidadeDAO = new cidadeDAO();
        $cidade = new cidade($arrrayCidade);

        $cidadeDAO->insertCidade($cidade);
    }
    function insert_Ponto($telefone, $email, $endereco, $cidade, $cpf, $cnpj, $descricao, $fk, $nome){
        $arrrayPontoDeAjuda = array("telefone" => $telefone, 
                            "email" => $email, 
                            "endereco" => $endereco, 
                            "cidade" => $cidade,
                            "cpf" => $cpf,
                            "cnpj" => $cnpj,
                            "descricao" => $descricao,
                            "userFK" => $fk,
                            "nome" => $nome
                        );

        $pontoDeAjudaDAO = new pontoDeAjudaDAO();
        $pontoDeAjuda = new pontoDeAjuda($arrrayPontoDeAjuda);

        $pontoDeAjudaDAO->insertPonto($pontoDeAjuda);
    }
    function insert_Rede($facebook, $twitter, $linkedin, $whatsApp, $site, $portifolio, $userFKRede){
        $arrrayRede = array("facebook" => $facebook, 
                            "twitter" => $twitter, 
                            "linkedin" => $linkedin, 
                            "whatsApp" => $whatsApp,
                            "site" => $site,
                            "portifolio" => $portifolio,
                            "userFKRede" => $userFKRede
                        );

        $redeDeComunicacaoDAO = new redeDeComunicacaoDAO();
        $redeDeComunicacao = new redeDeComunicacao($arrrayRede);

        $redeDeComunicacaoDAO->insertRede($redeDeComunicacao);
    }
    function insert_Imagem($descricao, $caminho, $fk){
        $arrrayImagem = array("descricao" => $descricao, 
                            "caminho" => $caminho, 
                            "userFK" => $fk
                        );

        $imagemDAO = new imagemDAO();
        $imagem = new imagem($arrrayImagem);

        $imagemDAO->insertImagem($imagem);
    }
?>