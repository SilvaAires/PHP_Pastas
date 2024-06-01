<?php
    class empresa{
        private $idEmpresa;
        private $nome;
        private $cnpj;
        private $telefone;
        private $email;
        private $pix;
        private $prejuizo;
        private $valorArrecadado;
        private $endereco;
        private $cidade;
        private $comprovanteResidencia;
        private $vagasDeEmprego;
        private $empregadosTotal;
        private $userFKEmpresa;
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
        public function getIdEmpresa(){
            return $this->idEmpresa;
        } 
        public function setIdEmpresa($idEmpresa){
            return $this->idEmpresa = $idEmpresa;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getCnpj(){
            return $this->cnpj;
        } 
        public function setCnpj($cnpj){
            return $this->cnpj = $cnpj;
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
        public function getEndereco(){
            return $this->endereco;
        } 
        public function setEndereco($endereco){
            return $this->endereco = $endereco;
        }
        public function getCidade(){
            return $this->cidade;
        } 
        public function setCidade($cidade){
            return $this->cidade = $cidade;
        }
        public function getComprovanteResidencia(){
            return $this->comprovanteResidencia;
        } 
        public function setComprovanteResidencia($comprovanteResidencia){
            return $this->comprovanteResidencia = $comprovanteResidencia;
        }
        public function getVagasDeEmprego(){
            return $this->vagasDeEmprego;
        } 
        public function setVagasDeEmprego($vagasDeEmprego){
            return $this->vagasDeEmprego = $vagasDeEmprego;
        }
        public function getEmpregadosTotal(){
            return $this->empregadosTotal;
        } 
        public function setEmpregadosTotal($empregadosTotal){
            return $this->empregadosTotal = $empregadosTotal;
        }
        public function getUserFKEmpresa(){
            return $this->userFKEmpresa;
        } 
        public function setUserFKEmpresa($userFKEmpresa){
            return $this->userFKEmpresa = $userFKEmpresa;
        }
        public function __toString(){
            return "idEmpresa: " . $this->idEmpresa . " nome: " . $this->nome . " cnpj: "
                    . $this->cnpj . " telefone: " . $this->telefone . " email: " . $this->email .
                    " pix: " . $this->pix . " prejuizo: " . $this->prejuizo . " valorArrecadado: " . $this->valorArrecadado .
                    " endereço: " . $this->endereco . " cidade: " . $this->cidade . " comprovanteResidencia: " . $this->comprovanteResidencia .
                    " vagasDeEmprego: " . $this->vagasDeEmprego .  " empregadosTotal: " . $this->empregadosTotal . " userFKEmpresa : " . $this->userFKEmpresa . "<br><br>";
        } 
    }
?>