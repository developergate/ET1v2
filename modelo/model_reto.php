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
    
     private function getNombre ($pk){
        $db = new Database();
        
        $query = 'SELECT idReto FROM Reto WHERE idReto = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombre = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $nombre;
    }
	
     private function getDesc ($pk){
        $db = new Database();
        
        $query = 'SELECT DescReto FROM Reto WHERE idReto = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $desc = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $desc;
    }
    
     private function getAceptado ($pk){
        $db = new Database();
        
        $query = 'SELECT Aceptado FROM Reto WHERE idReto = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $aceptado = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $aceptado;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){

        //Obtener el nombre
        $retoNombre = $this->getNombre($pk);
        //Obtener la descripcion
        $retoDesc = $this->getDesc($pk);
        //Obtener si aceptado
        $retoAceptado = $this->getAceptado($pk);
       
        
        //Crear array asoc con los datos de $pk
        $reto = array("idReto"=>$retoNombre, "DescReto"=>$retoDesc, "Aceptado"=>$retoAceptado);
        
        return $reto;
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
    
    //Devuelve un array asociativo de la tabla de la clase Reto
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
    
        //Devuelve un array asociativo de la tabla de la clase Reto si esta aceptado
    public function listarSi(){
        $db = new Database();
        $si = 1;
        $sqlRetos = $db->consulta("SELECT * FROM Reto WHERE Aceptado= '$si';");
        $arrayRetos = array();
        while ($row = mysqli_fetch_assoc($sqlRetos)) {
            $arrayRetos[] = $row;
        }
        
        $db->desconectar();
        return $arrayRetos;
    }
    
        //Devuelve un array asociativo de la tabla de la clase Reto si no esta aceptado
    public function listarNo(){
        $db = new Database();
        $no=0;
        $sqlRetos = $db->consulta("SELECT * FROM Reto WHERE Aceptado= '$no';");
        $arrayRetos = array();
        while ($row = mysqli_fetch_assoc($sqlRetos)) {
            $arrayRetos[] = $row;
        }
        
        $db->desconectar();
        return $arrayRetos;
    }

     //Modifica los datos del objeto con $pk por el administrador, y lo guarda segun los datos de $objeto pasado

    public function modificar ($pk, $objeto) {
        if ($this->exists($pk)){
            $db = new Database();
            $datos = $this->consultar($pk);
            
            

            //Modificar la descripcion
            $oldDesc = $datos['DescReto'];
            $newDesc = $objeto->descripcion;

            if ($oldDesc != $newDesc){
                $sql = 'UPDATE Reto SET DescReto=\''. $newDesc . '\' WHERE idReto = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar la descripcion');
            }
            
            //Modificar la sede
            $oldAceptado = $datos['Aceptado'];
            $newAceptado = $objeto->aceptado;

            if ($oldAceptado != $newAceptado){
                 $sql = 'UPDATE Reto SET Aceptado=\''. $newAceptado . '\' WHERE idReto = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el estado');
            }
            
            //Modificar el nombre
            $oldNombre = $datos['idReto'];
            $newNombre = $objeto->idReto;

            if ($oldNombre != $newNombre){
                $sql = 'UPDATE Reto SET idReto=\''. $newNombre . '\' WHERE idReto = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el nombre');
            }

            $db->desconectar();
            return true;
        }else {
            return false;
        }
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