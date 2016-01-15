<!--* idPremio : varchar(50)-->
<!--* Sede_idSede : varchar(50)-->
<!--* Descripcion : varchar(300)-->
<!--* FechaEquipos : date-->
<!--* FechaJuradoS : date-->
<!--* FechaJuradoN : varchar(45)-->
<!--* TipoPremio : enum('s','n')-->
<!--* Solucion_EsPropuesta : tinyint(1)-->
<!--* Solucion_Equipo_idEquipo : varchar(50)-->
<!--* Solucion_Reto_idReto : varchar(50)-->

<!--
======================================================================
Crear una nueva sede
Creado por: David Ansia
Fecha: 14/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
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
                            <a class="navbar-brand" href="#"><?php echo $idioma["nuevo_ps"]; ?></a>
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
                                        <h4 class="title"><?php echo $idioma["premio_crear"]; ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_ps_nuevo.php' method='post'>
                                            <!-- Nombre -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["premio_nombre"]; ?></label>
                                                        <input type="text" class="form-control" name="nombre">
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Descripcion -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["premio_desc"]; ?></label>
                                                        <textarea type="text" class="form-control" name="descripcion"></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <!--sede-->
                                            <div class="form-group">
                                                    <label><?php echo $idioma['sede'];?></label>
                                                    <select type="text" name='idioma' class="form-control">
                                                        <option value='esp' name="sede" selected><?php echo $idioma['selecciona'];?></option>
                                                    </select>
                                                </div>
                                            <!-- Fecha equipos -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["fe"]; ?></label>
                                                        <input type="date" class="form-control" name="fe"></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <!-- Fecha limite -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["fjs"]; ?></label>
                                                        <input type="date" class="form-control" name="fjs"></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["fjn"]; ?></label>
                                                        <input type="date" class="form-control" name="fjn"></textarea>
                                                    </div>        
                                                </div>
                                            </div>
                                            
                                            <button type="submit" class="btn btn-info btn-fill pull-right"><?php echo $idioma["crear"]; ?></button>
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