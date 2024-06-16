<?php
    class imagem{
        private $idimagem;
        private $descricao;
        private $caminho;
        private $userFK;
        private $data_upload;
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
        public function getCaminho(){
            return $this->caminho;
        } 
        public function setCaminho($caminho){
            return $this->caminho = $caminho;
        }
        public function getUserFK(){
            return $this->userFK;
        } 
        public function setUserFK($userFK){
            return $this->userFK = $userFK;
        }
        public function getData_upload(){
            return $this->data_upload;
        } 
        public function setData_upload($data_upload){
            return $this->data_upload = $data_upload;
        }
        public function __toString(){
            return "idimagem: " . $this->idimagem . " descricao: " . $this->descricao . " caminho: "
                    . $this->caminho . " userFK: " . $this->userFK . " data_upload: " . $this->data_upload . "<br><br>";
        } 
    }
?>