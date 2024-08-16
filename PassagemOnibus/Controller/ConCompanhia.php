<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/CompanhiaOnibus.php';

    class ConCompanhia{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertCIA(CompanhiaOnibus $CompanhiaOnibus){
            $pstmt = $this->conexao->prepare("INSERT INTO companhiaonibus 
            (nomeCIA, localCIA, telefone, email, logo) VALUES 
            (?, ?, ?, ?, ?)");
            $pstmt->bindValue(1, $CompanhiaOnibus->getnomeCIA());
            $pstmt->bindValue(2, $CompanhiaOnibus->getlocalCIA());
            $pstmt->bindValue(3, $CompanhiaOnibus->gettelefone());
            $pstmt->bindValue(4, $CompanhiaOnibus->getemail());
            $pstmt->bindValue(5, $CompanhiaOnibus->getlogo());
            $pstmt->execute();
            return $pstmt;
        }

        public function selectAllCIA(){
            $pstmt = $this->conexao->prepare("SELECT * FROM companhiaonibus");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        public function selectLogo($fkOn){
            $pstmt = $this->conexao->prepare("SELECT * FROM companhiaonibus WHERE idCIA = ?");
            $pstmt->bindValue(1, $fkOn);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        public function selectnomeCIA(){
            $pstmt = $this->conexao->prepare("SELECT idCIA, nomeCIA FROM companhiaonibus ORDER BY nomeCIA");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        public function selectCIANome($nome){
            $pstmt = $this->conexao->prepare("SELECT * FROM companhiaonibus WHERE nomeCIA = ?");
            $pstmt->bindValue(1, $nome);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, CompanhiaOnibus::class);
            return $lista;
        }

        function deleteCIA($idCIA){
            $pstmt = $this->conexao->prepare("DELETE FROM companhiaonibus WHERE idCIA = ?");
            $pstmt->bindValue(1, $idCIA);
            $pstmt->execute();
            return $pstmt;
        }  

        function updateCIA(CompanhiaOnibus $CompanhiaOnibus){
            $pstmt = $this->conexao->prepare("UPDATE companhiaonibus SET nomeCIA = ?, localCIA = ?,
            telefone = ?, email = ?
            WHERE idCIA = ?");
            $pstmt->bindValue(1, $CompanhiaOnibus->getnomeCIA());
            $pstmt->bindValue(2, $CompanhiaOnibus->getlocalCIA());
            $pstmt->bindValue(3, $CompanhiaOnibus->gettelefone());
            $pstmt->bindValue(4, $CompanhiaOnibus->getemail());
            $pstmt->bindValue(5, $CompanhiaOnibus->getidCIA());
            $pstmt->execute();
            return $pstmt;
        } 
    }

?>