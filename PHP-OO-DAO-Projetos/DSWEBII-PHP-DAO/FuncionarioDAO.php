<?php
include_once __DIR__ . '/Conexao/Conexao.php';
include_once  __DIR__ . '/Funcionario.php';

class FuncionarioDAO{
    
    private $conexao;
    
    public function __construct(){
        $this->conexao = Conexao::getConexao();
    }
    
    public function inserir(Funcionario $funcionario){        
        $pstmt = $this->conexao->prepare("INSERT INTO FUNCIONARIO (nome, email, cargo) VALUES (:nome, :email, :cargo)");
        $pstmt->bindValue(":nome", $funcionario->getNome());
        $pstmt->bindValue(":email", $funcionario->getEmail());
        $pstmt->bindValue(":cargo", $funcionario->getCargo());
        $pstmt->execute();
    }
    
    public function listar(){
        $pstmt = $this->conexao->prepare("SELECT * FROM Funcionario");
        $pstmt->execute();
        $lista = $pstmt->fetchAll(PDO::FETCH_CLASS, Funcionario::class);
        return $lista;
    }    
}
?>

