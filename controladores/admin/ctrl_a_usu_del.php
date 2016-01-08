<!--
===========================================================================
Controlador para eliminar un usuario
Creado por: Andrea Sanchez
Fecha: 08/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_usuario.php";

$idUsuario = $_POST['usuario'];

$delUsuario = new Usuario();

//Eliminar el usuario
if ($delUsuario->eliminar($idUsuario))
    header('Location:../../vistas/admin/a_usuarios.php');
else
    die("El usuario ". $idUsuario. " no existe.");
?>