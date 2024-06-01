<?php
class Pessoa{	
	private $nome;
	private $idade;
	
	public function __construct() {
		if (func_num_args() != 0) {
			$atributos = func_get_args()[0];
			foreach ($atributos as $atributo => $valor) {
				if(isset($valor) && property_exists(get_class($this), $atributo)){
					$this->$atributo = $valor;
				}
			}
		}
	}	
	
	public function atualizar($atributos) {
		foreach ($atributos as $atributo => $valor) {
			if (isset($valor) && property_exists(get_class($this), $atributo)){
					$this->$atributo = $valor;
			}
		}			
	}	
	
	public function getNome(){
		return $this->nome;
	}	
	public function setNome($nome){
		$this->nome = $nome;
	}	
	public function getIdade(){
		return $this->idade;
	}		
	public function setIdade($idade){
		$this->idade = $idade;
	}		
	public function __toString(){
		return "Nome: " . $this->nome . "<br>Idade: " . $this->idade . "<br><br>";
	}
}
?>

