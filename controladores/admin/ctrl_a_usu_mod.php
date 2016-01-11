<!--
===========================================================================
Controlador para modificar un usuario
Creado por: Andrea Sanchez
Fecha: 11/01/2016
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
$idioma = $_POST['idioma'];

$nuevoUsu = new Usuario($idUsuario, $sede, $nombre, $email, $password, $idioma, null, $rol);

//Modificar el usuario
if ($nuevoUsu->modificar($idUsuario, $nuevoUsu))
    header('Location:../../vistas/admin/a_usuarios.php');
else
    die("El usuario ". $idUsuario. " no existe.");
?>