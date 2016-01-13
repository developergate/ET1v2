<!--
======================================================================
Menu principal del jurado nacional, muestra los premios nacionales
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("juradoNacional", "../../");
    include_once $includeIdioma;
    include_once '../../modelo/model_premio.php';
    $p = new Premio();
    $premios = $p->listar('n');
    // Fecha actual del usuario
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y/m/d', time());
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/jn_sidebar.php'; jn_sidebar('', 'class="active"');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma['gestion_votos_nacional']; ?></a>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th>Premio</th>
                                                <th>Fecha inicio</th>
                                                <th>Fecha fin</th>
                                                <th>Votar</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($premios as $p){
                                                $count = 0;
                                                if(($p['FechaJuradoS'] >= $date) && ($p['FechaJuradoN'] <= $date)){
                                                $count++;?>
                                                <tr>
                                                    <td><?php echo $p['idPremio'];?></td>
                                                    <td><?php echo $p['FechaJuradoS'];?></td>
                                                    <td><?php echo $p['FechaJuradoN'];?></td>
                                                    <td><a href="jn_votar.php?sede=<?php echo $s['idSede'];?>"><i class="pe-7s-medal"></i></a></td>
                                                </tr>
                                                <?php }
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php if($count == 0){ ?>
                                <div class="row">
                                    <div class="col-md-5 alert alert-warning bs-alert-old-docs">
                                        <p><?php echo $idioma['jn_no_pn'];?></p>
                                    </div>
                                </div>
                                <?php } ?>
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