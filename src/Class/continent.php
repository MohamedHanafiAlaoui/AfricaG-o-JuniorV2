<?php

Class Continent
{
    public $id_continent;
    public $namecontinent;
    public $Nombre_pays;


    public function __construct($id_continent, $namecontinent, $Nombre_pays)
    {
        $this-> id_continent = $id_continent;
        $this-> namecontinent =$namecontinent;
        $this-> Nombre_pays = $Nombre_pays;  
    }
  
}