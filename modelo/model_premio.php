<!--
======================================================================
Modelo de la tabla Premio
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
======================================================================
-->
<?php 
include_once 'connect_DB.php';

class Premio {
    private $idPremio;
    private $sede;
    private $descripcion;
    //Fechas limite para entregar
    private $fechaEquipos;
    private $fechaJuradoS;
    private $fechaJuradoN;
    //Si es un premio nacional o de sede
    private $tipo;
    //Solucion ganadora
    private $solEsPropuesta;
    private $solEquipo;
    private $solReto;
    
    public function __construct($idPremio="", $sede="", $descripcion="", $fechaEquipos="", $fechaJuradoS="", $fechaJuradoN="", $tipo="n", $solEsPropuesta=false, $solEquipo="", $solReto="") {
        $this->idPremio = $idPremio;
        $this->sede = $sede;
        $this->descripcion = $descripcion;
        $this->fechaEquipos = $fechaEquipos;
        $this->fechaJuradoS = $fechaJuradoS;
        $this->fechaJuradoN = $fechaJuradoN;
        $this->tipo = $tipo;
        $this->solEsPropuesta = $solEsPropuesta;
        $this->solEquipo = $solEquipo;
        $this->solReto = $solReto;
    }
	
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe ese Premio
        $consulta = 'SELECT * FROM Premio WHERE idPremio = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de Premio');
        
        // Si el numero de filas es 0 significa que no encontro el Premio
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase Premio. Indicar premio sede o nacional
    public function listar($tipo){
        $db = new Database();
        
        $sqlPremios = $db->consulta('SELECT * FROM Premio WHERE TipoPremio= \'' . $tipo . '\'');
        $arrayPremios = array();
        while ($row = mysqli_fetch_assoc($sqlPremios)) {
            $arrayPremios[] = $row;
        }
        
        $db->desconectar();
        return $arrayPremios;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        if ($this->exists($objeto->idPremio) == false) 
        {
            $db = new Database();
            //Inserta la Premio en la tabla Premio
            $insertaPremio = "INSERT INTO Premio (idPremio) VALUES ('$objeto->idPremio');";

            $db->consulta($insertaPremio) or die('Error al crear la Premio '. $objeto->idPremio);
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
        if($this->exists($pk)){
            $db = new Database();
			$db->consulta('DELETE FROM Premio WHERE idPremio = \'' . $pk . '\'') or die('Error al eliminar el Premio');
			$db->desconectar();
			return true;   
        }else return false;
    }
}
?>