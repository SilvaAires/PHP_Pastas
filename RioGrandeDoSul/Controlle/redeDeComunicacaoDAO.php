<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/redeDeComunicacao.php';
    class redeDeComunicacaoDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertRede(redeDeComunicacao $rede){
            $pstmt = $this->conexao->prepare("INSERT INTO redecomunicacoes 
            (facebook, twitter, linkedin, whatsApp, site, portifolio, userFKRede) VALUES 
            (:facebook, :twitter, :linkedin, :whatsApp, :site, :portifolio, :userFKRede)");
            $pstmt->bindValue(":facebook", $rede->getFacebook());
            $pstmt->bindValue(":twitter", $rede->getTwitter());
            $pstmt->bindValue(":linkedin", $rede->getLinkedin());
            $pstmt->bindValue(":whatsApp", $rede->getWhatsApp());
            $pstmt->bindValue(":site", $rede->getSite());
            $pstmt->bindValue(":portifolio", $rede->getPortifolio());
            $pstmt->bindValue(":userFKRede", $rede->getUserFKRede());
            $pstmt->execute();
        }
        public function selectAllRede(){
            $pstmt = $this->conexao->prepare("SELECT * FROM redecomunicacoes");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, redeDeComunicacao::class);
            return $lista;
        } 
        function selectAllRedeUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM redecomunicacoes po WHERE po.userFKRede = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, redeDeComunicacao::class);
            return $lista;
        } 
        function selectSiteRede($site){
            $pstmt = $this->conexao->prepare("SELECT * FROM redecomunicacoes po WHERE po.site = :site");
            $pstmt->bindValue(":site", $site);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, redeDeComunicacao::class);
            return $lista;
        }  
        function selectWhatsAppRedeUser($whatsApp){
            $pstmt = $this->conexao->prepare("SELECT * FROM redecomunicacoes po WHERE po.whatsApp = :whatsApp");
            $pstmt->bindValue(":whatsApp", $whatsApp);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, redeDeComunicacao::class);
            return $lista;
        } 
    }
?>