<!--
======================================================================
Modificar un premio de sede
Creado por: Edgar Conde
Fecha: 17/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    $idPremio = $_GET['ps'];
    include_once "../../modelo/model_premio.php";
    $p = new Premio();
    $premio = $p->consultar($idPremio);
    
    //Listar las sedes
    include_once('../../modelo/model_sede.php');
    $s = new Sede();
    $sedes = $s->listar();
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
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><?php echo $idioma["premio_modificar"]; ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_ps_mod.php' method='post'>
                                            <!-- Nombre -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["premio_nombre"]; ?></label>
                                                        <input type="text" disabled required class="form-control" value="<?php echo $idPremio?>">
                                                        <input type="hidden" name="nombre" value="<?php echo $idPremio;?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Descripcion -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["premio_desc"]; ?></label>
                                                        <textarea type="text" class="form-control" name="descripcion"><?php echo $premio['descripcion']?></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <!--sede-->
                                            <div class="form-group">
                                                <label><?php echo $idioma['sede'];?></label>
                                                <select type="text" name='sede' class="form-control">
                                                    <?php
                                                    foreach ($sedes as $se){ 
                                                        if($premio['sede']==$se['idSede']) { ?>
                                                        <option value='<?php echo $se['idSede'] ?>' selected name="sede"><?php echo $se['idSede'] ?></option>
                                                    <?php } else{ ?>
                                                        <option value='<?php echo $se['idSede'] ?>' name="sede"><?php echo $se['idSede'] ?></option>
                                                    <?php }
                                                           } ?>
                                                </select>
                                            </div>
                                            <!-- Fecha equipos -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["fe"]; ?></label>
                                                        <input type="date" required class="form-control" name="fe" value="<?php echo $premio['fechaEquipos'];?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Fecha limite -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["fjs"]; ?></label>
                                                        <input type="date" required class="form-control" name="fjs" value="<?php echo $premio['fechaJuradoS'];?>">
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