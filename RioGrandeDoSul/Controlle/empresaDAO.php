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
            (nome, cnpj, telefone, email, prejuizo, valorArrecadado, pix, endereco, 
            cidade, comporvanteResidencia, vagasDeEmprego, empregadosTotal, userFKEmpresa) VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $pstmt->bindValue(1, $empresa->getNome());
            $pstmt->bindValue(2, $empresa->getCnpj());
            $pstmt->bindValue(3, $empresa->getTelefone());
            $pstmt->bindValue(4, $empresa->getEmail());
            $pstmt->bindValue(5, $empresa->getPrejuizo());
            $pstmt->bindValue(6, $empresa->getValorArrecadado());
            $pstmt->bindValue(7, $empresa->getPix());
            $pstmt->bindValue(8, $empresa->getEndereco());
            $pstmt->bindValue(9, $empresa->getCidade());
            $pstmt->bindValue(10, $empresa->getComprovanteResidencia());
            $pstmt->bindValue(11, $empresa->getVagasDeEmprego());
            $pstmt->bindValue(12, $empresa->getEmpregadosTotal());
            $pstmt->bindValue(13, $empresa->getUserFKEmpresa());
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
        function deleteEmpresa($idUser){
            $pstmt = $this->conexao->prepare("DELETE FROM empresa em WHERE em.userFKEmpresa = :idUser");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            return $pstmt;
        } 
        function updateEmpresa(empresa $empresa){
            $pstmt = $this->conexao->prepare("UPDATE empresa SET nome = :nome, cnpj = :cnpj, telefone = : telefone, 
            email = :email, pix = :pix, prejuizo = :prejuizo, valorArrecadado = :valorArrecadado, endereco = :endereco, 
            cidade = :cidade, comprovanteResidencia = :comprovanteResidencia, vagasDeEmprego = :vagasDeEmprego, empregadosTotal = :empregadosTotal, 
            WHERE userFKEmpresa = :userFKEmpresa");
            $pstmt->bindValue(":nome", $empresa->getTelefone());
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
            return $pstmt;
        } 
    }
?>