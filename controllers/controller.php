<?php
require_once './model/alumnos.php';
require_once './model/conexion.php';
require_once './model/alumnos.php';
require_once './model/alumnoDao.php';
require_once './views/home.php';
 class Control{
    public function __construct(){
   
    }
    public function index(){ 
        $conection=new Conexion();
        $alumnosDao=new AlumnoDao($conection->Conn);
        $resultados= $alumnosDao->ListarAlumnos();
        $home=new Home();
        $home->Render($resultados);
    }
}
?>