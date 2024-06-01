<?php
    class user{
        private $id;
        private $login;
        private $passaword;
        private $criacao;
        public function __construct(){
            if (func_num_args() != 0) {
                $atributos = func_get_args()[0];
                foreach ($atributos as $atributo => $valor) {
                    if(isset($valor) && property_exists(get_class($this), $atributo)){
                        $this->$atributo = $valor;
                    }    			
                }
            }
        }
        public function getId(){
            return $this->id;
        } 
        public function setId($id){
            return $this->id = $id;;
        }
        public function getLogin(){
            return $this->login;
        } 
        public function setLogin($login){
            return $this->login = $login;
        }
        public function getPassaword(){
            return $this->passaword;
        } 
        public function setPassaword($passaword){
            return $this->passaword = $passaword;
        }
        public function getCriacao(){
            return $this->criacao;
        } 
        public function setCriacao($criacao){
            return $this->criacao = $criacao;
        }
        public function __toString(){
            return "ID: " . $this->id . " Login: " . $this->login . " Passaword: "
                    . $this->passaword . " Criação: " . $this->criacao . "<br><br>";
        } 
    }
?>