<!--
===========================================================================
Controlador para añadir un usuario a un equipo
Creado por: Andrea Sanchez
Fecha: 12/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_usuario.php";

$idEquipo = $_POST['equipo'];
$idSede = $_POST['sede'];
$idUsuario = $_POST['usuario'];

$usu = new Usuario();

if ($usu->addUsuEquipo($idUsuario, $idEquipo, $idSede))
    header('Location:../../vistas/participante/p_equipos.php');
else
    die("El usuario ". $idUsuario. " no existe.");
?>