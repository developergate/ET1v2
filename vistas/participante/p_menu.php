<!--
======================================================================
Menu principal del participante, en donde se muestran los retos
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("participante", "../../");
    include_once $includeIdioma;
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $datos = $usu->consultar($_SESSION['login_usuario']);
    include_once "../../modelo/model_reto.php";
    $reto = new Reto();
    $retos = $reto->listar();
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
                            <a class="navbar-brand" href="#">Retos</a>
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
                                                <th>Reto</th>
                                                <th>Descripcion</th>
                                                <?php if($datos['equipo'] != null){ ?>
                                                <th>Propuesta de solucion</th>
                                                <th>Solucion</th>
                                                <?php } ?>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($retos as $r){
                                                if($r['Aceptado'] == true){?>
                                                <tr>
                                                    <td><?php echo $r['idReto'];?></td>
                                                    <td><?php echo $r['DescReto'];?></td>
                                                    <?php if($datos['equipo'] != null){ ?>
                                                    <td><a href="p_prop_sol.php?reto=<?php echo $r['idReto']; ?>"><i class="pe-7s-paper-plane"></i></a></td>
                                                    <td><a href="p_sol.php?reto=<?php echo $r['idReto']; ?>"><i class="pe-7s-check"></i></a></td>
                                                    <?php } ?>
                                                </tr>
                                                <?php }
                                                }?>
                                            </tbody>
                                        </table>

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