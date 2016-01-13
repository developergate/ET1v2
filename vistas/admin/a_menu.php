<!--
======================================================================
Menu principal del administrador, muestra las sedes
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    include_once '../../modelo/model_sede.php';
    $sede = new Sede();
    $sedes = $sede->listar();
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
                
                <!-- CONTENIDO -->
                <div class="content">
                    <div class="container-fluid">   
                        <div class="row">                   
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Sede</th>
                                                <th>Eliminar</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($sedes as $s){ ?>
                                                <tr>
                                                    <td><?php echo $s['idSede'];?></td>
                                                    <td><a href="a_sede_del.php?sede=<?php echo $s['idSede'];?>"><i class="pe-7s-trash"></i></a></td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>      
                        </div> 
                        <div  class="container-fluid" style="text-align: center;">
                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='a_sede_nueva.php'"><?php echo $idioma["nueva_sede"] ?></button>
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