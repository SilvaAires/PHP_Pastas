<?php
    class redeDeComunicacao{
        private $idRede;
        private $facebook;
        private $twitter;
        private $linkedin;
        private $whatsApp;
        private $site;
        private $portifolio;
        private $userFKRede;
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
        public function getIdRede(){
            return $this->idRede;
        } 
        public function setIdRede($idRede){
            return $this->idRede = $idRede;
        }
        public function getFacebook(){
            return $this->facebook;
        } 
        public function setFacebook($facebook){
            return $this->facebook = $facebook;
        }
        public function getTwitter(){
            return $this->twitter;
        } 
        public function setTwitter($twitter){
            return $this->twitter = $twitter;
        }
        public function getLinkedin(){
            return $this->linkedin;
        } 
        public function setLinkedin($linkedin){
            return $this->linkedin = $linkedin;
        }
        public function getWhatsApp(){
            return $this->whatsApp;
        } 
        public function setWhatsApp($whatsApp){
            return $this->whatsApp = $whatsApp;
        }
        public function getSite(){
            return $this->site;
        } 
        public function setSite($site){
            return $this->site = $site;
        }
        public function getPortifolio(){
            return $this->portifolio;
        } 
        public function setPortifolio($portifolio){
            return $this->portifolio = $portifolio;
        }
        public function getUserFKRede(){
            return $this->userFKRede;
        } 
        public function setUserFKRede($userFKRede){
            return $this->userFKRede = $userFKRede;
        }
        public function __toString(){
            return "idRede: " . $this->idRede . " facebook: " . $this->facebook . " twitter: "
                    . $this->twitter . " linkedin: " . $this->linkedin . " whatsApp: " . $this->whatsApp .
                    " site: " . $this->site . " portifolio: " . $this->portifolio .
                    " userFKRede: " . $this->userFKRede . "<br><br>";
        } 
    }
?>