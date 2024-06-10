<?php
    class user{
        private $idUser;
        private $login;
        private $passaword;
        private $criacao;
        private $tipoDeConta;
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
        public function getIdUser(){
            return $this->idUser;
        } 
        public function setIdUser($idUser){
            return $this->idUser = $idUser;
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
        public function getTipoDeConta(){
            return $this->tipoDeConta;
        } 
        public function setTipoDeConta($tipoDeConta){
            return $this->tipoDeConta = $tipoDeConta;
        }
        public function __toString(){
            return "IDUser: " . $this->idUser . " Login: " . $this->login . " Passaword: "
                    . $this->passaword . " Criação: " . $this->criacao . " Tipo De Conta: " . $this->tipoDeConta . "<br><br>";
        } 
    }
?>