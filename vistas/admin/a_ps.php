<!--
======================================================================
Muestra los premios sede
Creado por: Andrea Sanchez
Fecha: 14/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    include_once '../../modelo/model_premio.php';
    $premio = new Premio();
    $premios = $premio->listar('s');
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', '', '', '', 'class="active"', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma["gestion_premios_sede"]; ?></a>
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
                                <!-- Premios en proceso -->
                                <div class="card">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th><?php echo $idioma["premio"]; ?></th>
                                                <th><?php echo $idioma["registro_sede"]; ?></th>
                                                <th><?php echo $idioma["reto_descripcion"]; ?></th>
                                                <th><?php echo $idioma["editar"]; ?></th>
                                                <th><?php echo $idioma["eliminar"]; ?></th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($premios as $p){ 
                                                if($p['Solucion_EsPropuesta'] == null){?>
                                                <tr>
                                                    <td><?php echo $p['idPremio'];?></td>
                                                    <td><?php echo $p['Sede_idSede'];?></td>
                                                    <td><?php echo $p['Descripcion'];?></td>
                                                    <td><a href="a_ps_mod.php?ps=<?php echo $p['idPremio'];?>"><i class="pe-7s-eyedropper"></i></a></td>
                                                    <td><a href="a_ps_del.php?ps=<?php echo $p['idPremio'];?>"><i class="pe-7s-trash"></i></a></td>
                                                </tr>
                                                <?php } }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- Premios finalizados -->
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $idioma['premios_resueltos'];?></h4>
                                    </div>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <th><?php echo $idioma["premio"]; ?></th>
                                                <th><?php echo $idioma["reto_descripcion"]; ?></th>
                                                <th><?php echo $idioma["equipo"]; ?></th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($premios as $p){
                                                if($p['Solucion_EsPropuesta'] != null){
                                                ?>
                                                <tr>
                                                    <td><?php echo $p['idPremio'];?></td>
                                                    <td><?php echo $p['Descripcion'];?></td>
                                                    <td><?php echo $p['Solucion_Equipo_idEquipo'];?><i class="pe-7s-eye-dropper"></i></td>
                                                </tr>
                                                <?php } }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>      
                        </div> 
                        <div class="col-md-3 col-md-offset-5">
                            <a class="boton btn btn-info btn-fill" href="a_ps_nuevo.php"><?php echo $idioma["nuevo_ps"]; ?></a>
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