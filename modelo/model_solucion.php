<!--
======================================================================
Modelo de la tabla Solucion
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
======================================================================
-->
<?php 
include_once 'connect_DB.php';

class Solucion {
    private $esPropuesta;
    private $equipo;
    private $reto;
    private $titulo;
    private $descripcion;
    private $video;
    private $documento;
    private $repositorio;
    
    public function __construct($esPropuesta=true, $equipo="", $reto="", $titulo="", $descripcion="", $video="", $documento="", $repositorio="") {
        $this->esPropuesta = $esPropuesta;
        $this->equipo = $equipo;
        $this->reto = $reto;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->video = $video;
        $this->documento = $documento;
        $this->repositorio = $repositorio;
    }
	
    private function getTitulo ($esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Titulo FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
     private function getDesc ($esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Descripcion FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
     private function getVideo ($esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Video FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
     private function getDocumento ($esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Documento FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
     private function getRepo ($esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Repositorio FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
    //Comprueba si existe
    public function exists ($esP, $equipo, $reto) {
        $db = new Database();
        
        //Comprueba si ya existe esa solucion
        $consulta = 'SELECT * FROM Solucion WHERE EsPropuesta = \''.$esP.'\' AND Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\'';
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
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($esP, $equipo, $reto){
        $titulo = $this->getTitulo($esP, $equipo, $reto);
        $descripcion = $this->getDesc($esP, $equipo, $reto);
        $video = $this->getVideo($esP, $equipo, $reto);
        $documento = $this->getDocumento($esP, $equipo, $reto);
        $repositorio = $this->getRepo($esP, $equipo, $reto);

        //Crear array asoc con los datos de $pk
        $datos = array("esPropuesta" => $esP, "equipo"=>$equipo, "reto"=>$reto, "titulo" => $titulo, "descripcion"=>$descripcion, "video"=>$video, "documento"=>$documento, "repositorio"=>$repositorio,);
        
        return $datos;
    }
    
    public function modificar($objeto){
        $esP = $objeto->esPropuesta;
        $equipo = $objeto->equipo;
        $reto = $objeto->reto;
        if($this->exists($esP, $equipo, $reto)){
            $db = new Database();

            $sqlTitulo = 'UPDATE Solucion SET Titulo =\''. $objeto->titulo . '\' WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sqlTitulo) or die('Error al modificar el titulo');
            
            $sqlDesc = 'UPDATE Solucion SET Descripcion =\''. $objeto->descripcion . '\' WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sqlDesc) or die('Error al modificar la descripcion');
            
            $sqlVideo = 'UPDATE Solucion SET Video =\''. $objeto->video . '\' WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sqlVideo) or die('Error al modificar el video');
            
            $sqlDoc = 'UPDATE Solucion SET Documento =\''. $objeto->documento . '\' WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sqlDoc) or die('Error al modificar el documento');
            
            $sqlRepo = 'UPDATE Solucion SET Repositorio =\''. $objeto->documento . '\' WHERE Equipo_idEquipo = \''.$equipo.'\' AND Reto_idReto = \''.$reto.'\' AND EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sqlRepo) or die('Error al modificar el repositorio');
            
            $db->desconectar();
            return true;
        }else return false;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
//    public function crear($objeto){
//        if ($this->exists($esP, $equipo, $reto) == false) 
//        {
//            $db = new Database();
//            //Inserta la Solucion en la tabla Solucion
//            $insertaSolucion = "INSERT INTO Solucion (Equipo_idEquipo, Reto_idReto, EsPropuesta) VALUES ('$equipo', '$reto', '$esP');";
//
//            $db->consulta($insertaSolucion) or die('Error al crear la Solucion '. $idSolucion);
//            $db->desconectar();
//            return true;
//        } else return false;
//    }
    
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