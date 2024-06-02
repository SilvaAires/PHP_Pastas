<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/cidade.php';
    class cidadeDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertCidade(cidade $cidade){
            $pstmt = $this->conexao->prepare("INSERT INTO cidade 
            (nome, populacao, feridos, mortos, desabrigados, pix, estadoSituacao, prejuizo, 
            valorArrecadado, desemprego, telefone, email, userFKCidade) VALUES 
            (:nome, :populacao, :feridos, :mortos, :desabrigados, :pix, :estadoSituacao, :prejuizo, 
            :valorArrecadado, :desemprego, :telefone, :email, :userFKCidade)");
            $pstmt->bindValue(":nome", $cidade->getNome());
            $pstmt->bindValue(":populacao", $cidade->getPopulacao());
            $pstmt->bindValue(":feridos", $cidade->getFeridos());
            $pstmt->bindValue(":mortos", $cidade->getMortos());
            $pstmt->bindValue(":desabrigados", $cidade->getDesabrigados());
            $pstmt->bindValue(":pix", $cidade->getPix());
            $pstmt->bindValue(":estadoSituacao", $cidade->getEstadoSituacao());
            $pstmt->bindValue(":prejuizo", $cidade->getPrejuizo());
            $pstmt->bindValue(":valorArrecadado", $cidade->getValorArrecadado());
            $pstmt->bindValue(":desemprego", $cidade->getDesemprego());
            $pstmt->bindValue(":telefone", $cidade->getTelefone());
            $pstmt->bindValue(":email", $cidade->getEmail());
            $pstmt->bindValue(":userFKCidade", $cidade->getUserFKCidade());
            $pstmt->execute();
        }
        public function selectAllCidade(){
            $pstmt = $this->conexao->prepare("SELECT * FROM cidade");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        }
        function selectAllCidadeUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM cidade ci WHERE ci.userFKCidade = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        } 
        function selectDesabrigadosCidade($desabrigados){
            $pstmt = $this->conexao->prepare("SELECT * FROM cidade ci WHERE ci.desabrigados = :desabrigados");
            $pstmt->bindValue(":desabrigados", $desabrigados);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        }  
        function selectNomeCidade($nome){
            $pstmt = $this->conexao->prepare("SELECT * FROM cidade ci WHERE ci.nome = :nome");
            $pstmt->bindValue(":nome", $nome);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, cidade::class);
            return $lista;
        }    
    }
?>