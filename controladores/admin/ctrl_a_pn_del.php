<!--
===========================================================================
Controlador para eliminar un premio
Creado por: Edgar Conde
Fecha: 15/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_premio.php";

$idPremio = $_POST['pn'];

$delPremio = new Premio();

//Eliminar el premio
if ($delPremio->eliminar($idPremio))
    header('Location:../../vistas/admin/a_pn.php');
else
    die("El premio ". $idPremio. " no existe.");
?>