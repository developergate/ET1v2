<!--
===========================================================================
Controlador para crear un premio
Creado por: David Ansia, Andrea Sanchez
Fecha: 14/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premio.php";

$idPremio = $_POST['nombre'];
$descPremio = $_POST['descripcion'];
$fe = $_POST['fe'];
$fjs = $_POST['fjs'];
$sede = $_POST['sede'];

// Fecha actual
date_default_timezone_set('Europe/Madrid');
$date = date('Y-m-d', time());

$nuevoPremio = new Premio($idPremio, $sede, $descPremio, $fe, $fjs, null, $tipo='s', $solEsPropuesta="", $solEquipo="", $solReto="");

//Crea el premio
if ($nuevoPremio->crear($nuevoPremio, $date))
    header('Location:../../vistas/admin/a_ps.php');
else
    die("El premio ". $idPremio. " ya existe.");
?>