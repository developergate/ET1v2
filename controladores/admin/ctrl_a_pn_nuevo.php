<!--
===========================================================================
Controlador para crear un premio
Creado por: Andrea Sanchez
Fecha: 17/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premio.php";

$idPremio = $_POST['nombre'];
$descPremio = $_POST['descripcion'];
$fe = $_POST['fe'];
$fjs = $_POST['fjs'];
$fjn = $_POST['fjn'];

// Fecha actual
date_default_timezone_set('Europe/Madrid');
$date = date('Y-m-d', time());

$nuevoPremio = new Premio($idPremio, null, $descPremio, $fe, $fjs, $fjn, $tipo='n', $solEsPropuesta="", $solEquipo="", $solReto="");

//Crea el premio
if ($nuevoPremio->crear($nuevoPremio, $date))
    header('Location:../../vistas/admin/a_pn.php');
else
    die("El premio ". $idPremio. " ya existe.");
?>