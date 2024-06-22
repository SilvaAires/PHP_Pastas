<?php
    include_once '../Conexao/Conexao.php';
    include_once '../Model/pessoa.php';
    class pessoaDAO{
        private $conexao;
        public function __construct(){
            $this->conexao = Conexao::getConexao();
        }
        function insertPessoa(pessoa $pessoa){
            $pstmt = $this->conexao->prepare("INSERT INTO pessoa 
            (nome, cpf, telefone, email, pix, prejuizo, valorArrecadado, endereco, 
            cidade, comprovanteResidencia, situacaoDeEmprego, userFKPessoa) VALUES 
            (:nome, :cpf, :telefone, :email, :pix, :prejuizo, :valorArrecadado, :endereco, 
            :cidade, :comprovanteResidencia, :situacaoDeEmprego, :userFKPessoa)");
            $pstmt->bindValue(":nome", $pessoa->getNome());
            $pstmt->bindValue(":cpf", $pessoa->getCpf());
            $pstmt->bindValue(":telefone", $pessoa->getTelefone());
            $pstmt->bindValue(":email", $pessoa->getEmail());
            $pstmt->bindValue(":pix", $pessoa->getPix());
            $pstmt->bindValue(":prejuizo", $pessoa->getPrejuizo());
            $pstmt->bindValue(":valorArrecadado", $pessoa->getValorArrecadado());
            $pstmt->bindValue(":endereco", $pessoa->getEndereco());
            $pstmt->bindValue(":cidade", $pessoa->getCidade());
            $pstmt->bindValue(":comprovanteResidencia", $pessoa->getComprovanteResidencia());
            $pstmt->bindValue(":situacaoDeEmprego", $pessoa->getSituacaoDeEmprego());
            $pstmt->bindValue(":userFKPessoa", $pessoa->getUserFKPessoa());
            $pstmt->execute();
        }
        public function selectAllPessoa(){
            $pstmt = $this->conexao->prepare("SELECT * FROM pessoa");
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pessoa::class);
            return $lista;
        }
        function selectAllPessoaUser($idUser){
            $pstmt = $this->conexao->prepare("SELECT * FROM pessoa pe WHERE pe.userFKPessoa = :idUser ");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pessoa::class);
            return $lista;
        } 
        function selectCpfPessoa($cpf){
            $pstmt = $this->conexao->prepare("SELECT * FROM pessoa pe WHERE pe.cpf = :cpf");
            $pstmt->bindValue(":cpf", $cpf);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pessoa::class);
            return $lista;
        }  
        function selectNomePessoa($nome){
            $pstmt = $this->conexao->prepare("SELECT * FROM pessoa pe WHERE pe.nome = :nome");
            $pstmt->bindValue(":nome", $nome);
            $pstmt->execute();
            $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, pessoa::class);
            return $lista;
        } 
        function deletePessoa($idUser){
            $pstmt = $this->conexao->prepare("DELETE FROM pessoa WHERE userFKPessoa = :idUser");
            $pstmt->bindValue(":idUser", $idUser);
            $pstmt->execute();
            return $pstmt;
        }  
        function updatePessoa(pessoa $pessoa){
            $pstmt = $this->conexao->prepare("UPDATE pessoa SET nome = ?, cpf = ?, telefone = ?, 
            email = ?, pix = ?, prejuizo = ?, valorArrecadado = ?, endereco = ?, 
            cidade = ?, situacaoDeEmprego = ?  
            WHERE userFKPessoa = ?");
            $pstmt->bindValue(1, $pessoa->getTelefone());
            $pstmt->bindValue(2, $pessoa->getCpf());
            $pstmt->bindValue(3, $pessoa->getTelefone());
            $pstmt->bindValue(4, $pessoa->getEmail());
            $pstmt->bindValue(5, $pessoa->getPix());
            $pstmt->bindValue(6, $pessoa->getPrejuizo());
            $pstmt->bindValue(7, $pessoa->getValorArrecadado());
            $pstmt->bindValue(8, $pessoa->getEndereco());
            $pstmt->bindValue(9, $pessoa->getCidade());
            $pstmt->bindValue(10, $pessoa->getSituacaoDeEmprego());
            $pstmt->bindValue(11, $pessoa->getUserFKPessoa());
            $pstmt->execute();
            return $pstmt;
        }  
    }
?>