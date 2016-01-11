<!--
===========================================================================
Controlador para modificar el perfil de un usuario
Creado por: Andrea Sanchez Blanco
Fecha: 11/01/2016
============================================================================
-->

<?php
session_start();
include_once "../modelo/model_usuario.php";

$idUsuario = $_POST['login'];
$sede = $_POST['sede'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$oldPass = $_POST['oldPass'];
$newPass = $_POST['newPass'];
$idioma = $_POST['idioma'];

$modPerfil = new Usuario($idUsuario, $sede, $nombre, $email, $oldPass, $idioma, null, null);

//Modificar perfil
if ($modPerfil->modificar($idUsuario, $modPerfil, $newPass))
    header('Location:../vistas/admin/a_menu.php');
else
    die("Lo sentimos, el usuario ". $idUsuario. " no existe");
?>