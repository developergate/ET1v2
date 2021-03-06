<!--
======================================================================
Menu para crear un equipo, desvincularse o saber a cual se pertenece
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
                        <!-- Si el usuario no tiene equipo -->
                        <?php if($datos['equipo'] == null){ ?>
                        <div class="container-fluid" style="text-align: center;">
                            <h2><?php echo $idioma['sin_equipo'];?></h2>
                            <p><?php echo $idioma['sin_equipo2'];?></p>
                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='p_equipo_nuevo.php'"><?php echo $idioma['nuevo_equipo'];?></button>
                        </div>
                        <?php } else { ?>
                        <!-- Si el usuario tiene equipo -->
                        <div class="row">                   
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $idioma['equipo'];?>: <?php echo $datos['equipo'];?></h4>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th><?php echo $idioma['login_usuario']; ?></th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $usuarios = $usu->usuariosEquipo($datos['equipo']);
                                                //Cuenta el numero de usuarios para saber si solo hay 1, y desea abandonar el equipo, se eliminara tambien el equipo, y la vista se lo pasa al controlador
                                                $numero = 0;
                                                foreach($usuarios as $u){
                                                ?>
                                                <tr>
                                                    <td><?php echo $u['idUsuario']; $numero++; ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <div class="container-fluid" style="text-align: center;">
                                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='p_equipo_nuevo_usu.php?equipo=<?php echo $datos['equipo'];?>&sede=<?php echo $datos['sede'];?>'"><?php echo $idioma['add_miembro']; ?></button>
                                            
                                            <button type="button" class="btn btn-danger btn-fill" onclick="location.href='p_equipo_salir.php?num=<?php echo $numero; ?>'"><?php echo $idioma['salir_equipo']; ?></button>
                                        </div>
                                    </div>
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