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
include '../../modelo/model_usuario.php';
$usu = new Usuario();
$idUsuario = $_SESSION['login_usuario'];
$perfil = $usu->consultar($idUsuario);
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
                            <a class="navbar-brand" href="#"><?php echo $idioma['perfil'];?></a>
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
                                    <h4 class="title"><?php echo $idioma['editar_perfil'];?></h4>
                                </div>
                                <div class="content">
                                    <form action='../../controladores/ctrl_perfil.php' method='post'>
                                        <div class="row">
                                            <!-- Login -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['login_usuario'];?></label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $perfil['idUsuario']; ?>">
                                                    <input name="login" type="hidden" value="<?php echo $perfil['idUsuario']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Sede -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['registro_sede'];?></label>
                                                    <input type="text" class="form-control" disabled value="<?php echo $perfil['sede']; ?>">
                                                    <input name="sede" type="hidden" value="<?php echo $perfil['sede']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Rol -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['rol'];?></label>
                                                    <input disabled type="text" class="form-control" value="<?php echo $perfil['rol']; ?>">
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <!-- Nombre -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['registro_nombre'];?></label>
                                                    <input name="nombre" type="text" class="form-control" value="<?php echo $perfil['nombre']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Email -->
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"><?php echo $idioma['registro_email'];?></label>
                                                    <input name="email" type="email" class="form-control" value="<?php echo $perfil['email']; ?>">
                                                </div>        
                                            </div>
                                            <!-- Idioma -->
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label><?php echo $idioma['idioma'];?></label>
                                                    <?php if($perfil['idioma'] == 'esp'){ ?>
                                                    <select type="text" name='idioma' class="form-control">
                                                        <option value='esp' selected>Español</option>
                                                        <option value='eng'>English</option>
                                                    </select>
                                                    <?php } else{ ?>
                                                    <select type="text" name='idioma' class="form-control">
                                                        <option value='esp'>Español</option>
                                                        <option value='eng' selected>English</option>
                                                    </select>
                                                    <?php } ?>
                                                </div>        
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"><?php echo $idioma['registro_pass'];?></label>
                                                <input id="oldPass" name="oldPass" type="password" required class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="exampleInputEmail1"><?php echo $idioma['nueva_pass'];?></label>
                                                <input id="newPass" name="newPass" type="password" class="form-control">
                                            </div>
                                        </div>

                                        <button type="submit" onclick="cifrar()" class="btn btn-info btn-fill pull-right"><?php echo $idioma['editar_perfil']; ?></button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <form action='../../controladores/ctrl_perfil_del.php' method='post'>
                                <button type="submit" class="btn btn-danger btn-fill"><?php echo $idioma['eliminar_perfil']; ?></button>
                            </form>
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
        
        <script src="../../js/md5.js" type="text/javascript"></script> 
        <script>
            function cifrar(){
                var input_oldPass = document.getElementById("oldPass");
                input_oldPass.value = hex_md5(input_oldPass.value);
                var input_newPass = document.getElementById("newPass");
                input_newPass.value = hex_md5(input_newPass.value);
            }
        </script>
    </body>
    <?php include_once '../footers.php';?>
</html>