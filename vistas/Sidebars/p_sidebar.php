<!--
======================================================================
Barra lateral de cada usuario
Funcion que con las variables se selecciona la pestaña actual segun la vista que lo llame

Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->

<?php function p_sidebar($perfil, $equipos, $retos){ ?>
    <div class="sidebar" data-color="blue" data-image="../../light-template/img/sidebar-2.jpg">    
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    PARTICIPANTE
                </a>
            </div>

            <ul class="nav">
                <li <?php echo $perfil;?> >
                    <a href="../Sidebars/perfil.php">
                        <i class="pe-7s-user"></i> 
                        <p>Perfil</p>
                    </a>
                </li> 
                <li <?php echo $equipos;?>>
                    <a href="../participante/p_equipos.php">
                        <i class="pe-7s-graph"></i> 
                        <p>Gestión de equipos</p>
                    </a>            
                </li>
                <li <?php echo $retos;?>>
                    <a href="../participante/p_menu.php">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Retos</p>
                    </a>            
                </li>
            </ul> 
        </div>
    </div>
<?php }?>