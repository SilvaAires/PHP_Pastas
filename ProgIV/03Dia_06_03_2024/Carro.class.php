<?php

class Carro{
    private $gh;
    private $rg;
    protected $property;

    public function __construct($property)
    {
        $this->property = $property;
    }

    



    /**
     * Get the value of gh
     */ 
    public function getGh()
    {
        return $this->gh;
    }
}

?>