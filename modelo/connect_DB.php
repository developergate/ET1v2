<?php

/*===========================================================================
Clase de la base de datos, establece la conexion con la base de datos DB_ET1_G5 usando MySQL improved (mysqli)
Creado por: Andrea Sanchez Blanco
Fecha: 24/12/2015
============================================================================
*/

class Database {
    var $conexion;
    
    public function __construct($host="localhost",$user="admin_hackaton",
                                $pass="iu", $db="et1_hackaton"){
        $this->conexion = mysqli_connect($host, $user, $pass, $db);
        
        // Check connection
        if (mysqli_connect_errno())
          {
          echo "Fallo al conectar con la base de datos: " . mysqli_connect_error();
          }
    }
    
    public function consulta($sentencia){
        return mysqli_query($this->conexion,$sentencia);
    }
    
    public function desconectar(){
        $this->conexion->close();
    }
    
    
    public function error(){
        $this->conexion->error;
    }
}

?>



