<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/empresa.php';
    class empresaDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertEmpresa(empresa $empresa){
            $pstmt = $this->conexao->prepare("INSERT INTO empresa 
            (nome, cnpj, telefone, email, pix, prejuizo, valorArrecadado, endereco, 
            cidade, comprovanteResidencia, vagasDeEmprego, empregadosTotal, userFKEmpresa) VALUES 
            (:nome, :cnpj, :telefone, :email, :pix, :prejuizo, :valorArrecadado, :endereco, 
            :cidade, :comprovanteResidencia, :vagasDeEmprego, :empregadosTotal, :userFKEmpresa)");
            $pstmt->bindValue(":nome", $empresa->getNome());
            $pstmt->bindValue(":cnpj", $empresa->getCnpj());
            $pstmt->bindValue(":telefone", $empresa->getTelefone());
            $pstmt->bindValue(":email", $empresa->getEmail());
            $pstmt->bindValue(":pix", $empresa->getPix());
            $pstmt->bindValue(":prejuizo", $empresa->getPrejuizo());
            $pstmt->bindValue(":valorArrecadado", $empresa->getValorArrecadado());
            $pstmt->bindValue(":endereco", $empresa->getEndereco());
            $pstmt->bindValue(":cidade", $empresa->getCidade());
            $pstmt->bindValue(":comprovanteResidencia", $empresa->getComprovanteResidencia());
            $pstmt->bindValue(":vagasDeEmprego", $empresa->getVagasDeEmprego());
            $pstmt->bindValue(":empregadosTotal", $empresa->getEmpregadosTotal());
            $pstmt->bindValue(":userFKEmpresa", $empresa->getUserFKEmpresa());
            $pstmt->execute();
        }
        public function selectAllEmpresa(){
            $pstmt = $this->conexao->prepare("SELECT * FROM empresa");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, empresa::class);
            return $lista;
        } 
        function selectAllEmpresaUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM empresa em WHERE em.userFKEmpresa = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, empresa::class);
            return $lista;
        } 
        function selectCnpjEmpresa($cnpj){
            $pstmt = $this->conexao->prepare("SELECT * FROM empresa em WHERE em.cnpj = :cnpj");
            $pstmt->bindValue(":cnpj", $cnpj);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, empresa::class);
            return $lista;
        }  
        function selectNomeEmpresa($nome){
            $pstmt = $this->conexao->prepare("SELECT * FROM empresa em WHERE em.nome = :nome");
            $pstmt->bindValue(":nome", $nome);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, empresa::class);
            return $lista;
        }  
    }
?>