<!--
===========================================================================
Controlador para añadir una nueva sede
Creado por: Andrea Sanchez
Fecha: 08/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_sede.php";

$idSede = $_POST['sede'];

$delSede = new Sede();

//Eliminar la sede
if ($delSede->eliminar($idSede))
    header('Location:../../vistas/admin/a_menu.php');
else
    die("La sede ". $idSede. " no existe.");
?>