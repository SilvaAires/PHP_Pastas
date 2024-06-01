<?php
include_once __DIR__ . '/../Conexao/Conexao.php';
include_once __DIR__ . '/../Model/Login.php';


class LoginDAO{
	private $conexao;
	
	public function __construct(){
		$this->conexao = Conexao::getConexao();
	}
	
	public function login(){		
		$login = new Login($_POST);		
		$stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE email = :email");		
		$stmt->bindValue(":email", $login->getEmail());		
		$stmt->execute();
		$linha = $stmt->fetch();
		if($linha != null){
			
			if($linha['senha'] == $login->getSenha()){
				$login->atualizar($linha); // Atualiza os demais atributos...
				session_start();				
				session_regenerate_id();					
				$sessaoID = session_id();				
				
				$stmt = $this->conexao->prepare("UPDATE usuario SET sessaoID = :sessaoID WHERE id = :id");
				$stmt->bindValue(":sessaoID", $sessaoID);
				$stmt->bindValue(":id", $login->getId());
				$stmt->execute();
																
				$_SESSION['id'] = $linha['id'];					
				$_SESSION['sessaoID'] = $sessaoID;
				
				echo "DEU CERTO:";
				header('location:../home.php');
			}else{
				header('location:../index.php?erro');
			}
		}else{
			header('location:../index.php?erro');
		}
	}
	
	public function logout(){
		session_id($_SESSION['sessaoID']);		
		session_start();	
		$_SESSION = array();
		session_destroy();		
		header('location:../index.php');
	}
	
	public function checkLogin(){
		session_start();
		$stmt = $this->conexao->prepare("SELECT sessaoID FROM usuario WHERE id = :id");
		$stmt->bindValue(":id", $_SESSION['id']);
		$stmt->execute();
		$linha = $stmt->fetch();
		if($linha != null){							
			if($_SESSION['sessaoID'] != $linha['sessaoID']){
				$data['saida'] = 'logout';
			}else{
				$data['saida'] = 'login';
			}
			echo json_encode($data);
		}			
	}
}