<!--
======================================================================
Eliminar una sede
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
    if(isset($_GET['usu'])){
        $idUsuario = $_GET['usu'];
        include_once '../../modelo/model_usuario.php';
        $usuario = new Usuario();
        $u = $usuario->consultar($idUsuario);
    } else die("Falta el id del usuario.");
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', '', 'class="active"', '', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma["gestion_usuarios"]; ?></a>
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
                                        <h4 class="title"><?php echo $idioma["eliminar_usuario"]; ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_usu_del.php' method='post'>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <!-- Login -->
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $idUsuario;?>">
                                                        <input type="hidden" name="usuario" value="<?php echo $idUsuario;?>">
                                                    </div>        
                                                </div>
                                                <!-- Nombre -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_nombre"]; ?></label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['nombre'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_email"]; ?></label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['email'];?>">
                                                    </div>        
                                                </div>
                                                <!-- Rol -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["rol"]; ?></label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['rol'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Equipo si es un participante -->
                                            <?php if($u['rol'] == 'participante'){ ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["equipo"]; ?></label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['equipo'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <?php }?>

                                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma["eliminar"]; ?></button>
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