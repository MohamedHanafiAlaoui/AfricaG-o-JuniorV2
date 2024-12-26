<?php
include_once __DIR__ . './conect_db.php';

Class Ville
{
    private $db;


    public function __construct($db)
    {

        $this -> db =$db;

    }
    
    
}