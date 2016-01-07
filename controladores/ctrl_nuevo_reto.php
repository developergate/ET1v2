<!--
===========================================================================
Controlador para añadir un nuevo reto
Creado por: Andrea Sanchez Blanco
Fecha: 07/01/2016
============================================================================
-->

<?php
session_start();
include_once "../modelo/model_reto.php";

$titulo = $_POST['titulo'];
$desc = $_POST['descripcion'];

$nuevoReto = new Reto($titulo, $desc, false);

//Añadir reto
if ($nuevoReto->crear($nuevoReto))
    header('Location:../vistas/login.php');
else
    die("Lo sentimos, el reto ". $titulo. " ya existe");
?>