<!--
===========================================================================
Controlador para procesar un nuevo registro
Creado por: Edgard Ruiz  Gonzalez
Fecha: 15/12/2015
============================================================================
-->

<?php
    //incluimos las funciones de conexion para tener la conexion a la bd
    include '../modelo/model_usuario.php';
    //Recogemos las variables que vienen por POST desde el formulario
    $login= $_POST['login'];
    $sede= $_POST['sede'];
    $nombre= $_POST['nombre'];
    $pass= $_POST['pass'];
    $email= $_POST['email'];
    $language = $_POST['language'];

		$usu = new Usuario();

    // Si no devuelve ninguna fila no encontro el login
    if (!$usu->exists($login)) 
{
    // insertamos el usuario en la bd
		$newUsu = new Usuario($login, $sede, $nombre, $pass, $email, $language);
		if ($usu->crear($newUsu)){
			echo 'El Login <b>' . $login . '</b> ha sido registrado en el sistema' . '<BR>';
    	header('Location:../vistas/login.php');
		}else {
			echo 'El Login <b>' . $login . '</b> NO ha sido registrado correctamente en el sistema' . '<BR>';
			echo '<a href=\'../vistas/login.php\'>Volver al login</a><BR>';
		}
}
// devuelve una fila por lo tanto encontro ese login
else
{
    echo 'El usuario <b>' . $login . '</b> ya existe en la bd <BR>';
    echo '<a href=\'../vistas/registro.php\'>Volver al registro</a><BR>';
}

?>
