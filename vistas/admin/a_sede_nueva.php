<!--
======================================================================
Crear una nueva sede
Creado por: Andrea Sanchez
Fecha: 08/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', 'class="active"', '', '', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma['gestion_sedes'] ?></a>
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
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $idioma['nueva_sede'] ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_sede_nueva.php' method='post'>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma['nombre_sede']; ?></label>
                                                        <input type="text" class="form-control" placeholder="Sede" name="sede">
                                                    </div>        
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma['crear']; ?></button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
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