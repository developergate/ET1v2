<!--
======================================================================
Lista de soluciones sede ganadoras a votar
Creado por: Andrea Sanchez
Fecha: 13/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("juradoNacional", "../../");
    include_once $includeIdioma;
    $idPremio = $_GET['premio'];
    //Listar las soluciones
    include_once '../../modelo/model_jurado_puntua_solucion.php';
    $s = new Jurado_puntua_Solucion();
    $soluciones = $s->solucionesSedes($idPremio); //Listar las soluciones ganadoras de cada sede
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
                        <!-- Retos -->
                        <div class="card">
                            <div class="header">
                                <h4 class="title"><?php echo $idioma['soluciones'];?></h4>
                                <p class="category"><?php echo $idioma['premio']?> <?php echo $idPremio; ?></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th><?php echo $idioma["titulo"]; ?></th>
                                        <th><?php echo $idioma["equipo"]; ?></th>
                                        <th><?php echo $idioma["reto"]; ?></th>
                                        <th><?php echo $idioma["votar"]; ?></th>
                                    </thead>
                                    <tbody>
                                        <?php $count = 0;
                                        foreach ($soluciones as $s){ 
                                        //Si las soluciones se subieron en la fecha indicada
                                        if($s['Fecha'] <= $premio['fechaEquipos']){ ?>
                                        <tr>
                                            <td width='30%'><?php echo $s['Titulo'];?></td>
                                            <td width='40%'><?php echo $s['Equipo_idEquipo'];?></td>
                                            <td width='40%'><?php echo $s['Reto_idReto'];?></td>
                                            <td width='10%'><a href="js_votar_sol.php?premio=<?php echo $idPremio;?>&reto=<?php echo $s['Reto_idReto'];?>&equipo=<?php echo $s['Equipo_idEquipo'];?>"><i class="pe-7s-medal"></i></a></td>
                                        </tr>
                                        <?php }
                                        }?>
                                    </tbody>
                                </table>
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