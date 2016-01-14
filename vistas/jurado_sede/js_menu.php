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
    $p = new Premio();
    $premiosS = $p->listar('s');
    $premiosN = $p->listar('n');
    // Fecha actual
    date_default_timezone_set('Europe/Madrid');
    $date = date('Y-m-d', time());
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
                        <!-- Premios sede -->
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $idioma['premios_sede'];?></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><?php echo $idioma['premio'];?></th>
                                        <th><?php echo $idioma['registro_sede'];?></th>
                                        <th><?php echo $idioma['fi'];?></th>
                                        <th><?php echo $idioma['ff'];?></th>
                                        <th><?php echo $idioma['soluciones'];?></th>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        foreach ($premiosS as $ps){
                                        if(($ps['FechaEquipos'] < $date) && ($ps['FechaJuradoS'] >= $date)){
                                        $count++;?>
                                        <tr>
                                            <td><?php echo $ps['idPremio'];?></td>
                                            <td><?php echo $ps['Sede_idSede'];?></td>
                                            <!-- Transformar las fechas en formato dia-mes-año -->
                                            <td><?php $fi=date_create($ps['FechaEquipos']);
                                            echo date_format($fi,"d-m-Y");?></td>
                                            <td><?php $ff=date_create($ps['FechaJuradoS']);
                                            echo date_format($ff,"d-m-Y");?></td>
                                            <!-- Icono que lleva a la lista de retos con soluciones para votar -->
                                            <td><a href="js_soluciones_sede.php?premio=<?php echo $ps['idPremio'];?>&sede=<?php echo $ps['Sede_idSede'];?>"><i class="pe-7s-magic-wand"></i></a></td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($count == 0){ ?>
                        <div class="row">
                            <div class="col-md-4 alert alert-warning bs-alert-old-docs">
                                <p><?php echo $idioma['js_no_ps'];?>.</p>
                            </div>
                        </div>
                        <?php } ?>
                        
                        <!-- Premios nacional -->
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $idioma['premios_nacional'];?></h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><?php echo $idioma['premio'];?></th>
                                        <th><?php echo $idioma['fi'];?></th>
                                        <th><?php echo $idioma['ff'];?></th>
                                        <th><?php echo $idioma['soluciones'];?></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count2 = 0;
                                        foreach ($premiosN as $pn){
                                        if(($pn['FechaEquipos'] < $date) && ($pn['FechaJuradoS'] >= $date)){
                                        $count2++;?>
                                        <tr>
                                            <td><?php echo $pn['idPremio'];?></td>
                                            <!-- Transformar las fechas en formato dia-mes-año -->
                                            <td><?php $fi=date_create($pn['FechaEquipos']);
                                            echo date_format($fi,"d-m-Y");?></td>
                                            <td><?php $ff=date_create($pn['FechaJuradoS']);
                                            echo date_format($ff,"d-m-Y");?></td>
                                            <td><a href="js_soluciones.php?premio=<?php echo $pn['idPremio'];?>"><i class="pe-7s-magic-wand"></i></a></td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if($count2 == 0){ ?>
                        <div class="row">
                            <div class="col-md-4 alert alert-warning bs-alert-old-docs">
                                <p><?php echo $idioma['js_no_pn'];?></p>
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