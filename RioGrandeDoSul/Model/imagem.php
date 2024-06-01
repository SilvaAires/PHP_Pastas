<?php
    class imagem{
        private $idimagem;
        private $descricao;
        private $imagem;
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
        public function getIdimagem(){
            return $this->idimagem;
        } 
        public function setIdimagem($idimagem){
            return $this->idimagem = $idimagem;
        }
        public function getDescricao(){
            return $this->descricao;
        } 
        public function setDescricao($descricao){
            return $this->descricao = $descricao;
        }
        public function getImagem(){
            return $this->imagem;
        } 
        public function setImagem($imagem){
            return $this->imagem = $imagem;
        }
        public function getUserFK(){
            return $this->userFK;
        } 
        public function setUserFK($userFK){
            return $this->userFK = $userFK;
        }
        public function __toString(){
            return "idimagem: " . $this->idimagem . " descricao: " . $this->descricao . " imagem: "
                    . $this->imagem . " userFK: " . $this->userFK . "<br><br>";
        } 
    }
?>