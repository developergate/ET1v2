<!--
===========================================================================
Controlador para modificar un premio
Creado por: Edgar Conde
Fecha: 17/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premio.php";

$idPremio = $_POST['nombre'];
$descPremio = $_POST['descripcion'];
$sede = $_POST['sede'];
$fe = $_POST['fe'];
$fjs = $_POST['fjs'];
$fjn = $_POST['fjn'];

$modPremio = new Premio($idPremio, $sede, $descPremio, $fe, $fjs, null, $tipo='s', $solEsPropuesta="", $solEquipo="", $solReto="");

//Modifica el premio
if ($modPremio->modificar($idPremio, $modPremio))
    header('Location:../../vistas/admin/a_ps.php');
else
    die("El premio ". $idPremio. " no se ha podido modificar.");
?>