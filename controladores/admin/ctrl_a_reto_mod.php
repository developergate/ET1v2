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
$descripcion = $_POST['descripcion'];
$aceptado = $_POST['aceptado'];
$nuevoReto = new Reto($idReto, $descripcion, $aceptado);

//Modificar el reto
if ($nuevoReto->modificar($idReto, $nuevoReto))
    header('Location:../../vistas/admin/a_retos.php');
else
    die("El reto ". $idReto. " no existe.");
?>