<!--
======================================================================
Perfil de cada usuario
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->

<?php
session_start();
$lang = $_SESSION['idioma'];

if($lang == "esp"){
    include "../../modelo/esp.php";
}else{
    include "../../modelo/eng.php";
}
?>

<!doctype html>
<html lang="en">
    <?php include_once '../headers.php';?>
    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once 'selector_perfil.php'; ?>
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


                <div class="content">
                    <!-- CONTENIDO -->
                    <div class="container-fluid">
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Edit Profile</h4>
                                    </div>
                                    <div class="content">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Sede (disabled)</label>
                                                        <input type="text" class="form-control" disabled placeholder="Company" value="Creative Code Inc.">
                                                    </div>        
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" placeholder="Username" value="michael23">
                                                    </div>        
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" placeholder="Email">
                                                    </div>        
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" placeholder="Company" value="Mike">
                                                    </div>        
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
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
                        <p class="copyright pull-right"> &copy; 2016 Grupo 5, Hackaton</p>
                    </div>
                </footer>
            </div>   
        </div>
    </body>
    <?php include_once '../footers.php';?>
</html>