<!--
===========================================================================
Controlador para crear un premio
Creado por: David Ansia
Fecha: 14/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premio.php";

$idPremio = $_POST['nombre'];
$descPremio = $_POST['descripcion'];
$fe = $_POST['fe'];
$fjs = $_POST['fjs'];
$fjn = $_POST['fjn'];
$sede = $_POST['sede'];

$nuevoPremio = new Premio($idPremio, $sede, $descPremio, $fe, $fjs, $fjn, $tipo='n', $solEsPropuesta="", $solEquipo="", $solReto="");

//Crea el reto
if ($nuevoPremio->crear($nuevoPremio))
    header('Location:../../vistas/admin/a_ps.php');
else
    die("El premio ". $idPremio. " ya existe.");
?>