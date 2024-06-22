<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/imagem.php';
    class imagemDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertImagem(imagem $imagem){
            $pstmt = $this->conexao->prepare("INSERT INTO imagens (descricao, caminho, userFK) 
            VALUES (?, ?, ?)");
            $pstmt->bindValue(1, $imagem->getDescricao());
            $pstmt->bindValue(2, $imagem->getCaminho());
            $pstmt->bindValue(3, $imagem->getUserFK());
            $pstmt->execute();
        }
        public function selectAllImagem(){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        }
        function selectAllFK($userFK){
            $pstmt = $this->conexao->prepare("SELECT im.caminho, im.descricao FROM imagens im WHERE im.userFK = ? ORDER BY RAND() LIMIT 3;");
            $pstmt->bindValue(1, $userFK);
            $pstmt->execute();
            $lista = $pstmt->fetchAll();
            return $lista;
        } 
        function selectAllImagemID($userFK){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens im WHERE im.userFK = ? ");
            $pstmt->bindValue(1, $userFK);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class);
            return $lista;
        } 
        function selectEspecificaImagemUser($idUser, $descricao){
            $pstmt = $this->conexao->prepare("SELECT * FROM imagens im WHERE im.userFK = ? AND im.descricao = ?");
            $pstmt->bindValue(1, $idUser);
            $pstmt->bindValue(2, $descricao);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, imagem::class); 
            return $lista;
        }
        function selectPessoaImagemUser($nomePessoa){
            $pstmt = $this->conexao->prepare("SELECT * 
                                              FROM imagens im, user us, pessoa pe
                                              WHERE pe.nome = ? AND pe.userFKPessoa = us.idUser AND us.idUser = im.userFK");
            $pstmt->bindValue(1, $nomePessoa);
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
        function deleteImagem($idUser){
            $pstmt = $this->conexao->prepare("DELETE FROM imagens im WHERE im.userFK = :idUser");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            return $pstmt;
        }   
        function updateImagem(imagem $imagem){
            $pstmt = $this->conexao->prepare("UPDATE imagens SET descricao = ?
            WHERE idimagem = ?");
            $pstmt->bindValue(1, $imagem->getDescricao());
            $pstmt->bindValue(3, $imagem->getIdimagem());
            $pstmt->execute();
            return $pstmt;
        } 
    }
?>