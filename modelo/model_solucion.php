<!--
======================================================================
Modelo de la tabla Solucion
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
======================================================================
-->
<?php 
include_once 'interface.php';

class Solucion {
    private $idSolucion;
    private $equipo;
    private $reto;
    private $descripcion;
    private $video;
    private $documento;
    private $repositorio;
    private $esPropuesta;
    
    public function __construct($idSolucion="", $equipo="", $reto="", $descripcion="", $video="", $documento="", $repositorio="", $esPropuesta=true) {
        $this->idSolucion = $idSolucion;
        $this->equipo = $equipo;
        $this->reto = $reto;
        $this->descripcion = $descripcion;
        $this->video = $video;
        $this->documento = $documento;
        $this->repositorio = $repositorio;
        $this->esPropuesta = $esPropuesta;
    }
	
    //Comprueba si existe
    public function exists ($idSolucion, $equipo, $reto, $esP) {
        $db = new Database();
        
        //Comprueba si ya existe esa solucion
        $consulta = 'SELECT * FROM Solucion WHERE idSolucion = \''.$idSolucion.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de solucion');
        
        // Si el numero de filas es 0 significa que no encontro la solucion
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase Solucion
    public function listar($esP){
        $db = new Database();
        
        $sqlSol = $db->consulta('SELECT * FROM Solucion WHERE EsPropuesta = \''.$esP.'\'');
        $arraySol = array();
        while ($row = mysqli_fetch_assoc($sqlSol)) {
            $arraySol[] = $row;
        }
        
        $db->desconectar();
        return $arraySol;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($idSolucion, $equipo, $reto, $esP){
        if ($this->exists($idSolucion, $equipo, $reto, $esP) == false) 
        {
            $db = new Database();
            //Inserta la Solucion en la tabla Solucion
            $insertaSolucion = "INSERT INTO Solucion (idSolucion, Equipo_idEquipo, Reto_idReto, EsPropuesta) VALUES ('$idSolucion', '$equipo', '$reto', '$esP');";

            $db->consulta($insertaSolucion) or die('Error al crear la Solucion '. $idSolucion);
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina la solucion o propuesta
    public function eliminar($idSolucion, $equipo, $reto, $esP){
        if($this->exists($idSolucion, $equipo, $reto, $esP)){
            $db = new Database();
			$db->consulta('DELETE FROM Solucion WHERE idSolucion = \'' . $idSolucion . '\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'') or die('Error al eliminar la Solucion');
			$db->desconectar();
			return true;   
        }else return false;
    }
    
        //Comprueba si el equipo subió una solucion o propuesta
    public function subieronSol ($equipo, $reto, $esP) {
        $db = new Database();
        
        $consulta = 'SELECT * FROM Solucion WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de solucion');
        
        // Si el numero de filas es 0 significa que no encontro la solucion
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
}
?>