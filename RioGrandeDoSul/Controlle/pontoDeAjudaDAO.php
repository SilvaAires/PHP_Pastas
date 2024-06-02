<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/pontoDeAjuda.php';
    class pontoDeAjudaDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertPonto(pontoDeAjuda $ponto){
            $pstmt = $this->conexao->prepare("INSERT INTO pontodeajuda 
            (telefone, email, endereco, cidade, cpf, cnpj, descricao, userFK, nome) VALUES 
            (:telefone, :email, :endereco, :cidade, :cpf, :cnpj, :descricao, :userFK, :nome)");
            $pstmt->bindValue(":telefone", $ponto->getTelefone());
            $pstmt->bindValue(":email", $ponto->getEmail());
            $pstmt->bindValue(":endereco", $ponto->getEndereco());
            $pstmt->bindValue(":cidade", $ponto->getCidade());
            $pstmt->bindValue(":cpf", $ponto->getCpf());
            $pstmt->bindValue(":cnpj", $ponto->getCnpj());
            $pstmt->bindValue(":descricao", $ponto->getDescricao());
            $pstmt->bindValue(":userFK", $ponto->getUserFK());
            $pstmt->bindValue(":nome", $ponto->getNome());
            $pstmt->execute();
        }
        public function selectAllPonto(){
            $pstmt = $this->conexao->prepare("SELECT * FROM pontodeajuda");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pontoDeAjuda::class);
            return $lista;
        }  
        function selectAllPontoUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM pontodeajuda po WHERE po.userFK = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pontoDeAjuda::class);
            return $lista;
        } 
        function selectCidadePonto($cidade){
            $pstmt = $this->conexao->prepare("SELECT * FROM pontodeajuda po WHERE po.cidade = :cidade");
            $pstmt->bindValue(":cidade", $cidade);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pontoDeAjuda::class);
            return $lista;
        }  
        function selectNomePonto($nome){
            $pstmt = $this->conexao->prepare("SELECT * FROM pontodeajuda po WHERE po.nome = :nome");
            $pstmt->bindValue(":nome", $nome);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pontoDeAjuda::class);
            return $lista;
        }
    }
?>