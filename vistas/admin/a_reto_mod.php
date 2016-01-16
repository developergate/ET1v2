<!--
======================================================================
Modificar un usuario
Creado por: Edgard RUiz
Fecha: 13/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    $idReto = $_GET['reto'];
    include_once "../../modelo/model_reto.php";
    $r = new Reto();
    $reto = $r->consultar($idReto);
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', '', '', 'class="active"', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><?php echo $idioma["gestion_retos"]; ?></a>
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
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $idioma["reto_modificar"]; ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_reto_mod.php' method='post'>
                                            <!-- Nombre -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["reto_nombre"]; ?></label>
                                                        <input type="text" class="form-control" name="nombre" value="<?php echo $reto['idReto'] ?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Descripcion -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["reto_descripcion"]; ?></label>
                                                        <textarea type="text" class="form-control" name="descripcion"><?php echo $reto['DescReto'] ?></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Aceptado -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["reto_aceptado"]; ?></label>
                                                        <?php if($reto['Aceptado'] == 0){ ?>
                                                        
                                                        <select type="text" name='aceptado' class="form-control">
                                                            <option value='0' selected><?php echo $idioma["no"]; ?></option>
                                                            <option value='1'><?php echo $idioma["si"]; ?></option>
                                                        </select>
                                                        <?php } else{ ?>
                                                        <select type="text" name='aceptado' class="form-control">
                                                            <option value='0'><?php echo $idioma["no"]; ?></option>
                                                            <option value='1' selected><?php echo $idioma["si"]; ?></option>
                                                        </select>
                                                        <?php } ?>
                                                    </div>        
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma["modificar"]; ?></button>
                                            <div class="clearfix"></div>
                                        </form>
                                    </div>
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
    <?php include_once '../footers.php'; ?>
</html>