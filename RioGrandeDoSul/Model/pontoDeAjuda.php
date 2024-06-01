<?php
    class pontoDeAjuda{
        private $idAjuda;
        private $telefone;
        private $email;
        private $endereco;
        private $cidade;
        private $cpf;
        private $cnpj;
        private $descricao;
        private $userFK;
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
        public function getIdAjuda(){
            return $this->idAjuda;
        } 
        public function setIdAjuda($idAjuda){
            return $this->idAjuda = $idAjuda;
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
        public function getCpf(){
            return $this->cpf;
        } 
        public function setCpf($cpf){
            return $this->cpf = $cpf;
        }
        public function getCnpj(){
            return $this->cnpj;
        } 
        public function setCnpj($cnpj){
            return $this->cnpj = $cnpj;
        }
        public function getDescricao(){
            return $this->descricao;
        } 
        public function setDescricao($descricao){
            return $this->descricao = $descricao;
        }
        public function getUserFK(){
            return $this->userFK;
        } 
        public function setUserFK($userFK){
            return $this->userFK = $userFK;
        }
        public function __toString(){
            return "idAjuda: " . $this->idAjuda . " telefone: " . $this->telefone . " email: "
                    . $this->email . " endereco: " . $this->endereco . " cidade: " . $this->cidade .
                    " cpf: " . $this->cpf . " cnpj: " . $this->cnpj . " descricao: " . $this->descricao .
                    " userFK: " . $this->userFK . "<br><br>";
        } 
    }
?>