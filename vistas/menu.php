<!--
======================================================================
Redirige segun el usuario logueado a su menu principal
Creado por: Andrea Sanchez Blanco
Fecha: 07/01/2016
======================================================================
-->

<?php
session_start();	

if (isset($_SESSION['rol'])){
	switch ($_SESSION['rol'])
	{
		case 'admin':
			header('Location: admin/a_menu.php');
			break;
		case 'juradoNacional':
			header('Location: jurado_nacional/jn_menu.php');
			break;
		case 'juradoSede':
			header('Location: jurado_sede/js_menu.php');
			break;
        case 'participante':
			header('Location: participante/p_menu.php');
			break;
		default:
			header('Location: login.php');
			break;
	}
}else {
	header('Location: login.php');
}

?>