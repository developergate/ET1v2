<!--
======================================================================
Modelo de la tabla Equipo
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
======================================================================
-->
<?php 
include_once 'connect_DB.php';

class Equipo {
    private $idEquipo;
    
    public function __construct($idEquipo="") {
        $this->idEquipo = $idEquipo;
    }
	
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe esa sede
        $consulta = 'SELECT * FROM Equipo WHERE idEquipo = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de equipo');
        
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
        
        $sqlEquipos = $db->consulta("SELECT * FROM Equipo");
        $arrayEquipos = array();
        while ($row = mysqli_fetch_assoc($sqlEquipos)) {
            $arrayEquipos[] = $row;
        }
        
        $db->desconectar();
        return $arrayEquipos;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($pk, $idUsuario){
        if ($this->exists($pk) == false) 
        {
            $db = new Database();
            //Inserta el equipo en la tabla Equipo
            $insertaEquipo = "INSERT INTO Equipo (idEquipo) VALUES ('$pk');";
            $db->consulta($insertaEquipo) or die('Error al crear el equipo '. $pk);
            
            //Añadir al usuario al equipo que crea
            $sql = 'UPDATE Usuario SET Equipo_idEquipo= \''. $pk .'\' WHERE idUsuario = \'' . $idUsuario .  '\'' ;
            $db->consulta($sql) or die('Error al añadir del equipo al usuario');
            
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
        if($this->exists($pk)){
            $db = new Database();
			$db->consulta('DELETE FROM Equipo WHERE idEquipo = \'' . $pk . '\'') or die('Error al eliminar el equipo');
			$db->desconectar();
			return true;   
        }else return false;
    }
}
?>