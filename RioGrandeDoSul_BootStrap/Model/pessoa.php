<?php
    class pessoa{
        private $idPessoa;
        private $nome;
        private $cpf;
        private $telefone;
        private $email;
        private $pix;
        private $prejuizo;
        private $valorArrecadado;
        private $endereco;
        private $cidade;
        private $comprovanteResidencia;
        private $situacaoDeEmprego;
        private $userFKPessoa;
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
        public function getIdPessoa(){
            return $this->idPessoa;
        } 
        public function setIdPessoa($idPessoa){
            return $this->idPessoa = $idPessoa;
        }
        public function getNome(){
            return $this->nome;
        } 
        public function setNome($nome){
            return $this->nome = $nome;
        }
        public function getCpf(){
            return $this->cpf;
        } 
        public function setCpf($cpf){
            return $this->cpf = $cpf;
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
        public function getSituacaoDeEmprego(){
            return $this->situacaoDeEmprego;
        } 
        public function setSituacaoDeEmprego($situacaoDeEmprego){
            return $this->situacaoDeEmprego = $situacaoDeEmprego;
        }
        public function getUserFKPessoa(){
            return $this->userFKPessoa;
        } 
        public function setUserFKPessoa($userFKPessoa){
            return $this->userFKPessoa = $userFKPessoa;
        }
        public function __toString(){
            return "idPessoa: " . $this->idPessoa . " nome: " . $this->nome . " cpf: "
                    . $this->cpf . " telefone: " . $this->telefone . " email: " . $this->email .
                    " pix: " . $this->pix . " prejuizo: " . $this->prejuizo . " valorArrecadado: " . $this->valorArrecadado .
                    " endereço: " . $this->endereco . " cidade: " . $this->cidade . " comprovanteResidencia: " . $this->comprovanteResidencia .
                    " situacaoDeEmprego: " . $this->situacaoDeEmprego . " userFKPessoa : " . $this->userFKPessoa . "<br><br>";
        } 
    }
?>