<!--
======================================================================
Modelo de la tabla Reto
Creado por: Andrea Sanchez Blanco
Fecha: 07/01/2016
======================================================================
-->
<?php 
include_once 'connect_DB.php';

class Reto {
    private $idReto;
    private $descripcion;
    private $aceptado;
    
    public function __construct($idReto="", $descripcion="", $aceptado=false) {
        $this->idReto = $idReto;
        $this->descripcion = $descripcion;
        $this->aceptado = $aceptado;
    }
	
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe esa sede
        $consulta = 'SELECT * FROM Reto WHERE idReto = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de reto');
        
        // Si el numero de filas es 0 significa que no encontro el usuario
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase Sede
    public function listar(){
        $db = new Database();
        
        $sqlRetos = $db->consulta("SELECT * FROM Reto");
        $arrayRetos = array();
        while ($row = mysqli_fetch_assoc($sqlRetos)) {
            $arrayRetos[] = $row;
        }
        
        $db->desconectar();
        return $arrayRetos;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        if ($objeto->exists($objeto->idReto) == false) 
        {
            $db = new Database();
            //Inserta el reto en la tabla Reto
            $insertaReto = "INSERT INTO Reto (idReto, DescReto, Aceptado) VALUES ('$objeto->idReto', '$objeto->descripcion','$objeto->aceptado');";

            $db->consulta($insertaReto) or die('Error al crear la reto '. $objeto->idReto);
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
			$db = new Database();
			$result = $db->consulta('DELETE FROM Reto WHERE idReto = \'' . $pk . '\'') or die('Error al eliminar el reto');
			$db->desconectar();
			return result;
    }
}
?>