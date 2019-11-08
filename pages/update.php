<?php
  // INICIAMOS LA SESION
  session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Blog Tattoo | Erregistroa </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

     <!-- JAVASCRIPTS -->
     <script src="../layout/scripts/jquery.min.js"></script>
     <script src="../layout/scripts/jquery.backtotop.js"></script>
     <script src="../layout/scripts/jquery.mobilemenu.js"></script>
     <script src="../layout/scripts/jquery.fitvids.js"></script>
     <script src="../js/validacion.js"></script>
</head>

<body id="top">
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row0">
        <div id="topbar" class="hoc clear">
            <!-- ################################################################################################ -->
            <ul>
                <li><i class="fa fa-clock-o"></i> Mon. - Fri. 8am - 5pm</li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
                <li><a href="#"><i class="fa fa-lg fa-home"></i></a></li>
                <?php
                    if(!isset($_SESSION['usuario'])){
                ?>
                    <!-- Si la sesion no esta iniciada -->
                    <li><a href='#' title='Login' id='btnLogin'><i class='fa fa-lg fa-sign-in'></i></a></li>
                
                <?php
                    } else{
                    echo $_SESSION['usuario'];
                ?>              
                    <li><a href='../php/logout.php' title='Logout' id='btnLogout'><i class='fa fa-lg fa-sign-out'></i></a></li>
                    
                <?php
                    }
                ?>       
                
                <li><a href="registro.html" title="Sign Up"><i class="fa fa-lg fa-edit"></i></a></li>
            </ul>
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- Top Background Image Wrapper -->
    <div class='bgded overlay' style="background-image:url('../images/demo/backgrounds/04.png');">
        <!-- ################################################################################################ -->
        <div class="wrapper row1">
            <header id="header" class="hoc clear">
                <!-- ################################################################################################ -->
                <div id="logo" class="fl_left">
                    <h1><a href="../index.html">Blog Tattoo</a></h1>
                </div>
                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li class="active"><a href="../index.html">Home</a></li>
                        <li><a class="drop" href="#">Pages</a>
                            <ul>
                                <li><a href="pages/gallery.html">Gallery</a></li>
                                <li><a href="pages/full-width.html">Full Width</a></li>
                                <li><a href="pages/sidebar-left.html">Sidebar Left</a></li>
                                <li><a href="pages/sidebar-right.html">Sidebar
                                        Right</a></li>
                                <li><a href="pages/basic-grid.html">Basic
                                        Grid</a></li>
                            </ul>
                        </li>
                        <li><a class="drop" href="#">Dropdown</a>
                            <ul>
                                <li><a href="#">Level 2</a></li>
                                <li><a class="drop" href="#">Level 2 + Drop</a>
                                    <ul>
                                        <li><a href="#">Level 3</a></li>
                                        <li><a href="#">Level 3</a></li>
                                        <li><a href="#">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Level 2</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Link Text</a></li>
                        <li><a href="#">Link Text</a></li>
                    </ul>
                </nav>
                <!-- ################################################################################################ -->
            </header>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/backgrounds/fondoRegistro.jpg');">
            <footer id="footer" class="hoc clear">
                <!-- ################################################################################################ -->
                <div class="one_third">
                    <?php
                        $nombreUsuario = $_SESSION['usuario'];

                        include_once "../BD/conexionBD.php";
                       /*seleccionaremos los datos del usuario de la BD y los mostraremos para modificar*/
                       $sql = "SELECT * FROM erabiltzailea WHERE erabiltzaile_iz = '$nombreUsuario'";
           
                       foreach ($conexionBD->query($sql) as $row) {
                           $usuario = $row['erabiltzaile_iz'];
                           $izena = $row['izena'];
                           $abizena = $row['abizena'];
                           $email = $row['email'];
                           $pasahitza = $row['pasahitza'];
           
                           echo "<h1>$usuario</h1>";
                       }
                    
                    ?>
                       <!--creamos un form con los posibles datos a modificar-->
                       <!-- // GUARDAR DATOS DE PERFIL -->

                   <form method="POST" action="../php/datosPerfil.php">
                       <div name="DatosUsuario">
                           <h3>datos de perfil</h3>
                           <ul>
                                <li>
                                    <label>Izena</label>
                                    <input class="btmspace-15" type="text" name="nombre" id="nombre" placeholder="<?php echo $izena; ?>">                                                       
                                    <input type="hidden" name="nombreBD" value="<?php echo $izena; ?>"> 
                                </li>

                                <li>
                                    <label>Abizena</label>
                                    <input class="btmspace-15" type="text" name="apellido" id="apellido" placeholder="<?php echo $abizena; ?>">                                
                                    <input type="hidden" name="apeBD" value="<?php echo $abizena; ?>">
                                </li> 

                                <li>

                                    <label>Email</label>
                                    <input class="btmspace-15" type="text" name="correo" placeholder="<?php echo $email; ?>">                                    
                                    <input type="hidden" name="correoBD" value="<?php echo $email; ?>"> 
                                </li>

                                <li>
                                    <label>Pasahitza</label>
                                    <input class="btmspace-15" type="password" name="PssActual" placeholder="***********">           
                               </li>
                           </ul>  
                       </div>
                       <input type="submit" value="guardar" name="guardar1">
                
                       
                       <!-- // GUARDAR DATOS DE PERFIL -->
                       <div name="DatosUsuario">
                           <h3>datos de usuario</h3>
                           <ul>
                               <li>
                                <label>contraseña actual</label> 
                                <input class="btmspace-15" type="text" name="contraseña" id="pss" placeholder="*************">
                               </li>

                               <li> 
                                    <label>nueva cotraseña</label>
                                    <input class="btmspace-15" type="password" name="nuevaContra" id="pss">
                                </li>

                               <li> 
                                    <label>repetir nueva contraseña</label>
                                    <input class="btmspace-15" type="password" name="repetirNueva">
                               </li>
                                                                           
                                <input type="hidden" name="contraseñaAntigua" value="<?php echo $pasahitza; ?>">
                           </ul>  
                       </div>
                       <input type="submit" value="guardar" name="guardar2">
                   </form>
                </div>
                <!-- ################################################################################################ -->
            </footer>
        </div>
        <!-- FOOTER -->
        <!-- ################################################################################################ -->
        <div class="wrapper row5">
            <div id="copyright" class="hoc clear">
                <!-- ################################################################################################ -->
                <p class="fl_left">Copyright &copy; 2018 - All Rights
                    Reserved - <a href="#">Domain Name</a></p>
                <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/"
                        title="Free Website Templates">OS Templates</a></p>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>

</body>

</html>