<!--
======================================================================
Muestra la solucion del equipo, un boton para crear una proposicion si no la crearon, o para crear una solucion si ya tienen la proposicion
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
    $reto = $_GET['reto'];
    
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $datos = $usu->consultar($_SESSION['login_usuario']);
    
    include_once "../../modelo/model_solucion.php";
    $sol = new Solucion();
    $datosSol = $sol->consultar(false, $datos['equipo'], $reto);
    
    //Listar los premios en los que participa la solucion
    include_once "../../modelo/model_premio.php";
    $premio = new Premio();
    $premiosS = $premio->listar('s');
    $premiosN = $premio->listar('n');
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/p_sidebar.php'; p_sidebar('', '', 'class="active"');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Solución</a>
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
                        <!-- Crear propuesta de solucion si no la crearon -->
                        <?php if(!$sol->subieronSol($datos['equipo'], $reto, true)){ ?>
                        <div class="container-fluid" style="text-align: center;">
                            <h2>Tu equipo todavía no ha subido una propuesta de solución.</h2>
                            <p>¡Créala!</p>
                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='p_prop_nueva.php?reto=<?php echo $reto; ?>'">Crear propuesta</button>
                        </div>
                        
                        <!-- Crear solucion si no la crearon -->
                        <?php } elseif (!$sol->subieronSol($datos['equipo'], $reto, false)){ ?>
                        <div class="container-fluid" style="text-align: center;">
                            <h2>Tu equipo todavía no ha subido una solución.</h2>
                            <p>¡Créala!</p>
                            <button type="button" class="btn btn-info btn-fill" onclick="location.href='p_sol_nueva.php?reto=<?php echo $reto; ?>'">Crear solución</button>
                        </div>
                        <!-- Ver/modificar la solucion -->
                        <?php } else {  ?>
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Solución</h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/participante/ctrl_p_prop_mod.php' method='post'>
                                        <div class="row">
                                            <!-- Titulo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input name="titulo" type="text" class="form-control" value="<?php echo $datosSol['titulo']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Equipo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Equipo</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $datosSol['equipo']; ?>">
                                                    <input type="hidden" name="equipo" value="<?php echo $datosSol['equipo']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Reto -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Reto</label>
                                                    <input type="text" disabled class="form-control" value="<?php echo $datosSol['reto']; ?>">
                                                    <input type="hidden" name="reto" value="<?php echo $datosSol['reto']; ?>">
                                                    <input type="hidden" name="esP" value="<?php echo false; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Descripcion -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <textarea name="desc" type="text" class="form-control"><?php echo $datosSol['descripcion']; ?></textarea>
                                                </div>        
                                            </div>
                                            <!-- Video -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Video</label>
                                                    <input name="video" type="text" class="form-control" value="<?php echo $datosSol['video']; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Documento -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Documento</label>
                                                    <input name="documento" type="text" class="form-control" value="<?php echo $datosSol['documento']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Repositorio -->
                                            <div class="col-md-5">
                                                <label>Repositorio</label>
                                                <input name="repo" type="text" class="form-control" value="<?php echo $datosSol['repositorio']; ?>">
                                            </div>
                                            <!-- Fecha -->
                                            <div class="col-md-2">
                                                <label>Fecha de entrega</label>
                                                <input disabled type="date" class="form-control" value="<?php
                                                $fecha = date_create($datosSol['fecha']);
                                                echo date_format($fecha,"d-m-Y"); ?>">
                                            </div>
                                        </div>
                                        

                                        <a class="btn btn-info btn-fill pull-left" href="p_menu.php">Volver</a>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">Modificar</button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">            
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Participa en los premios</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Premio</th>
                                            <th>Descripcion</th>
                                            <th>Tipo de premio</th>
                                            <th>Fecha limite</th>
                                        </thead>
                                        <tbody>
                                            <!-- Premios sede -->
                                            <?php foreach ($premiosS as $ps){
                                            if(($ps['FechaEquipos'] >= $datosSol['fecha']) 
                                               && ($datos['sede'] == $ps['Sede_idSede'])
                                               && ($ps['Solucion_Equipo_idEquipo'] == null)){?>
                                            <tr>
                                                <td><?php echo $ps['idPremio'];?></td>
                                                <td><?php echo $ps['Descripcion'];?></td>
                                                <td><?php echo $idioma['premio_sede'];?></td>
                                                <!-- Transformar fecha en formato dia mes año -->
                                                <td><?php $fi=date_create($ps['FechaEquipos']);
                                                echo date_format($fi,"d-m-Y");?></td>
                                            </tr>
                                            <?php }
                                            }?>
                                            <!-- Premios nacionales -->
                                            <?php foreach ($premiosN as $pn){
                                            if(($pn['FechaEquipos'] >= $datosSol['fecha'])
                                              && ($pn['Solucion_Equipo_idEquipo'] == null)){?>
                                            <tr>
                                                <td><?php echo $pn['idPremio'];?></td>
                                                <td><?php echo $pn['Descripcion'];?></td>
                                                <td><?php echo $idioma['premio_nacional'];?></td>
                                                <!-- Transformar fecha en formato dia mes año -->
                                                <td><?php $fi=date_create($pn['FechaEquipos']);
                                                echo date_format($fi,"d-m-Y");?></td>
                                            </tr>
                                            <?php }
                                            }?>
                                        </tbody>
                                    </table>

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