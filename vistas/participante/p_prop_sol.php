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
                        <?php }else{ ?>
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Edit Profile</h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/ctrl_perfil.php' method='post'>
                                        <div class="row">
                                            <!-- Titulo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $perfil['idUsuario']; ?>">
                                                    <input name="login" type="hidden" value="<?php echo $perfil['idUsuario']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Equipo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Equipo</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $perfil['sede']; ?>">
                                                    <input name="sede" type="hidden" value="<?php echo $perfil['sede']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Reto -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Reto</label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $perfil['rol']; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Descripcion -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <input name="nombre" type="text" class="form-control" value="<?php echo $perfil['nombre']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Video -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Video</label>
                                                    <input name="email" type="email" class="form-control" value="<?php echo $perfil['email']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Documento -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label>Documento</label>
                                                    <input name="email" type="email" class="form-control" value="<?php echo $perfil['email']; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <!-- Repositorio -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Repositorio</label>
                                                <input name="" type="text" required class="form-control">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div> 
                        <?php } ?>
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