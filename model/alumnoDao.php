<?php 
     require_once 'alumnos.php';
    class AlumnoDao 
    {
        private $connection;

        public function __construct($Conn) {
            $this->connection = $Conn;
        }

        public function ListarAlumnos()
        {
           $result = array();
            try {
                $sentencia = $this->connection->prepare("SELECT * FROM ALUMNO");
                $sentencia->execute();
                foreach($sentencia->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $alumno=new Alumnos();
                    $alumno->id =$r->id_alumno;
                    $alumno->Nombre =$r->nombre;
                    $alumno->ApellidoPaterno =$r->ap_paterno;
                    $alumno->ApellidoMaterno =$r->ap_materno;
                    $alumno->Parcial =$r->ex_parcial;
                    $alumno->Final =$r->ex_final;
                    $result[] = $alumno;
                }
                
                return $result;
            } catch (Throwable $th) {
                throw $th;
            }
          
        
        }
    }
    


?>