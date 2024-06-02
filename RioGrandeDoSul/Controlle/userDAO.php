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
        function selectAllUser1($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM user us WHERE us.idUser = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        } 
        function selectLoginUser1($login){
            $pstmt = $this->conexao->prepare("SELECT * FROM user us WHERE us.login = :login ");
            $pstmt->bindValue(":login", $login);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        } 
    }
?>