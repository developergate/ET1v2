<!--
======================================================================
Salir de un equipo
Creado por: Andrea Sanchez
Fecha: 12/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("participante", "../../");
    include_once $includeIdioma;
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $datos = $usu->consultar($_SESSION['login_usuario']);
    $numero = $_GET['num']; //Numero de usuarios del equipo
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/p_sidebar.php'; p_sidebar('', 'class="active"', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma['gestion_equipos'];?></a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="../../controladores/ctrl_log_out.php">
                                        <?php echo $idioma["cerrar"]; ?>
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- CONTENIDO -->
                <div class="content">
                    <div class="container-fluid">  
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title"><?php echo $idioma['salir_equipo']; ?></h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/participante/ctrl_p_equipo_salir.php' method='post'>
                                        <!-- Informacion del equipo -->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['equipo_nombre']; ?></label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $datos['equipo'];?>">
                                                    <input type="hidden" name="num" value="<?php echo $numero; ?>">
                                                </div>        
                                            </div>
                                        </div>
                                        <!-- Notificacion si es el ultimo usuario del equipo -->
                                        <?php if($numero == 1){ ?>
                                        <div class="row">
                                            <div class="col-md-5 col-md-offset-3 alert alert-danger bs-alert-old-docs">
                                                <p><?php echo $idioma['ultimo_miembro']; ?></p>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma['salir']; ?></button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
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