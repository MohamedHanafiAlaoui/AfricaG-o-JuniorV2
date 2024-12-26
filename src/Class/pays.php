<?php

Class Pays
{
    public $id_pays;
    public $namepays;
    public $populationpays;
    public $languespays;
    public $descriptionpays;
    public $id_continent;
    public $Imagepays;

    public function __construct($id_pays, $namepays, $populationpays, $languespays, $descriptionpays, $id_continent, $Imagepays)
    {
        $this-> id_pays = $id_pays;
        $this-> namepays =$namepays;
        $this-> populationpays = $populationpays;
        $this-> languespays = $languespays;
        $this-> descriptionpays = $descriptionpays;
        $this-> id_continent=$id_continent;
        $this-> Imagepays = $Imagepays;     
    }
  
}