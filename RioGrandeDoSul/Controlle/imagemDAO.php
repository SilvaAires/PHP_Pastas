<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/imagem.php';
    class imagemDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertImagem(imagem $imagem){
            $pstmt = $this->conexao->prepare("INSERT INTO imagens (descricao, imagem, userFK) 
            VALUES (:descricao, :imagem, :userFK)");
            $pstmt->bindValue(":descricao", $imagem->getDescricao());
            $pstmt->bindValue(":imagem", $imagem->getImagem());
            $pstmt->bindValue(":userFK", $imagem->getUserFK());
            $pstmt->execute();
        }
        public function selectAllImagem(){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        }
        function selectAllImagemUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens im WHERE im.userFK = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        } 
        function selectEspecificaImagemUser($idUser, $descricao){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens im WHERE im.userFK = :idUser AND im.descricao = :descricao");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->bindValue(":descricao", $descricao);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class); 
            return $lista;
        }
        function selectPessoaImagemUser($nomePessoa){
            $pstmt = $this->conexao->prepare("SELECT * 
                                              FROM imagens im, user us, pessoa pe
                                              WHERE pe.nome = :nome AND pe.userFKPessoa = us.idUser AND us.idUser = im.userFK");
            $pstmt->bindValue(":nome", $nomePessoa);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        }
        function selectEmpresaImagemUser($nomeEmpresa){
            $pstmt = $this->conexao->prepare("SELECT * 
                                              FROM imagens im, user us, empresa em
                                              WHERE em.nome = :nome AND em.userFKEmpresa = us.idUser AND us.idUser = im.userFK");
            $pstmt->bindValue(":nome", $nomeEmpresa);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        } 
        function selectCidadeImagemUser($nomeCidade){
            $pstmt = $this->conexao->prepare("SELECT * 
                                              FROM imagens im, user us, cidade ci
                                              WHERE ci.nome = :nome AND ci.userFKCidade = us.idUser AND us.idUser = im.userFK");
            $pstmt->bindValue(":nome", $nomeCidade);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        }
        function selectPontoImagemUser($nomePonto){
            $pstmt = $this->conexao->prepare("SELECT * 
                                              FROM imagens im, user us, pontodeajuda po
                                              WHERE po.nome = :nome AND po.userFK = us.idUser AND us.idUser = im.userFK");
            $pstmt->bindValue(":nome", $nomePonto);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        }    
    }
?>