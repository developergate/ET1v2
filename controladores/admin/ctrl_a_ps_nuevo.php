<!--
===========================================================================
Controlador para crear un premio
Creado por: David Ansia
Fecha: 14/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premios.php";

$idPremio = $_POST['nombre'];
$descPremio = $_POST['descripcion'];
$fi = $_POST['fi'];
$ff = $_POST['ff'];
$tipo = 's';

$nuevoPremio = new Premio($idPremio, $descPremio, $fi, $ff, $tipo);

//Crea el reto
if ($nuevoPremio->crear($nuevoPremio))
    header('Location:../../vistas/admin/a_ps.php');
else
    die("El premio ". $idPremio. " ya existe.");
?>