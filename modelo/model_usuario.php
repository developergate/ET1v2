<!--
======================================================================
Modelo de la tabla Usuario
Creado por: Edgard Ruiz, Andrea Sanchez Blanco
Fecha: 29/12/2015
======================================================================
-->
<?php 
include_once 'interface.php';

class Usuario {
	
    private $idUsuario;
    private $sede;
    private $nombre;
    private $email;
    private $password;
    private $idioma;
    private $equipo;
    private $rol;
    
    public function __construct($idUsuario="", $sede="", $nombre="", $email="", $password="", $idioma="esp", $equipo=null, $rol="participante") {
        $this->idUsuario = $idUsuario;
        $this->sede = $sede;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->idioma = $idioma;
        $this->equipo = $equipo;
        $this->rol = $rol;
    }
    
    private function getSede ($pk){
        $db = new Database();

        $query = 'SELECT Sede_idSede FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $sede = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $sede;
    }
    
    private function getNombre ($pk){
        $db = new Database();
        
        $query = 'SELECT Nombre FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $nombre = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $nombre;
    }

    private function getEmail ($pk){
        $db = new Database();
        
        $query = 'SELECT Email FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $email = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $email;
    }
    
    private function getIdioma ($pk){
        $db = new Database();

        $query = 'SELECT Idioma FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $idioma = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $idioma;
    }
    
    private function getRol ($pk){
        $db = new Database();
        
        $query = 'SELECT Rol FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $rol = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $rol;
    }
    
    private function getEquipo ($pk){
        $db = new Database();
        
        $query = 'SELECT Equipo_idEquipo FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $equipo = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $equipo;
    }
    
    public function getPassword ($pk){
        $db = new Database();
        
        $query = 'SELECT Password FROM Usuario WHERE idUsuario = \'' . $pk .  '\'';
        $result = $db->consulta($query);

        /* array numérico */
        $row = $result->fetch_array(MYSQLI_NUM);
        $pass = $row[0];

        /* liberar la serie de resultados */
        $result->free();
        $db->desconectar();
        
        return $pass;
    }

    //Devuelve true o false si realizo el cambio correctamente o no
    private function setPassword($newPass, $pk){
      //Si oldPass coincide con la de la de $pk en la BD, hace UPDATE con newPass
			$db = new Database();

            $sql = 'UPDATE Usuario SET Password=\''. $newPass . '\' WHERE idUsuario = \'' . $pk .  '\'' ;
            $db->consulta($sql) or die('Error al modificar la password');
            $db->desconectar();
    }
    
    //Este metodo se llama cada vez que se cambia el idioma en la navBar lateral
	//Devuelve true si se realizo correctamente el cambio de idioma
    public function setIdioma ($newIdioma, $pk){
			$db = new Database();
			$sql = 'UPDATE Usuario SET Idioma = \'' .$newIdioma. '\' WHERE Usuario.idUsuario = \'' .  $pk .  '\'';
			$resultado = $db->consulta($sql) or die('Error al ejecutar la consulta de modificar idioma');
			$db->desconectar();

			return $resultado;
    }
    
    //Comprueba si existe
    public function exists ($pk) {
        $db = new Database();
        
        //Comprueba si ya existe ese usuario
        $consultaUsuario = 'SELECT * FROM Usuario WHERE idUsuario = \'' .  $pk .  '\'';
        $resultado = $db->consulta($consultaUsuario) or die('Error al ejecutar la consulta de usuario');
        
        // Si el numero de filas es 0 significa que no encontro el usuario
        if (mysqli_num_rows($resultado) == 0){
            $db->desconectar();
            return false;
        } else {
            $db->desconectar();
            return true;
        }
    }
    
    //Devuelve un array asociativo de la tabla de la clase
    public function listar(){
        $db = new Database();
        
        $sqlUsuario = $db->consulta("SELECT * FROM Usuario");
        $arrayUsuario = array();
        while ($row_usuario = mysqli_fetch_assoc($sqlUsuario))
            $arrayUsuario[] = $row_usuario;
        
        $db->desconectar();
        return $arrayUsuario;
    }
    
    //Muestra los datos de la $pk indicada. Devuelve una array asociativo
    public function consultar ($pk){
        //Obtener la sede
        $sede = $this->getSede($pk);
        //Obtener el nombre
        $usuNombre = $this->getNombre($pk);
        //Obtener el email
        $usuEmail = $this->getEmail($pk);
        //Obtener contraseña
        $usuPass = $this->getPassword($pk);
        //Obtener el idioma
        $idioma = $this->getIdioma($pk);
        //Obtener el equipo
        $equipo = $this->getEquipo($pk);
        //Obtener tipo de usuario
        $rol = $this->getRol($pk);
        
        //Crear array asoc con los datos de $pk
        $usuario = array("idUsuario"=>$pk, "sede"=>$sede, "nombre"=>$usuNombre, "email"=>$usuEmail, "password"=>$usuPass, "idioma"=>$idioma, "equipo"=>$equipo, "rol" => $rol);
        
        return $usuario;
    }
    
    //Modifica los datos del objeto con $pk por el administrador, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el idUsuario en la BD
    public function modificar ($pk, $objeto) {
        if ($this->exists($pk)){
            $db = new Database();
            $datos = $this->consultar($pk);
            
            //Modificar el nombre
            $oldNombre = $datos['nombre'];
            $newNombre = $objeto->nombre;

            if ($oldNombre != $newNombre){
                $sql = 'UPDATE Usuario SET Nombre=\''. $newNombre . '\' WHERE idUsuario = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el nombre');
            }

            //Modificar el email
            $oldEmail = $datos['email'];
            $newEmail = $objeto->email;

            if ($oldEmail != $newEmail){
                $sql = 'UPDATE Usuario SET Email=\''. $newEmail . '\' WHERE idUsuario = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar el email');
            }
            
            //Modificar la sede
            $oldSede = $datos['sede'];
            $newSede = $objeto->sede;

            if ($oldSede != $newSede){
                $sql = 'UPDATE Usuario SET Sede_idSede=\''. $newSede . '\' WHERE idUsuario = \'' . $pk .  '\'' ;

                $db->consulta($sql) or die('Error al modificar la sede');
            }

            //Modificar el rol
            $newRol = $objeto->rol;
            $sqlRol = 'UPDATE Usuario SET Rol=\''. $newRol . '\' WHERE idUsuario = \'' . $pk .  '\'' ;
            $db->consulta($sqlRol) or die('Error al modificar el rol');
            
            //Modificar el idioma
            $idioma = $objeto->idioma;
            $sqlIdioma = 'UPDATE Usuario SET Idioma=\''. $idioma . '\' WHERE idUsuario = \'' . $pk .  '\'' ;
            $db->consulta($sqlIdioma) or die('Error al modificar el idioma');

            //Modificar la contraseña
            $oldPass = $this->getPassword($pk);
            $newPass = $objeto->password;
            //Si la nueva contraseña es diferente y no es la cadena vacia en md5
            if (($oldPass != $newPass) && ($newPass != "d41d8cd98f00b204e9800998ecf8427e")){
                 $result = $this->setPassword($newPass, $pk);
            }

            $db->desconectar();
            return true;
        }else {
            return false;
        }
    }
    
    //Modifica los datos del objeto con $pk para el perfil, y lo guarda segun los datos de $objeto pasado
    //No se modifica la primary key, que es el login, el idUsuario en la BD
    public function modificar_perfil ($pk, $objeto, $newPass) {
        if ($this->exists($pk)){
            //Obtener la contraseña del usuario
            $pass = $this->getPassword($pk);
            //Si las contraseñas coinciden, puede modificar el perfil
            if($pass == $objeto->password){
                $db = new Database();
                $datos = $this->consultar($pk);

                //Modificar el nombre
                $oldNombre = $datos['nombre'];
                $newNombre = $objeto->nombre;

                if ($oldNombre != $newNombre){
                    $sql = 'UPDATE Usuario SET Nombre=\''. $newNombre . '\' WHERE idUsuario = \'' . $pk .  '\'' ;

                    $db->consulta($sql) or die('Error al modificar el nombre');
                }

                //Modificar el email
                $oldEmail = $datos['email'];
                $newEmail = $objeto->email;

                if ($oldEmail != $newEmail){
                    $sql = 'UPDATE Usuario SET Email=\''. $newEmail . '\' WHERE idUsuario = \'' . $pk .  '\'' ;

                    $db->consulta($sql) or die('Error al modificar el email');
                }
                
                //Modificar el idioma
                $idioma = $objeto->idioma;
                $sqlIdioma = 'UPDATE Usuario SET Idioma=\''. $idioma . '\' WHERE idUsuario = \'' . $pk .  '\'' ;
                $db->consulta($sqlIdioma) or die('Error al modificar el idioma');
                
                //Modificar la contraseña
                //Si la nueva contraseña es diferente y no es la cadena vacia en md5
                if (($pass != $newPass) && ($newPass != "d41d8cd98f00b204e9800998ecf8427e")){
                     $result = $this->setPassword($newPass, $pk);
                }

                $db->desconectar();
                return true;
            } else die("La contraseña del usuario es incorrecta, no puede modificar los datos.");
        }else {
            return false;
        }
    }
	
    //Crea el objeto pasado en la tabla de la base de datos, si devuelve fue bien devuelve true
    public function crear($objeto){
        if ($objeto->exists($objeto->idUsuario) == false) 
        {
            $db = new Database();
            //Inserta el usuario en la tabla usuario
            $insertaUsu = "INSERT INTO Usuario (idUsuario, Sede_idSede, Nombre, Password, Email, Rol) VALUES ('$objeto->idUsuario', '$objeto->sede', '$objeto->nombre', '$objeto->password', '$objeto->email', '$objeto->rol');";

            $db->consulta($insertaUsu) or die('Error al crear el Usuario');
            $db->desconectar();
            return true;
        } else return false;
    }
    
    //Elimina de la base de datos segun la primary key pasada
    public function eliminar($pk){
        if($this->exists($pk)){
            $db = new Database();
			$db->consulta('DELETE FROM Usuario WHERE idUsuario = \'' .  $pk .  '\'') or die('Error al eliminar el usuario');
			$db->desconectar();
			return true;
        } else return false;
    }
}
?>