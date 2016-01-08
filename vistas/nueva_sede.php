<!--
======================================================================
Pagina para crear una sede
Creado por: David Ansia
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../controladores/ctrl_permisos.php');
    include_once('../modelo/esp.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    ?>

    <body class="left-sidebar">
		<!-- Wrapper -->
        <div id="wrapper">
             <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', 'class="active"', '', '', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Gestion de sedes</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="../../controladores/ctrl_log_out.php">
                                        Log out
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>
            <!-- Contenido -->
                <div id="content">
                    <div class="inner">
                        <!--INICIO SECCIÓN-->
                        <header><h1><a><?php echo $idioma["crear_sede"]; ?></a></h1></header>
                        
                                <!--Ubicacion de la sede-->
                                <tr> 
                                  <td style=""><?php echo $idioma["id_Sede"]; ?></td> 
                                    <td><input type='text' class='text' required name='titulo' placeholder="introduce sede"></td>
                                </tr>
                                
                            <!-- Botones GUARDAR y CANCELAR -->
                            <table>
                                <tr>
                                    <td width='30%'></td>
                                        <td width='10%' colspan='4' ><button class="btn btn-info btn-fill" onclick="location.href='../a_menu.php'"><?php echo $idioma["aceptar"];?></button></div>
                                        <td width='10%' colspan='4' ><button class="btn btn-info btn-fill" onclick="location.href='../a_menu.php'"><?php echo $idioma["cancelar"];?></button></div>
                                    </td>
                                    <td width='25%'></td>
                                </tr>
                            </table>
                    <!-- FIN TABLA -->
                </div>
            </div>
        </div>


        <!-- Javascript -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>