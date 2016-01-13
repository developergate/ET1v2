<!--
======================================================================
Modelo de la tabla Jurado_puntua_Solucion
Creado por: Andrea Sanchez Blanco
Fecha: 13/01/2016
======================================================================
-->
<?php 
include_once 'connect_DB.php';

class Jurado_puntua_Solucion {
    private $usuario;
    private $premio;
    private $esPropuesta;
    private $equipo;
    private $reto;
    private $puntuacion;
    private $tipoPuntuacion;
    
    public function __construct($usuario="", $premio="", $esPropuesta=false, $equipo="", $reto="", $puntuacion="", $tipoPuntuacion="") {
        $this->usuario = $usuario;
        $this->premio = $premio;
        $this->esPropuesta = $esPropuesta;
        $this->equipo = $equipo;
        $this->reto = $reto;
        $this->puntuacion = $puntuacion;
        $this->tipoPuntuacion = $tipoPuntuacion;
    }
	
    private function getPuntuacion ($usuario, $premio, $esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT Puntuacion FROM Jurado_puntua_Solucion WHERE Usuario_idUsuario = \''.$usuario.'\'  AND Premio_idPremio = \''.$premio.'\' AND Solucion_EsPropuesta = \''.$esP.'\' AND Solucion_Equipo_idEquipo = \''.$equipo.'\' AND Solucion_Reto_idReto = \''.$reto.'\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $toret = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $toret;
    }
    
     private function getTipoPuntuacion ($usuario, $premio, $esP, $equipo, $reto){
        $db = new Database();

        $query = 'SELECT TipoPuntuacion FROM Jurado_puntua_Solucion WHERE Usuario_idUsuario = \''.$usuario.'\'  AND Premio_idPremio = \''.$premio.'\' AND Solucion_EsPropuesta = \''.$esP.'\' AND Solucion_Equipo_idEquipo = \''.$equipo.'\' AND Solucion_Reto_idReto = \''.$reto.'\'';
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
    public function exists ($usuario, $premio, $esP, $equipo, $reto) {
        $db = new Database();
        
        //Comprueba si ya existe
        $consulta = 'SELECT * FROM Jurado_puntua_Solucion WHERE Usuario_idUsuario = \''.$usuario.'\'  AND Premio_idPremio = \''.$premio.'\' AND Solucion_EsPropuesta = \''.$esP.'\' AND Solucion_Equipo_idEquipo = \''.$equipo.'\' AND Solucion_Reto_idReto = \''.$reto.'\'';
        $resultado = $db->consulta($consulta) or die('Error al ejecutar la consulta de Jurado_puntua_Solucion');
        
        // Si el numero de filas es 0 significa que no encontro la Jurado_puntua_Solucion
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase Jurado_puntua_Solucion, indicar el tipo de puntuacion para saber si lo es de un usuario jurado sede y jurado nacional
    public function listar($tipoPuntuacion){
        $db = new Database();
        
        $sql = $db->consulta('SELECT * FROM Jurado_puntua_Solucion WHERE TipoPuntuacion = \''.$tipoPuntuacion.'\'');
        $array = array();
        while ($row = mysqli_fetch_assoc($sql)) {
            $array[] = $row;
        }
        
        $db->desconectar();
        return $array;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($usuario, $premio, $esP, $equipo, $reto){
        $puntuacion = $this->getPuntuacion($usuario, $premio, $esP, $equipo, $reto);
        $tipoPuntuacion = $this->getTipoPuntuacion($usuario, $premio, $esP, $equipo, $reto);

        //Crear array asoc con los datos
        $datos = array("usuario"=>$usuario, "premio"=>$premio, "Solucion_EsPropuesta" => $esP, "equipo"=>$equipo, "reto"=>$reto, "puntuacion" => $puntuacion, "tipoPuntuacion"=>$tipoPuntuacion);
        
        return $datos;
    }
    
    //Modifica la puntuacion
    public function modificar($objeto){
        $usuario = $objeto->usuario;
        $premio = $objeto->premio;
        $esP = $objeto->esPropuesta;
        $equipo = $objeto->equipo;
        $reto = $objeto->reto;
        
        if($this->exists($usuario, $premio, $esP, $equipo, $reto)){
            $db = new Database();

            $sql = 'UPDATE Jurado_puntua_Solucion SET Puntuacion =\''. $objeto->puntuacion . '\' WHERE Usuario_idUsuario = \''.$usuario.'\' AND Premio_idPremio = \''.$premio.'\' AND Solucion_Equipo_idEquipo = \''.$equipo.'\' AND Solucion_Reto_idReto = \''.$reto.'\' AND Solucion_EsPropuesta = \''.$esP.'\'' ;
            $db->consulta($sql) or die('Error al modificar la puntuacion');
            
            $db->desconectar();
            return true;
        }else return false;
    }
    
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        $usuario = $objeto->usuario;
        $premio = $objeto->premio;
        $esP = $objeto->esPropuesta;
        $equipo = $objeto->equipo;
        $reto = $objeto->reto;
        if ($this->exists($usuario, $premio, $esP, $equipo, $reto) == false) 
        {
            $db = new Database();
            //Insertar
            $inserta = "INSERT INTO Jurado_puntua_Solucion (Usuario_idUsuario, Premio_idPremio, Solucion_EsPropuesta, Solucion_Equipo_idEquipo, Solucion_Reto_idReto, Puntuacion, TipoPuntuacion) VALUES ('$usuario', '$premio', '$esP', '$equipo', '$reto', '$objeto->puntuacion', '$objeto->tipoPuntuacion');";

            $db->consulta($inserta) or die('Error al crear la votacion.');
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Devuelve todas las soluciones puntuadas de una sede
    private function solucionesSede($idSede){
        
    }
    
    //Devuelve un array con las soluciones ganadoras de cada sede para un premio
    public function solucionesSedes($idPremio){
        $db = new Database();
        include_once '../../modelo/model_solucion.php';
        $solucion = new Solucion();
        include_once '../../modelo/model_usuario.php';
        $usuario = new Usuario();
        include_once '../../modelo/model_sede.php';
        $sede = new Sede();
        $sedes = $sede->listar();
        
        $result = $db->consulta('SELECT * FROM Jurado_puntua_Solucion WHERE Premio_idPremio = \''.$idPremio.'\' AND TipoPuntuacion = s');
        $array = array();
        while ($row = mysqli_fetch_assoc($result)) {
            foreach($sedes as $s){
                $row['Solucion_Equipo_idEquipo'];
                if(){
                    $array[$s['idSede']] = $row;
                }
            }
        }
        
        $db->desconectar();
        return $arraySol;
    }
}
?>