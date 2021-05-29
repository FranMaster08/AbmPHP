<?php 
     require_once 'teacher.php';
    class TeacherDao 
    {
        private $connection;

        public function __construct($Conn) {
            $this->connection = $Conn;
        }

        public function ListarTeachers()
        {
           $result = array();
            try {
                $sentencia = $this->connection->prepare("SELECT * FROM TEACHER");
                $sentencia->execute();
                foreach($sentencia->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    $teacher=new Teachers();
                    $teacher->id =$r->id_teacher;
                    $teacher->Nombre =$r->nombre;
                    $teacher->ApellidoPaterno =$r->ap_paterno;
                    $teacher->ApellidoMaterno =$r->ap_materno;
                    $teacher->Parcial =$r->ex_parcial;
                    $teacher->Final =$r->ex_final;
                    $result[] = $teacher;
                }
                
                return $result;
            } catch (Throwable $th) {
                throw $th;
            }
          
        
        }
    }
    


?>