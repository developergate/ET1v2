<!--
===========================================================================
Controlador para modificar una propuesta y una solucion
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

date_default_timezone_set('Europe/Madrid');
$date = date('Y-m-d', time());

$mod = new Solucion($esP, $equipo, $reto, $titulo, $desc, $video, $documento, $repo, $date);

//Modificar la propuesta o solucion
if ($mod->modificar($mod))
    header('Location:../../vistas/participante/p_menu.php');
else
    die("No existe.");
?>