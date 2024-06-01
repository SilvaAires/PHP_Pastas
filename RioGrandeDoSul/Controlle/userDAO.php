<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/user.php';
    class userDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertUser(user $user){
            $pstmt = $this->conexao->prepare("INSERT INTO user (login, passaword, criacao) VALUES (:login, :passaword, :criacao)");
            $pstmt->bindValue(":login", $user->getLogin());
            $pstmt->bindValue(":passaword", $user->getPassaword());
            $pstmt->bindValue(":criacao", $user->getCriacao());
            $pstmt->execute();
        }
        public function selectAllUser(){
            $pstmt = $this->conexao->prepare("SELECT * FROM user");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, user::class);
            return $lista;
        }  
    }
?>