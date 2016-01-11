<!--
======================================================================
Barra lateral de cada usuario
Funcion que con las variables se selecciona la pestaña actual segun la vista que lo llame

Creado por: Andrea Sanchez
Fecha: 07/01/2016
======================================================================
-->

<?php function a_sidebar($perfil, $sedes, $usuarios, $retos, $ps, $pn){ ?>
    <div class="sidebar" data-color="purple" data-image="../../light-template/img/sidebar-5.jpg">    
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    ADMIN
                </a>
            </div>

            <ul class="nav">
                <li <?php echo $perfil;?> >
                    <a href="../Sidebars/perfil.php">
                        <i class="pe-7s-user"></i> 
                        <p>Perfil</p>
                    </a>
                </li> 
                <li <?php echo $sedes;?>>
                    <a href="../admin/a_menu.php">
                        <i class="pe-7s-graph"></i> 
                        <p>Gestión de sedes</p>
                    </a>            
                </li>
                <li <?php echo $usuarios;?>>
                    <a href="../admin/a_usuarios.php">
                        <i class="pe-7s-note2"></i> 
                        <p>Gestión de usuarios</p>
                    </a>        
                </li>
                <li <?php echo $retos;?>>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i> 
                        <p>Gestion de retos</p>
                    </a>        
                </li>
                <li <?php echo $ps;?>>
                    <a href="icons.html">
                        <i class="pe-7s-science"></i> 
                        <p>Gestión de premios sede</p>
                    </a>        
                </li>
                <li <?php echo $pn;?>>
                    <a href="maps.html">
                        <i class="pe-7s-map-marker"></i> 
                        <p>Gestión de premios nacionales</p>
                    </a>        
                </li>
            </ul> 
        </div>
    </div>
<?php }?>