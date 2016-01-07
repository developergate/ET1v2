<!--
======================================================================
Pagina para crear un reto publicamente
Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->
<?php
$lang = $_GET["lang"];
if(!$lang){
    unset($lang);
    header('Location:../vistas/login.php?lang=esp');
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
                            <h1><strong><?php echo $idioma["crear_reto"]; ?></strong> </h1>
                        </div>
                    </div>
                    <!-- Formulario de registro -->
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
                                <form role="form" id="login" action="../controladores/ctrl_nuevo_reto.php" method="post" class="login-form">
                                    <!-- Titulo del reto -->
                                    <div class="form-group">
                                        <input type="text" name="titulo" placeholder="<?php echo $idioma["titulo_reto"];?>" class='form-username form-control' id="form-username">
                                        <!--Pasar el idioma seleccionado-->
                                        <input type="hidden" id="language" name='language' value="<?php echo $_GET['lang']; ?>">
                                    </div>
                                    <!-- Descripcion -->
                                    <div class="form-group">
                                        <textarea type="text" name="descripcion" placeholder="<?php echo $idioma["desc_reto"];?>" class="form-username form-control" id="form-username"></textarea>
                                    </div>
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
        </div>

        <?php include_once "footers.php";?>
    </body>
</html>