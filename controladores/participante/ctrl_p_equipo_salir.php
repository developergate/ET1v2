<!--
===========================================================================
Controlador para salir de un equipo
Creado por: Andrea Sanchez Blanco
Fecha: 12/01/2016
============================================================================
-->

<?php
session_start();
include_once "../../modelo/model_usuario.php";

$idUsuario = $_SESSION['login_usuario'];
$num = $_POST['num'];

$usu = new Usuario();

//Salir del equipo
$usu->salirEquipo($idUsuario, $num);
header('Location:../../vistas/participante/p_equipos.php');
?>