<?php

class Home
{
  public function __construct() {
    
        try {
            # Conexión a MySQL
            $cn = new PDO("mysql:host=localhost:3306;dbname=nota", "root", "root");
          }
          catch(PDOException $e) {
              echo $e->getMessage();
          }   
   }

    public function Render($datos)
    {
        $cabecera=$this->Cabecera();
        $footer=$this->Footer();
        $main=$this->Main($datos);
        echo $cabecera .$main .$footer;
            
    }
    public function TablaAlumnos($datos)
    {
        $tabla='';
        foreach ($datos as $key ) {
            $tabla=$tabla.'<tr>
                               <td>'.$key->id .'</td>
                               <td>'.$key->Nombre .'</td>
                               <td>'.$key->ApellidoPaterno .'</td>
                               <td>'.$key->ApellidoMaterno .'</td>
                               <td>'.$key->Parcial .'</td>
                               <td>'.$key->Final .'</td>
                               <td><button>Editar</button></td>
                               <td><button>Eliminar</button></td>
                           </tr>';               
        }
     
        return $tabla;
    }


    public function Main($datos)
    {
       $tabla= $this->TablaAlumnos($datos);
        return <<<bodymain
                <main>
                    <div class="container">
                        <h1>Tabla De alumnos</h1>
                        <table>
                            <thead>
                             
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Nota Parcial</th>
                                    <th>Nota Final</th>
                             
                            </thead>
                            <tbody>
                                 $tabla
                            </tbody>
                        </table>
                    </div>
                </main>

        bodymain;
    }

    public function Cabecera()
    {
        return <<<Cabecera
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="css/mystyle.css">
            </head>
            <body>

            Cabecera;
    }
    

    public function Footer()
    {
       return <<<Pie
                        </body>
            </html>
            Pie;

    }
   


}  


?>