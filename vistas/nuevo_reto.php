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
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hackaton</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/form-elements.css">
        <link rel="stylesheet" href="../css/style.css">


        <link rel="shortcut icon" href="./ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
    </head>
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
                                        <input type="text" name="titulo" placeholder="<?php echo $idioma["reto_nombre"];?>" class='form-username form-control' id="form-username">
                                        <!--Pasar el idioma seleccionado-->
                                        <input type="hidden" id="language" name='language' value="<?php echo $_GET['lang']; ?>">
                                    </div>
                                    <!-- Descripcion -->
                                    <div class="form-group">
                                        <textarea type="text" name="descripcion" placeholder="<?php echo $idioma["reto_descripcion"];?>" class="form-username form-control" id="form-username"></textarea>
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

        <!-- Javascript -->
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>