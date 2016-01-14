<!--
======================================================================
Barra lateral de cada usuario
Funcion que con las variables se selecciona la pestaña actual segun la vista que lo llame

Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->

<?php function jn_sidebar($perfil, $vn){
    $lang = $_SESSION['idioma'];

    if($lang == "esp"){
        include "../../modelo/esp.php";
    }else{
        include "../../modelo/eng.php";
    }
?>
    <div class="sidebar" data-color="green" data-image="../../light-template/img/sidebar-3.jpg">    
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    <?php echo $idioma['jurado_nacional']; ?>
                </a>
            </div>

            <ul class="nav">
                <li <?php echo $perfil;?> >
                    <a href="../Sidebars/perfil.php">
                        <i class="pe-7s-user"></i> 
                        <p><?php echo $idioma['perfil']; ?></p>
                    </a>
                </li> 
                <li <?php echo $vn;?>>
                    <a href="../jurado_nacional/jn_menu.php">
                        <i class="pe-7s-graph"></i> 
                        <p><?php echo $idioma['gestion_votos_nacional']; ?></p>
                    </a>            
                </li>
            </ul> 
        </div>
    </div>
<?php }?>