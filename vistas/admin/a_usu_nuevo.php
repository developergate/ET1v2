<!--
======================================================================
Crear un nuevo usuario
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
    include_once "../../modelo/model_sede.php";
    $sede = new Sede();
    $sedes = $sede->listar();
    ?>

    <body>
        <div class="wrapper">
            <!-- Barra de navegacion lateral -->
            <?php include_once '../Sidebars/a_sidebar.php'; a_sidebar('', '', 'class="active"', '', '', '');?>
            <div class="main-panel">
                <!-- Barra de logout superior -->
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">    
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#">Gestion de usuarios</a>
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

                <!-- CONTENIDO -->
                <div class="content">
                    <div class="container-fluid">  
                        <div class="row">
                            <div>
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title">Crear usuario</h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_usu_nuevo.php' method='post'>
                                            <div class="row">
                                                <!-- Login -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" required class="form-control" placeholder="Login" name="login">
                                                    </div>        
                                                </div>
                                                <!-- Nombre -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre</label>
                                                        <input type="text" required class="form-control" placeholder="Nombre" name="nombre">
                                                    </div>        
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="form-username">Email</label>
                                                        <input type="email" name="email" required class="form-control" placeholder="Email">
                                                    </div>        
                                                </div>
                                                
                                                <!-- Contrasenha -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input type="password" required id="pass" name="pass" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <!-- Rol -->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label>Rol</label>
                                                        <select type="text" name='rol' class="form-username form-control">
                                                            <option value='participante'>Participante</option>
                                                            <option value='juradoSede'>Jurado sede</option>
                                                            <option value='juradoNacional'>Jurado nacional</option>
                                                            <option value='admin'>Administrador</option>
                                                        </select>
                                                    </div>        
                                                </div>
                                                <!-- Sedes -->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_sede"];?></label>
                                                        <select type="text" name='sede' class="form-username form-control">
                                                        <?php foreach ($sedes as $s){ ?>
                                                            <option value='<?php echo $s['idSede'];?>'><?php echo $s['idSede'];?>
                                                            </option>
                                                        <?php }?>
                                                        </select>
                                                    </div>        
                                                </div>  
                                                 <!-- Idioma -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Idioma</label>
                                                        <select type="text" name='idioma' class="form-control">
                                                            <option value='esp' selected>Español</option>
                                                            <option value='eng'>English</option>
                                                        </select>
                                                    </div>        
                                                </div>
                                            </div>

                                            <button type="submit" onclick="cifrar()" class="btn btn-info btn-fill pull-right">Crear</button>
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
    <script src="../../js/md5.js" type="text/javascript"></script> 
        <script>
            function cifrar(){
                var input_pass = document.getElementById("pass");
                input_pass.value = hex_md5(input_pass.value);
            }
        </script>
    <?php include_once '../footers.php'; ?>
</html>