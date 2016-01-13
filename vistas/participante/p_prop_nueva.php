<!--
======================================================================
Crear una propuesta de solucion
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
    $reto = $_GET['reto'];
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $datos = $usu->consultar($_SESSION['login_usuario']);
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
                        <!-- Crear propuesta de solucion -->
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Crear propuesta de solución</h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/participante/ctrl_p_prop_nueva.php' method='post'>
                                        <div class="row">
                                            <!-- Titulo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input name="titulo" required type="text" class="form-control">
                                                </div>        
                                            </div>
                                            <!-- Equipo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Equipo</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $datos['equipo']; ?>">
                                                    <input type="hidden" name="equipo" value="<?php echo $datos['equipo']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Reto -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Reto</label>
                                                    <input type="text" disabled class="form-control" value="<?php echo $reto ?>">
                                                    <input type="hidden" name="reto" value="<?php echo $reto; ?>">
                                                    <input type="hidden" name="esP" value="<?php echo true; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Descripcion -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <textarea name="desc" required type="text" class="form-control"></textarea>
                                                </div>        
                                            </div>
                                            <!-- Video -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Video</label>
                                                    <input name="video" required type="text" class="form-control">
                                                </div>        
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <!-- Documento -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Documento</label>
                                                    <input name="documento" required type="text" class="form-control">
                                                </div>        
                                            </div>
                                            <!-- Repositorio -->
                                            <div class="col-md-6">
                                                <label>Repositorio</label>
                                                <input name="repo" required type="text" class="form-control">
                                            </div>
                                        </div>

                                        <a class="btn btn-info btn-fill pull-left" href="p_menu.php">Volver</a>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Crear</button>
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