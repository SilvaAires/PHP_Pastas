<?php
    class cidade{
        private $idCidade;
        private $nome;
        private $populacao;
        private $feridos;
        private $mortos;
        private $desabrigados;
        private $pix;
        private $estadoSituacao;
        private $prejuizo;
        private $valorArrecadado;
        private $desemprego;
        private $telefone;
        private $email;
        private $userFKCidade;
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
        public function getIdCidade(){
            return $this->idCidade;
        } 
        public function setIdCidade($idCidade){
            return $this->idCidade = $idCidade;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getPopulacao(){
            return $this->populacao;
        } 
        public function setPopulacao($populacao){
            return $this->populacao = $populacao;
        }
        public function getTelefone(){
            return $this->telefone;
        } 
        public function setTelefone($telefone){
            return $this->telefone = $telefone;
        }
        public function getEmail(){
            return $this->email;
        } 
        public function setEmail($email){
            return $this->email = $email;
        }
        public function getPix(){
            return $this->pix;
        } 
        public function setPix($pix){
            return $this->pix = $pix;
        }
        public function getPrejuizo(){
            return $this->prejuizo;
        } 
        public function setId($prejuizo){
            return $this->prejuizo = $prejuizo;
        }
        public function getValorArrecadado(){
            return $this->valorArrecadado;
        } 
        public function setValorArrecadado($valorArrecadado){
            return $this->valorArrecadado = $valorArrecadado;
        }
        public function getFeridos(){
            return $this->feridos;
        } 
        public function setFeridos($feridos){
            return $this->feridos = $feridos;
        }
        public function getMortos(){
            return $this->mortos;
        } 
        public function setMortos($mortos){
            return $this->mortos = $mortos;
        }
        public function getDesabrigados(){
            return $this->desabrigados;
        } 
        public function setDesabrigados($desabrigados){
            return $this->desabrigados = $desabrigados;
        }
        public function getEstadoSituacao(){
            return $this->estadoSituacao;
        } 
        public function setEstadoSituacao($estadoSituacao){
            return $this->estadoSituacao = $estadoSituacao;
        }
        public function getDesemprego(){
            return $this->desemprego;
        } 
        public function setDesemprego($desemprego){
            return $this->desemprego = $desemprego;
        }
        public function getUserFKCidade(){
            return $this->userFKCidade;
        } 
        public function setUserFKCidade($userFKCidade){
            return $this->userFKCidade = $userFKCidade;
        }
        public function __toString(){
            return "idEmpresa: " . $this->idCidade . " nome: " . $this->nome . " populção: "
                    . $this->populacao . " telefone: " . $this->telefone . " email: " . $this->email .
                    " pix: " . $this->pix . " prejuizo: " . $this->prejuizo . " valorArrecadado: " . $this->valorArrecadado .
                    " feridos: " . $this->feridos . " mortos: " . $this->mortos . " desabrigados: " . $this->desabrigados .
                    " estadoSituacao: " . $this->estadoSituacao .  " desemprego: " . $this->desemprego . " userFKCidade : " . $this->userFKCidade . "<br><br>";
        } 
    }
?>