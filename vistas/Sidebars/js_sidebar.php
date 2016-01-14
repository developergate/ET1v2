<!--
======================================================================
Barra lateral de cada usuario
Funcion que con las variables se selecciona la pestaña actual segun la vista que lo llame

Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->

<?php function js_sidebar($perfil, $vs){ 
    $lang = $_SESSION['idioma'];

    if($lang == "esp"){
        include "../../modelo/esp.php";
    }else{
        include "../../modelo/eng.php";
    }
?>
    <div class="sidebar" data-color="orange" data-image="../../light-template/img/sidebar-4.jpg">    
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?php echo $idioma['jurado_sede']; ?>
                </a>
            </div>

            <ul class="nav">
                <li <?php echo $perfil;?> >
                    <a href="../Sidebars/perfil.php">
                        <i class="pe-7s-user"></i> 
                        <p><?php echo $idioma['perfil']; ?></p>
                    </a>
                </li> 
                <li <?php echo $vs;?>>
                    <a href="../jurado_sede/js_menu.php">
                        <i class="pe-7s-graph"></i> 
                        <p><?php echo $idioma['gestion_votos_sede']; ?></p>
                    </a>            
                </li>
            </ul> 
        </div>
    </div>
<?php }?>