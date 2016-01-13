<!--
======================================================================
Menu principal del jurado sede
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("juradoSede", "../../");
    include_once $includeIdioma;
    include_once '../../modelo/model_premio.php';
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/js_sidebar.php'; js_sidebar('', 'class="active"');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma['gestion_votos_sede'];?></a>
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
                        <h4>Premios sede</h4>
                        <div class="card">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><?php echo $idioma["reto_nombre"]; ?></th>
                                        <th><?php echo $idioma["reto_descripcion"]; ?></th>
                                        <th><?php echo $idioma["reto_aceptado"]; ?></th>
                                        <th><?php echo $idioma["editar"]; ?></th>
                                        <th><?php echo $idioma["eliminar"]; ?></th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($retosSi as $rs){ ?>
                                        <tr>
                                            <td width='30%'><?php echo $rs['idReto'];?></td>
                                            <td width='40%'><?php echo $rs['DescReto'];?></td>
                                            <td width='10%'><?php if($rs['Aceptado']==1) echo "SI";?></td>
                                            <td width='10%'><a href="a_reto_mod.php?reto=<?php echo $rs['idReto'];?>"><i class="pe-7s-eyedropper"></i></a></td>
                                            <td width='10%'><a href="a_reto_del.php?reto=<?php echo $rs['idReto'];?>"><i class="pe-7s-trash"></i></a></td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h4>Premios nacionales</h4>
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