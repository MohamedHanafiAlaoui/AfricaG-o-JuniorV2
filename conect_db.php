<?php
session_start();

class Controller
{
   protected  $servername = "localhost";
   protected $username = "root";
   protected $password = "";
   protected $dbname = "AfricaV2";
   public $conn;
  
   public function connect()
   {
    $this -> conn=null;
    
    try {
        $this -> conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this ->username, $this ->password);
        
        $this -> conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
      } 
      catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
      }
      return $this->conn;
   }
   
    

}

$db = new Controller();

if($db->connect()){
  echo "connect";
}else{
  echo "pas Connction";
}





