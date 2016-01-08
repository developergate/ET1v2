<!--
===========================================================================
Controlador para añadir un nuevo usuario
Creado por: Andrea Sanchez
Fecha: 08/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_usuario.php";

$idUsuario = $_POST['login'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$sede = $_POST['sede'];
$rol = $_POST['rol'];
$password = $_POST['pass'];

$nuevoUsu = new Usuario($idUsuario, $sede, $nombre, $email, $password, "esp", null, $rol);

//Crear el usuario
if ($nuevoUsu->crear($nuevoUsu))
    header('Location:../../vistas/admin/a_usuarios.php');
else
    die("El usuario ". $idUsuario. " ya existe.");
?>