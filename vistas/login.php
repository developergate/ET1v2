<!--
======================================================================
Formulario de login. Envia los datos a ProcesarLogin.php
Creado por: Edgard Ruiz
Fecha: 27/12/2015
======================================================================
-->
<?php
$idioma = $_GET["lang"];
//Almacenamos la variable de idioma en $idioma
//en caso de que no haya ninguna por defecto será español

if(!$idioma){
    unset($idioma);
    header('Location:../vistas/login.php?lang=esp');
}else{
    //Si la variable es "esp" se  pondra en castellano
    if($idioma == "esp"){
        unset($idioma);
        include "../modelo/esp.php";
    }
    //En caso de que sea "eng" se pondrá en ingles
    else{
        if($idioma == "eng"){
            unset($idioma);
            include "../modelo/eng.php";
        }else{
            unset($idioma);
            include "../modelo/esp.php";
        }
    }
    include_once "../modelo/model_reto.php";
    $reto = new Reto();
    $retos = $reto->listar();
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
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>HACKATON</strong> </h1>
                            <div class="description">
                                <p>
                                    <?php echo $idioma["login_introduccion"]; ?>
                                    <?php echo $idioma["login_introduccion2"]; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3><?php echo $idioma["login_logueate"]; ?></h3>
                                    <p><?php echo $idioma["login_introduzca"];?></p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <form role="form" id="login" action="../controladores/ctrl_procesar_login.php" method="post" class="login-form">
                                    <div class="form-group">
                                        <label class="sr-only" for="form-username"><?php echo $idioma["login_usuario"];?></label>
                                        <input type="text" name="login" placeholder="<?php echo $idioma["login_usuario"];?>" class="form-username form-control" id="form-username">
                                    </div>
                                    <div class="form-group">
                                        <label class="sr-only" for="form-password"><?php echo $idioma["login_pass"];?></label>
                                        <input type="password" id="pass" name="pass" placeholder="<?php echo $idioma["login_pass"];?>" class="form-password form-control" id="form-password">
                                    </div>
                                    <button type="submit" class="btn" onclick="cifrar()" name='accion' value="Entrar"><?php echo $idioma["login_aceptar"];?></button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 idioma">
                            <!--  Las opciones de idioma -->
                            <label for="espanol"><a href="./login.php?lang=esp"><img class="ico-idioma" src="../img/ES.png"></a></label>
                            <label for="ingles"><a href="./login.php?lang=eng"><img class="ico-idioma" src="../img/EN.png"></a></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <a class="btn btn-link-1 btn-link-1-twitter" href="registro.php">
                                <?php echo $idioma["login_registrar"];?>
                            </a>
                            <h3><?php echo $idioma["login_or"];?></h3>
                            <h3><?php echo $idioma["login_visita"];?></h3>
                            <a href="#dos" id="movimiento" class="glyphicon glyphicon-chevron-down"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<!--
======================================================================
Seccion dos. Muestra los retos
======================================================================
-->
        <section id="dos" class="wrapper">
            <div class="container">
                <header>
                    <h2><?php echo $idioma['login_retos'];?></h2>
                    <p><?php echo $idioma['login_frase_retos'];?></p>
                </header>
                <div class="box alt">
                    <div class="row uniform">
                        <?php foreach ($retos as $r){ ?>
                        <section class="4u 6u(medium) 12u$(xsmall)">
                            <span class="glyphicon glyphicon-plus"></span>
                            <h3><?php echo $r['idReto'];?></h3>
                            <p><?php echo $r['DescReto'];?></p>
                        </section>
                        <?php }?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 social-login">
                        <a class="btn btn-link-1 btn-link-1-twitter" href="../vistas/nuevo_reto.php?lang=esp">
                            <?php echo $idioma["crear_reto"];?>
                        </a>
                    </div>
                </div>
                <footer class="major">
                    <ul class="actions">
                        <li><a href="#" class="button"><?php echo $idioma['volver_login'];?></a></li>
                    </ul>
                </footer>
            </div>
        </section>
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