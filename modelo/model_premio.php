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
	
    private function getSede ($idPremio){
        $db = new Database();

        $query = 'SELECT Sede_idSede FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    private function getDescripcion ($idPremio){
        $db = new Database();

        $query = 'SELECT Descripcion FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    private function getFechaEquipos ($idPremio){
        $db = new Database();

        $query = 'SELECT FechaEquipos FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    private function getFechaJuradoS ($idPremio){
        $db = new Database();

        $query = 'SELECT FechaJuradoS FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    private function getFechaJuradoN ($idPremio){
        $db = new Database();

        $query = 'SELECT FechaJuradoN FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    private function getTipoPremio ($idPremio){
        $db = new Database();

        $query = 'SELECT TipoPremio FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    //Devuelve un array asociativo con los datos de la solucion ganadora
    private function getGanador ($idPremio){
        $db = new Database();

        $query = 'SELECT Solucion_EsPropuesta, Solucion_Equipo_idEquipo, Solucion_Reto_idReto FROM Premio WHERE idPremio = \''.$idPremio.'\'';
        $result = $db->consulta($query);

        $ganador = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $ganador[] = $row;
        }
        
        $db->desconectar();
        return $ganador;
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
    
    public function consultar ($premio){
        $sede = $this->getSede($premio);
        $desc = $this->getDescripcion($premio);
        $fe = $this->getFechaEquipos($premio);
        $fs = $this->getFechaJuradoS($premio);
        $fn = $this->getFechaJuradoN($premio);
        $tipo = $this->getTipoPremio($premio);
        $ganador = $this->getGanador($premio);

        //Crear array asoc con los datos
        $datos = array("premio"=>$premio, "sede"=>$sede, "descripcion" => $desc, "fechaEquipos"=>$fe, "fechaJuradoS"=>$fs, "fechaJuradoN" => $fn, "tipo"=>$tipo, "solEsPropuesta"=>$ganador[0]['Solucion_EsPropuesta'], "solEquipo"=>$ganador[0]['Solucion_Equipo_idEquipo'], "solReto"=>$ganador[0]['Solucion_Reto_idReto']);
        
        return $datos;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto, $fechaActual){
        if ($this->exists($objeto->idPremio) == false) 
        {            
            //Crear un premio sede
            if($objeto->tipo == 's'){
                //Comprobar que las fechas son validas
                if(($objeto->fechaJuradoS >= $fechaActual) 
                   && ($objeto->fechaEquipos >= $fechaActual) 
                   && ($objeto->fechaEquipos <= $objeto->fechaJuradoS)){
                    $db = new Database();
                
                    //Inserta la Premio en la tabla Premio
                    $insertaPremio = "INSERT INTO Premio (idPremio, Sede_idSede, Descripcion, FechaEquipos, FechaJuradoS, TipoPremio) VALUES ('$objeto->idPremio', '$objeto->sede', '$objeto->descripcion', '$objeto->fechaEquipos', '$objeto->fechaJuradoS', '$objeto->tipo');";

                    $db->consulta($insertaPremio) or die('Error al crear el premio '. $objeto->idPremio);
                    $db->desconectar();
                    return true;
                } else die("Por favor, comprueba que las fechas sean correctas y coherentes");
            }
            //Crear un premio nacional
            else {
                //Comprobar que las fechas son validas
                if(($objeto->fechaJuradoN >= $fechaActual) 
                    && ($objeto->fechaEquipos >= $fechaActual) 
                    && ($objeto->fechaJuradoS >= $fechaActual) 
                   && ($objeto->fechaJuradoS <= $objeto->fechaJuradoN) 
                   &&($objeto->fechaEquipos <= $objeto->fechaJuradoS)){
                    $db = new Database();
                
                    //Inserta la Premio en la tabla Premio
                    $insertaPremio = "INSERT INTO Premio (idPremio, Descripcion, FechaEquipos, FechaJuradoS, FechaJuradoN, TipoPremio) VALUES ('$objeto->idPremio', '$objeto->descripcion', '$objeto->fechaEquipos', '$objeto->fechaJuradoS', '$objeto->fechaJuradoN', '$objeto->tipo');";

                    $db->consulta($insertaPremio) or die('Error al crear el premio '. $objeto->idPremio);
                    $db->desconectar();
                    return true;
                }else die("Por favor, comprueba que las fechas sean correctas y coherentes");
            }
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