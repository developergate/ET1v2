<!--
======================================================================
Modificar un usuario
Creado por: Andrea Sanchez
Fecha: 11/01/2016
======================================================================
-->
<!doctype html>
<html lang="en">
    <?php
    include_once('../../controladores/ctrl_permisos.php');
    $includeIdioma = permisos("admin", "../../");
    include_once $includeIdioma;
    $idUsuario = $_GET['usu'];
    include_once "../../modelo/model_usuario.php";
    $usu = new Usuario();
    $usuario = $usu->consultar($idUsuario);
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
                            <a class="navbar-brand" href="#"><?php echo $idioma["gestion_usuarios"]; ?></a>
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
                                        <h4 class="title"><?php echo $idioma["modificar_usuario"]; ?></h4>
                                    </div>
                                    <div class="content">
                                        <form action='../../controladores/admin/ctrl_a_usu_mod.php' method='post'>
                                            <div class="row">
                                                <!-- Login -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Login</label>
                                                        <input type="text" disabled class="form-control" value="<?php echo $idUsuario; ?>">
                                                        <input type="hidden" name="login" value="<?php echo $idUsuario; ?>">
                                                    </div>        
                                                </div>
                                                <!-- Nombre -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_nombre"]; ?></label>
                                                        <input type="text" class="form-control" name="nombre" value="<?php echo $usuario['nombre']; ?>">
                                                    </div>        
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <!-- Email -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_email"]; ?></label>
                                                        <input type="email" name="email" class="form-control" value="<?php echo $usuario['email']; ?>">
                                                    </div>        
                                                </div>
                                                <!-- Contrasenha -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_pass"]; ?></label>
                                                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <!-- Rol -->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["rol"]; ?></label>
                                                        <select type="text" name='rol' class="form-username form-control">
                                                        <?php switch ($usuario['rol'])
                                                            {
                                                                case 'admin':
                                                                ?> 
                                                                    <option value='admin' selected><?php echo $idioma["admin"]; ?></option>
                                                                    <option value='juradoNacional'><?php echo $idioma["usu_jn"]; ?></option>
                                                                    <option value='juradoSede'><?php echo $idioma["usu_js"]; ?></option>
                                                                    <option value='participante'><?php echo $idioma["usu_p"]; ?></option>
                                                                <?php
                                                                    break;
                                                                case 'juradoNacional':
                                                                ?> 
                                                                    <option value='admin'><?php echo $idioma["admin"]; ?></option>
                                                                    <option value='juradoNacional' selected><?php echo $idioma["usu_jn"]; ?></option>
                                                                    <option value='juradoSede'><?php echo $idioma["usu_js"]; ?></option>
                                                                    <option value='participante'><?php echo $idioma["usu_p"]; ?></option>
                                                                <?php
                                                                    break;
                                                                case 'juradoSede':
                                                                ?> 
                                                                    <option value='admin'><?php echo $idioma["admin"]; ?></option>
                                                                    <option value='juradoNacional'><?php echo $idioma["usu_jn"]; ?></option>
                                                                    <option value='juradoSede' selected><?php echo $idioma["usu_js"]; ?></option>
                                                                    <option value='participante'><?php echo $idioma["usu_p"]; ?></option>
                                                                <?php
                                                                    break;
                                                                case 'participante':
                                                                ?> 
                                                                    <option value='admin'><?php echo $idioma["admin"]; ?></option>
                                                                    <option value='juradoNacional'><?php echo $idioma["usu_jn"]; ?></option>
                                                                    <option value='juradoSede'><?php echo $idioma["usu_js"]; ?></option>
                                                                    <option value='participante' selected><?php echo $idioma["usu_p"]; ?></option>
                                                                <?php
                                                                    break;
                                                            }
                                                        ?>
                                                        </select>
                                                    </div>        
                                                </div>
                                                <!-- Sedes -->
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["registro_sede"];?></label>
                                                        <select type="text" name='sede' class="form-username form-control">
                                                        <?php foreach ($sedes as $s){ 
                                                            if($s['idSede'] == $usuario['sede']){?>
                                                            <option value='<?php echo $s['idSede'];?>' selected><?php echo $s['idSede'];?>
                                                            </option>
                                                            <?php } else{?>
                                                            <option value='<?php echo $s['idSede'];?>'><?php echo $s['idSede'];?>
                                                            </option>
                                                            <?php }
                                                         }?>
                                                        </select>
                                                    </div>        
                                                </div> 
                                                <!-- Idioma -->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label><?php echo $idioma["idioma"]; ?></label>
                                                        <?php if($usuario['idioma'] == 'esp'){ ?>
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

                                            <button type="submit" onclick="cifrar()" class="btn btn-info btn-fill pull-right"><?php echo $idioma["modificar"]; ?></button>
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