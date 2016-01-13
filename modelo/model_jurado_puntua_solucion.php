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
    
    //Devuelve todas las soluciones votadas de una sede en un premio
    private function votacionesSede($idSede, $idPremio){
        $db = new Database();
        include_once '../../modelo/model_usuario.php';
        $usuario = new Usuario();
        
        //Lista de toda la tabla Jurado_puntua_Solucion
        $result = $db->consulta('SELECT * FROM Jurado_puntua_Solucion WHERE Premio_idPremio = \''. $idPremio .'\' AND TipoPuntuacion = "s"');
        $arrayVotos = array();
        
        //Recorrer todas las votaciones, para seleccionar solo las pertenezcan a $idSede
        while ($voto = mysqli_fetch_assoc($result)){
            $equipo = $voto['Solucion_Equipo_idEquipo']; //equipo que subio la solucion puntuada
            //Obtener la sede de cualquier usuario que pertenezca al equipo
            $sede = $usuario->getSedeEquipo($equipo);
            
            //Si la sede de la solucion es la misma que $idSede, guardarla en el array
            if($sede == $idSede){
                $arrayVotos[] = $voto;
            }
        }
        
        $db->desconectar();
        return $arrayVotos;
    }
    
    //Dado un array con votaciones de una sede en un premio, devuelve un array con la solucion de la sede ganadora del premio - el array que devuelve la funcion votacionesSede
    private function solucionGanadora($soluciones){
        $puntuacionTotal = array(); //Guarda la suma de las puntuaciones de cada solucion
        /*Recorre cada votacion, y va guardando en $puntuacionTotal la suma de los votos de cada jurado para cada solucion*/
        for ($i = 0; $i < count($soluciones); $i++){
            $equipo = $soluciones[$i]['Solucion_Equipo_idEquipo'];
            $reto = $soluciones[$i]['Solucion_Reto_idReto'];
            $puntuacion = $soluciones[$i]['Puntuacion'];
            
            //Si es una nueva solucion la crea en el array puntuacionTotal, sino, suma la puntuacion
            $nuevaSolucion = true; 
            $max = count($puntuacionTotal)/3; //Entre 3 porque guarda 3 elementos en cada fila, y cuenta todo
            for($j = 0; $j < $max; $j++){
                //echo $puntuacionTotal[$j]['equipo'];
                if(($puntuacionTotal[$j]['equipo'] == $equipo) && ($puntuacionTotal[$j]['reto'] == $reto)){
                    $puntuacionTotal[$j]['puntuacion'] += $puntuacion;
                    $nuevaSolucion = false;
                }
            }
            if($nuevaSolucion == true){
                $puntuacionTotal[$max]['equipo'] = $equipo;
                $puntuacionTotal[$max]['reto'] = $reto;
                $puntuacionTotal[$max]['puntuacion'] = $puntuacion;
            }
        }
        
        $solMasVotada['equipo'] = "";
        $solMasVotada['reto'] = "";
        $solMasVotada['puntuacion'] = 0;
        /*Recorrer $puntuacionTotal para quedarnos con la solucion mas votada*/
        foreach($puntuacionTotal as $pt){
            if($pt['puntuacion'] > $solMasVotada['puntuacion']){
                $solMasVotada['equipo'] = $pt['equipo'];
                $solMasVotada['reto'] = $pt['reto'];
                $solMasVotada['puntuacion'] = $pt['puntuacion'];
            }
        }
        
        return $solMasVotada;
    }
    
    //Devuelve un array con las soluciones ganadoras de cada sede para un premio
    /*Para recorrer el array se debe hace un for ($i=0; $i < count($array); $i++) y dentro seleccionar $array['equipo'], $array['reto'] y $array['puntuacion']*/
    public function ganadorasDeSedes($idPremio){
        $db = new Database();
        include_once '../../modelo/model_sede.php';
        $sede = new Sede();
        $sedes = $sede->listar();
        
        $i = 0;
        $ganadoras = array();
        foreach($sedes as $s){
            $votaciones = $this->votacionesSede($s['idSede'], $idPremio);
            //Si la sede tiene votaciones registradas
            if($votaciones != null){
                $ganadoraSede = $this->solucionGanadora($votaciones);
                $ganadoras[$i] = $ganadoraSede; //Guarda equipo, reto y puntuacion de la solucion ganadora de cada sede
                $i++;   
            }
        }
        
        $db->desconectar();
        return $ganadoras;
    }
}
?>