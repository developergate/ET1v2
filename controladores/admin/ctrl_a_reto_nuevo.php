<!--
===========================================================================
Controlador para modificar un usuario
Creado por: Edgard Ruiz
Fecha: 13/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_reto.php";

$idReto = $_POST['nombre'];
$idDesc = $_POST['descripcion'];
$aceptado = 1;

$nuevoReto = new Reto($idReto, $idDesc, $aceptado);

//Crea el reto
if ($nuevoReto->crear($nuevoReto))
    header('Location:../../vistas/admin/a_retos.php');
else
    die("El Reto ". $idReto. " ya existe.");
?>