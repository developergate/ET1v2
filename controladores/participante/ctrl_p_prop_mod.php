<!--
===========================================================================
Controlador para modificar una propuesta
Creado por: Andrea Sanchez
Fecha: 12/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_solucion.php";

$equipo = $_POST['equipo'];
$reto = $_POST['reto'];
$esP = $_POST['esP'];
$titulo = $_POST['titulo'];
$desc = $_POST['desc'];
$video = $_POST['video'];
$documento = $_POST['documento'];
$repo = $_POST['repo'];

$modProp = new Solucion($esP, $equipo, $reto, $titulo, $desc, $video, $documento, $repo);

//Modificar la propuesta
if ($modProp->modificar($modProp))
    header('Location:../../vistas/participante/p_menu.php');
else
    die("La propuesta no existe.");
?>