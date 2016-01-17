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
$fe = $_POST['fe'];
$fjs = $_POST['fjs'];
$fjn = $_POST['fjn'];

$modPremio = new Premio($idPremio, null, $descPremio, $fe, $fjs, $fjn, $tipo='n', $solEsPropuesta="", $solEquipo="", $solReto="");

//Modifica el premio
if ($modPremio->modificar($idPremio, $modPremio))
    header('Location:../../vistas/admin/a_pn.php');
else
    die("El premio ". $idPremio. " no se ha podido modificar.");
?>