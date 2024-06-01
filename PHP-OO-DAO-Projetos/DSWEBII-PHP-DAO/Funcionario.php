<?php
class Funcionario{
    private $id;
    private $nome;
    private $email;
    private $cargo;
    
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
    		if(isset($valor) && property_exists(get_class($this), $atributo)){    	
    			$this->$atributo = $valor;
    		}    		
    	}
    }
    
    public function getId(){
        return $this->id;
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getCargo(){
        return $this->cargo;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    public function __toString(){
        return "ID: " . $this->id . " Nome: " . $this->nome . " E-mail: "
        		. $this->email . " Cargo: " . $this->cargo . "<br><br>";
    }   
}

