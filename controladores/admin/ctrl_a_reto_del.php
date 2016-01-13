<!--
===========================================================================
Controlador para eliminar un usuario
Creado por: Edgard Ruiz
Fecha: 13/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_reto.php";

$idReto = $_POST['nombre'];

$delReto = new Reto();

//Eliminar el reto
if ($delReto->eliminar($idReto))
    header('Location:../../vistas/admin/a_retos.php');
else
    die("El reto ". $idReto. " no existe.");
?>