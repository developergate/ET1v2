<!--
===========================================================================
Controlador para crear una nueva sede
Creado por: David Ansia Fdez.
Fecha: 07/01/2016
============================================================================
-->

<?php
include_once "../modelo/model_sede.php";

$id = $_POST['idSede'];

$nuevaSede = new Sede($id);

//Añadir reto
if ($nuevaSede->crear($nuevaSede))
    header('Location:../vistas/login.php');
else
    die("Lo sentimos, la sede ". $id. " ya existe");
?>