<!--
======================================================================
Formulario de registro. Envia los datos a Procesar registro.php
Creado por: Edgard Ruiz
Fecha: 27/12/2015
======================================================================
-->
<?php
$lang = $_GET["lang"];
if(!$lang){
    unset($lang);
    header('Location:../vistas/registro.php?lang=esp');
}else{
    if($lang == "esp"){
        unset($lang);
        include "../modelo/esp.php";
    }else{
        if($lang == "eng"){
            unset($lang);
            include "../modelo/eng.php";
        }else{
            unset($lang);
            include "../modelo/esp.php";
        }
    }
    include_once "../modelo/model_sede.php";
    $sede = new Sede();
    $sedes = $sede->listar();
}
?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once "headers.php";?>
    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <!-- TITULO -->
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>HACKATON</strong> </h1>
                            <div class="description">
                                <p>
                                    <?php echo $idioma["registro_introduccion"]; ?>
                                    <?php echo $idioma["registro_introduccion2"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Formulario de registro -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><?php echo $idioma["registro_registrate"]; ?></h3>
                                    <p><?php echo $idioma["registro_introduzca"];?></p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" id="login" action="../controladores/ctrl_procesar_registro.php" method="post" class="login-form">
                                    <!-- Login usuario -->
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $idioma["registro_usuario"];?>Usuario</label>
                                        <input type="text" name="login" placeholder="<?php echo $idioma["registro_usuario"];?>" class='form-username form-control' id="form-username">
                                        <!--Pasar el idioma seleccionado-->
                                        <input type="hidden" id="language" name='language' value="<?php echo $_GET['lang']; ?>">
                                    </div>
                                    <!-- Sede usuario -->
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $idioma["registro_sede"];?></label>
                                        <select type="text" name='sede' class="form-username form-control" id="form-username">
                                        <?php foreach ($sedes as $s){ ?>
                                            <option value='<?php echo $s['idSede'];?>'><?php echo $s['idSede'];?>
                                            </option>
                                        <?php }?>
                                    </div>
                                    <!-- Nombre real usuario -->
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $idioma["registro_nombre"];?></label>
                                        <input type="text" name="nombre" placeholder="<?php echo $idioma["registro_nombre"];?>" class="form-username form-control" id="form-username">
                                    </div>
                                    <!-- Contraseña -->
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password"><?php echo $idioma["registro_pass"];?></label>
                                        <input type="password" id="pass" name="pass" placeholder="<?php echo $idioma["registro_pass"];?>" class="form-password form-control" id="form-password">
                                    </div>
                                    <!-- email -->
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $idioma["registro_email"];?></label>
                                        <input type="text" name="email" placeholder="<?php echo $idioma["registro_email"];?>" class="form-username form-control" id="form-username">
                                    </div>

                                    <button type="submit" class="btn" onclick="cifrar()" name='accion' value="Entrar">
                                        <?php echo $idioma["registro_aceptar"];?>
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
                        </div>
                    </div>
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <a class="btn btn-link-1 btn-link-1-twitter" href="login.php">
                            <?php echo $idioma["registro_volver"];?>
                        </a>   
                    </div>
                </div>
            </div>
        </div>

        <?php include_once "footers.php";?>
        <script src="../js/md5.js" type="text/javascript"></script> 
        <script>
            function cifrar(){
                var input_pass = document.getElementById("pass");
                input_pass.value = hex_md5(input_pass.value);
            }
        </script>
    </body>
</html>