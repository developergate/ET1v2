<!--
======================================================================
Solucion para votar, muestra sus datos y deja crear o modificar la votacion
Creado por: Andrea Sanchez
Fecha: 13/01/2016
======================================================================
-->

<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("juradoSede", "../../");
    include_once $includeIdioma;
    
    //Datos necesarios
    $premio = $_GET['premio'];
    $reto = $_GET['reto'];
    $equipo = $_GET['equipo'];
    $usuario = $_SESSION['login_usuario'];
    
    include_once '../../modelo/model_solucion.php';
    $s = new Solucion();
    $datos = $s->consultar(false, $equipo, $reto); 
    
    //Usado para saber si el usuario ya ha votado y mostrar el voto
    include_once "../../modelo/model_jurado_puntua_solucion.php";
    $v = new Jurado_puntua_Solucion();
    $voto = null;
    if($v->exists($usuario, $premio, false, $equipo, $reto)){
        $voto = $v->consultar($usuario, $premio, false, $equipo, $reto);
    }
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

                <div class="content">
                    <!-- CONTENIDO -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title"><?php echo $idioma['votar_solucion'];?></h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/jurado_sede/ctrl_js_votar_sol.php' method='post'>
                                        <div class="row">
                                            <!-- Titulo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Titulo</label>
                                                    <input name="titulo" disabled type="text" class="form-control" value="<?php echo $datos['titulo'];?>">
                                                </div>        
                                            </div>
                                            <!-- Equipo -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Equipo</label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $datos['equipo']; ?>">
                                                    <input type="hidden" name="equipo" value="<?php echo $datos['equipo']; ?>">
                                                    <input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
                                                </div>        
                                            </div>
                                            <!-- Reto -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Reto</label>
                                                    <input type="text" disabled class="form-control" value="<?php echo $reto ?>">
                                                    <input type="hidden" name="reto" value="<?php echo $reto; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Descripcion -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripcion</label>
                                                    <textarea name="desc" disabled type="text" class="form-control"><?php echo $datos['descripcion'];?></textarea>
                                                </div>        
                                            </div>
                                            <!-- Video -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Video</label>
                                                    <input name="video" disabled type="text" class="form-control" value="<?php echo $datos['video'];?>">
                                                </div>        
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <!-- Documento -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Documento</label>
                                                    <input name="documento" disabled type="text" class="form-control" value="<?php echo $datos['documento'];?>">
                                                </div>        
                                            </div>
                                            <!-- Repositorio -->
                                            <div class="col-md-6">
                                                <label>Repositorio</label>
                                                <input name="repo" disabled type="text" class="form-control" value="<?php echo $datos['repositorio'];?>">
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <!-- Premio -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Premio</label>
                                                    <input name="premio" disabled type="text" class="form-control" value="<?php echo $premio;?>">
                                                    <input type="hidden" name="premio" value="<?php echo $premio; ?>">
                                                </div>        
                                            </div>
                                            <!-- Votar -->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Votar</label>
                                                    <?php if($voto != null){ ?>
                                                    <input name="voto" required type="number" class="form-control" value="<?php echo $voto['puntuacion']; ?>">
                                                    <input name="modificar" type="hidden">
                                                    <?php } else { ?>
                                                    <input name="voto" required type="number" class="form-control">
                                                    <?php } ?>
                                                </div>        
                                            </div>
                                        </div>

                                        <a class="btn btn-info btn-fill pull-left" href="js_soluciones.php?premio=<?php echo $premio; ?>"><?php echo $idioma['volver'];?></a>
                                        <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma['votar'];?></button>
                                        <div class="clearfix"></div>
                                    </form>
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
    <?php include_once '../footers.php';?>
</html>