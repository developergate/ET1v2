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
                            <a class="navbar-brand" href="#">Gestion de usuarios</a>
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
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Eliminar usuario</h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_usu_del.php' method='post'>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $idUsuario;?>">
                                                        <input type="hidden" name="usuario" value="<?php echo $idUsuario;?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['nombre'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['email'];?>">
                                                    </div>        
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Rol</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['rol'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <?php if($u['rol'] == 'participante'){ ?>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Equipo</label>
                                                        <input type="text" class="form-control" disabled value="<?php echo $u['equipo'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <?php }?>

                                            <button type="submit" class="btn btn-info btn-fill pull-right">Eliminar</button>
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