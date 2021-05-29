<?php

class Conexion
{
    public $Conn;
    public function __construct() {
    
        try {
            # Conexión a MySQL
            $this->Conn = new PDO("mysql:host=localhost:3306;dbname=nota", "root", "root");
            echo 'Conexion establecida..';
          }
          catch(PDOException $e) {
              echo $e->getMessage();
          }   
   }

}  


?>