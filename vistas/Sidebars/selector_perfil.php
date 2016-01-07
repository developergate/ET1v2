<!--
======================================================================
Redirige segun el usuario logueado a su menu principal
Creado por: Andrea Sanchez Blanco
Fecha: 07/01/2016
======================================================================
-->

<?php
if (isset($_SESSION['rol'])){
	switch ($_SESSION['rol'])
	{
		case 'admin':
			include 'a_sidebar.php';                   //Importa la barra correspondiente
            a_sidebar('class="active"', '', '', '', '', '');    //Selecciona el perfil
			break;
		case 'juradoNacional':
			include 'jn_sidebar.php';
            jn_sidebar('class="active"', '');
			break;
		case 'juradoSede':
			include 'js_sidebar.php';
            js_sidebar('class="active"', '');
			break;
        case 'participante':
			include 'p_sidebar.php';
            p_sidebar('class="active"', '', '', '', '');
			break;
		default:
			header('Location: login.php');
			break;
	}
}else {
	header('Location: login.php');
}

?>