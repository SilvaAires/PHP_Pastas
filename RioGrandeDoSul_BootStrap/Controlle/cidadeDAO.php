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
            return $pstmt;
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
        function deleteCidade($idUser){
            $pstmt = $this->conexao->prepare("DELETE FROM cidade WHERE userFKCidade = :idUser");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            return $pstmt;
        }   
        function updateCidade(cidade $cidade){
            $pstmt = $this->conexao->prepare("UPDATE cidade SET nome = ?, populacao = ?,
            feridos = ?, mortos = ?, desabrigados = ?, pix = ?, 
            estadoSituacao = ?, prejuizo = ?, valorArrecadado = ?, 
            desemprego = ?, telefone = ?, email = ?
            WHERE userFKCidade = ?");
            $pstmt->bindValue(1, $cidade->getNome());
            $pstmt->bindValue(2, $cidade->getPopulacao());
            $pstmt->bindValue(3, $cidade->getFeridos());
            $pstmt->bindValue(4, $cidade->getMortos());
            $pstmt->bindValue(5, $cidade->getDesabrigados());
            $pstmt->bindValue(6, $cidade->getPix());
            $pstmt->bindValue(7, $cidade->getEstadoSituacao());
            $pstmt->bindValue(8, $cidade->getPrejuizo());
            $pstmt->bindValue(9, $cidade->getValorArrecadado());
            $pstmt->bindValue(10, $cidade->getDesemprego());
            $pstmt->bindValue(11, $cidade->getTelefone());
            $pstmt->bindValue(12, $cidade->getEmail());
            $pstmt->bindValue(13, $cidade->getUserFKCidade());
            $pstmt->execute();
            return $pstmt;
        } 
    }
?>