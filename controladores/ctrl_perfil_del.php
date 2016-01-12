<!--
===========================================================================
Controlador para eliminar el perfil de un usuario
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
============================================================================
-->

<?php
session_start();
include_once "../modelo/model_usuario.php";

$idUsuario = $_SESSION['login_usuario'];

$delPerfil = new Usuario();

//Eliminar perfil
if ($delPerfil->eliminar($idUsuario))
    header('Location:../vistas/login.php');
else
    die("Lo sentimos, el usuario ". $idUsuario. " no existe");
?>