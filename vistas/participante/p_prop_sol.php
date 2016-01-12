<!--
======================================================================
Menu principal del participante, en donde se muestran los retos
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("participante", "../../");
    include_once $includeIdioma;
    $reto = $_GET['reto'];
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $datos = $usu->consultar($_SESSION['login_usuario']);
    include_once "../../modelo/model_solucion.php";
    $sol = new Solucion();
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/p_sidebar.php'; p_sidebar('', '', 'class="active"');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Propuesta de solución</a>
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

                <!-- CONTENIDO -->
                <div class="content">
                    <div class="container-fluid"> 
                        <!-- Crear propuesta de solucion -->
                        <?php if(!$sol->subieronSol($datos['equipo'], $reto, false)){ ?>
                        <div class="container-fluid" style="text-align: center;">
                            <h2>Tu equipo todavía no ha subido una propuesta de solución.</h2>
                            <p>¡Créala!</p>
                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='p_prop_nueva.php'">Crear propuesta</button>
                        </div>
                        <!-- Ver propuesta de solucion -->
                        <?php }else{} ?>
                    </div>    
                </div>


                <footer class="footer">
                    <div class="container-fluid">
                        <p class="copyright pull-right"> &copy; 2016 Grupo 5, Hackathon</p>
                    </div>
                </footer>
            </div>   
        </div>
    </body>
    <?php include_once '../footers.php'; ?>
</html>