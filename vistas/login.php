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
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hackaton</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
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
                        <?php foreach ($retos as $r){
                        if($r['Aceptado'] == true){?>
                    <section class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                     <div id="card"> 
                      <div class="front"> 
                        <h3><?php echo $r['idReto'];?></h3>
                      </div> 
                      <div class="back">
                        <h3><?php echo $r['DescReto'];?></h3>
                      </div> 
                    </div>
                         </section>  

                        <?php }
                        }?>
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
                    <ul class="actions col-sm-6 col-sm-offset-3 social-login">
                        <li><a href="#" class="button"><?php echo $idioma['volver_login'];?></a></li>
                    </ul>
                </footer>
            
            </div>
        </section>
        <!-- Javascript -->      
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdn.rawgit.com/nnattawat/flip/v1.0.19/dist/jquery.flip.min.js"></script>
    <script>
        $("#card").flip({
          axis: 'y',
          trigger: 'click'
        });
        $("#card").flip({reverse: true});
        $("#card").flip({reverse: false});
    </script>
        <script src="../js/jquery-1.11.1.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/md5.js" type="text/javascript"></script> 
        <script>
            function cifrar(){
                var input_pass = document.getElementById("pass");
                input_pass.value = hex_md5(input_pass.value);
            }
        </script>
    </body>
</html>