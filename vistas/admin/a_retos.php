<!--
======================================================================
Muestra los usuarios
Creado por: Andrea Sanchez
Fecha: 08/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    include_once '../../modelo/model_reto.php';
    $retoSi = new Reto();
    $retoNo = new Reto();
    $retosSi = $retoSi->listarSi();
    $retosNo = $retoNo->listarNo();
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', '', '', 'class="active"',  '', '');?>
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
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="content table-responsive table-full-width">
                                           <!-- Tabla de aceptados-->
                                           <table class="table table-hover table-striped">
                                            <thead>
                                            <th><?php echo $idioma["retoSi"]; ?></th>
                                            </thead>
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
                                            <table class="table table-hover table-striped">
                                             <thead>
                                            <th><?php echo $idioma["retoNo"]; ?></th>
                                            </thead>
                                            <thead>
                                                <th><?php echo $idioma["reto_nombre"]; ?></th>
                                                <th><?php echo $idioma["reto_descripcion"]; ?></th>
                                                <th><?php echo $idioma["reto_aceptado"]; ?></th>
                                                <th><?php echo $idioma["editar"]; ?></th>
                                                <th><?php echo $idioma["eliminar"]; ?></th>
                                            </thead>
                                            <tbody>
                                               <?php foreach ($retosNo as $rn){ ?>
                                                <tr>
                                                    <td width='30%'><?php echo $rn['idReto'];?></td>
                                                    <td width='40%'><?php echo $rn['DescReto'];?></td>
                                                    <td width='10%'><?php if($rn['Aceptado']==0) echo "NO";?></td>
                                                    <td width='10%'><a href="a_reto_mod.php?reto=<?php echo $rn['idReto'];?>"><i class="pe-7s-eyedropper"></i></a></td>
                                                    <td width='10%'><a href="a_reto_del.php?reto=<?php echo $rn['idReto'];?>"><i class="pe-7s-trash"></i></a></td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>      
                        </div> 
                        <div class="col-md-2 col-md-offset-5">
                            <button type="submit" class="btn btn-info btn-fill"><a class="boton" href="a_reto_nuevo.php"><?php echo $idioma["reto_crear"]; ?></a></button>
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