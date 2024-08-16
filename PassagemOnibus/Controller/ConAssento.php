<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/Assento.php';

    class ConAssento{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertASS(Assento $Assento){
            $pstmt = $this->conexao->prepare("INSERT INTO assentos 
            (fkOnibus, fkUser, numAssento, tipoAssento) VALUES 
            (?,?,?,?)");
            $pstmt->bindValue(1, $Assento->getfkOnibus());
            $pstmt->bindValue(2, $Assento->getfkUser());
            $pstmt->bindValue(3, $Assento->getnumAssento());
            $pstmt->bindValue(4, $Assento->gettipoAssento());
            $pstmt->execute();
            return $pstmt;
        }
    }

?>