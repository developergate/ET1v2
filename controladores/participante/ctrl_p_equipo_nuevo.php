<!--
===========================================================================
Controlador para crear un nuevo equipo
Creado por: Andrea Sanchez
Fecha: 12/01/2016
============================================================================
-->

<?php
session_start();
include_once "../../modelo/model_equipo.php";

$idEquipo = $_POST['equipo'];
$idUsuario = $_SESSION['login_usuario'];

$nuevoEquipo = new Equipo();

//Crear el equipo
if ($nuevoEquipo->crear($idEquipo, $idUsuario))
    header('Location:../../vistas/participante/p_equipos.php');
else
    die("El equipo ". $idEquipo. " ya existe.");
?>