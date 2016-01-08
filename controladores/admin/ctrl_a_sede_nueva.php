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

$nuevaSede = new Sede();

//Crear la sede
if ($nuevaSede->crear($idSede))
    header('Location:../../vistas/admin/a_menu.php');
else
    die("Error al crear la sede ". $idSede);
?>