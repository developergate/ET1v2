<!--
======================================================================
Pagina para crear una sede publicamente
Creado por: David Ansia
Fecha: 07/01/2016
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
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', 'class="active"', '', '', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Gestion de sedes</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="../../controladores/ctrl_log_out.php">
                                        Log out
                                    </a>
                                </li> 
                            </ul>
                        </div>
                    </div>
                </nav>
                
    
        <!-- Top content -->
                    <!-- TITULO -->
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong><?php echo $idioma["nueva_sede"]; ?></strong> </h1>
                        </div>
                    </div>
                    <!-- Formulario -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><?php echo $idioma["reto_introduce"]; ?></h3>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <!-- Campos del formulario -->
                                <form role="form" id="login" action="../controladores/ctrl_nueva_sede.php" method="post" class="login-form">
                                    <!-- sede id -->
                                    <div class="form-group">
                                        <input type="text" name="titulo" placeholder="<?php echo $idioma["id_Sede"];?>" class='form-username form-control' id="form-username">
                                        <!--Pasar el idioma seleccionado-->
                                        <input type="hidden" id="language" name='language' value="<?php echo $_GET['lang']; ?>">
                                    </div>
                                    <!-- botón crear -->
                                    <button type="submit" class="btn" onclick="cifrar()" name='accion' value="Entrar">
                                        <?php echo $idioma["crear"];?>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 idioma">
                            <!--  Las opciones de idioma -->
                            <label for="espanol">
                                <a href="./registro.php?lang=esp"><img class="ico-idioma" src="../img/ES.png"></a>
                            </label>
                            <label for="ingles">
                                <a href="./registro.php?lang=eng"><img class="ico-idioma" src="../img/EN.png"></a>
                            </label>
                            <a class="btn btn-link-1 btn-link-1-twitter" href="login.php">
                                <?php echo $idioma["registro_volver"];?>
                            </a>
                </div>
            </div>
        </div>
        </div>


        <!-- Javascript -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>