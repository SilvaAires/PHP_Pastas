<?php
class Carro {
    private $id;
    private $marca;
    private $modelo;
    private $anoFabricacao;

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

    function atualizar($atributos) {
    	foreach ($atributos as $atributo => $valor) {
    		if(isset($valor) && property_exists(get_class($this), $atributo)){            	
            	$this->$atributo = $valor;
            }
        }
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getAnoFabricacao() {
        return $this->anoFabricacao;
    }

    public function setAnoFabricacao($anoFabricacao) {
        $this->anoFabricacao = $anoFabricacao;
    }
    
    public function __toString(){
    	return "<br>ID: ".$this->id."<br>MARCA: ".$this->marca."<br>MODELO: ".$this->modelo."<br>ANO FABRICAÇÃO: ".$this->anoFabricacao."<br><br>";
    }
}