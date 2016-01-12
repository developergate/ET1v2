<!--
======================================================================
Modelo de la tabla Sede
Creado por: Andrea Sanchez Blanco
Fecha: 07/01/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class Sede {
    private $idSede;
    
    public function __construct($idSede="") {
        $this->idSede = $idSede;
    }
	
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe esa sede
        $consulta = 'SELECT * FROM Sede WHERE idSede = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de sede');
        
        // Si el numero de filas es 0 significa que no encontro la sede
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
        
        $sqlSedes = $db->consulta("SELECT * FROM Sede");
        $arraySedes = array();
        while ($row = mysqli_fetch_assoc($sqlSedes)) {
            $arraySedes[] = $row;
        }
        
        $db->desconectar();
        return $arraySedes;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($pk){
        if ($this->exists($pk) == false) 
        {
            $db = new Database();
            //Inserta la sede en la tabla Sede
            $insertaSede = "INSERT INTO Sede (idSede) VALUES ('$pk');";

            $db->consulta($insertaSede) or die('Error al crear la sede '. $pk);
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
        if($this->exists($pk)){
            $db = new Database();
			$db->consulta('DELETE FROM Sede WHERE idSede = \'' . $pk . '\'') or die('Error al eliminar la sede');
			$db->desconectar();
			return true;   
        }else return false;
    }
}
?>