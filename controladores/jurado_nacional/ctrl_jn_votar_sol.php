<!--
===========================================================================
Controlador para votar o modificar un voto nacional
Creado por: Andrea Sanchez
Fecha: 13/01/2016
============================================================================
-->

<?php
include_once "../../modelo/model_jurado_puntua_solucion.php";

$idUsuario = $_POST['usuario'];
$idPremio = $_POST['premio'];
$idEquipo = $_POST['equipo'];
$idReto = $_POST['reto'];
$voto = $_POST['voto'];

$jSol = new Jurado_puntua_Solucion($idUsuario, $idPremio, false, $idEquipo, $idReto, $voto, 'n');

if($voto < 0 || $voto >10)
    die("El voto debe ser un valor entre 0 y 10");
else {
    //Saber si se modifica o se vota por primera vez
    if(isset($_POST['modificar'])){
        if ($jSol->modificar($jSol))
            header('Location:../../vistas/jurado_nacional/jn_soluciones.php?premio='.$idPremio);
        else
            die("El voto no estaba registrado.");
    }else{
        if ($jSol->crear($jSol))
            header('Location:../../vistas/jurado_nacional/jn_soluciones.php?premio='.$idPremio);
        else
            die("El voto ya esta registrado.");
    }
}
?>