<!--
======================================================================
Muestra los usuarios
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
    include_once '../../modelo/model_usuario.php';
    $usuario = new Usuario();
    $usuarios = $usuario->listar();
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Login</th>
                                                <th>Sede</th>
                                                <th>Nombre</th>
                                                <th>Email</th>
                                                <th>Rol</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($usuarios as $u){ ?>
                                                <tr>
                                                    <td><?php echo $u['idUsuario'];?></td>
                                                    <td><?php echo $u['Sede_idSede'];?></td>
                                                    <td><?php echo $u['Nombre'];?></td>
                                                    <td><?php echo $u['Email'];?></td>
                                                    <td><?php echo $u['Rol'];?></td>
                                                    <td><a href="a_usu_mod.php?usu=<?php echo $u['idUsuario'];?>"><i class="pe-7s-eyedropper"></i></a></td>
                                                    <td><a href="a_usu_del.php?usu=<?php echo $u['idUsuario'];?>"><i class="pe-7s-trash"></i></a></td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>      
                        </div> 
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-info btn-fill"><a class="boton" href="a_usu_nuevo.php">Crear usuario</a></button>
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