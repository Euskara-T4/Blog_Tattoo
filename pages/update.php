<?php
    // INICIAMOS LA SESION
    session_start();
?>

<!DOCTYPE html>

<html lang='es'>
<!-- HEADER.PHP -->

    <head>
        <title>Blog Tattoo</title>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
        <link href='../layout/styles/layout.css' rel='stylesheet' type='text/css' media='all'>

        <!-- JAVASCRIPTS -->
        <script src='../js/login.js'></script>
        <script src="../layout/scripts/jquery.min.js"></script>
        <script src="../layout/scripts/jquery.backtotop.js"></script>
        <script src="../layout/scripts/jquery.mobilemenu.js"></script>
        <script src="../layout/scripts/jquery.fitvids.js"></script>
    </head>

    <body id='top'>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class='wrapper row0'>
            <div id='topbar' class='hoc clear'>
                <!-- ################################################################################################ -->
                <ul>
                    <li><i class='fa fa-clock-o'></i> Mon. - Fri. 8am - 5pm</li>
                    <li><i class='fa fa-phone'></i> +00 (123) 456 7890</li>
                    <li><i class='fa fa-envelope-o'></i> info@domain.com</li>
                    
                    <!-- ################################################################################################ -->
                    <!-- USER ACTION ICONS -->
                    <?php
                        if(isset($_SESSION['usuario'])){          
                    ?>
                            <li><a href='update.php' title='Perfila'><i class='fa fa-lg fa-home'></i></a></li>            
                    <?php
                            echo $_SESSION['usuario'];
                    ?>
                            <li><a href='#' title='Irten' id='btnLogout'><i class='fa fa-lg fa-sign-out'></i></a></li>
                    
                    <?php
                            if($_SESSION['adminRol'] == 1 || $_SESSION['adminRol'] == 2){
                            ?>
                                <li><a href='ajusteak.php' title='Ajusteak' id='btnSettings'><i class='fa fa-lg fa-cog'></i></a></li>
                                <li><a href='addPost.php' title='Posta gehitu' id='btnPost'><i class='fa fa-lg fa-plus-square'></i></a></li>
            
                            <?php
                            }          
                    
                        } else {        
                    ?>
                        <li><a href='#' title='Logeatu' id='btnLogin'><i class='fa fa-lg fa-sign-in'></i></a></li>
                    <?php
                        }
                    ?>
                    <!-- -------------------------------------- -->
                    
                    <li><a href='registro.php' title='Sortu'><i class='fa fa-lg fa-user-plus'></i></a></li>
                </ul>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
    
        <!-- LOGIN MODAL -->
        <div id='loginModal' class='modal'>
            <form class='modal-content animate' action='../php/login.php' method='post'>
                <!-- ################################################################################################ -->
                <div class='imgcontainer'>
                    <span class='close' id='close' title='Close Modal'>&times;</span>
                    <img src='../images/demo/avatar.png' alt='Avatar' class='avatar'>
                </div>
        
                <div class='logContainer'>
                    <label for='erabiltzaile_iz'><b>Erabiltzaile izena:</b></label>
                    <input type='text' placeholder='Sartu erabiltzailea' name='erabiltzaile_iz' required>
        
                    <label for='psw'><b>Pasahitza:</b></label>
                    <input type='password' placeholder='Sartu pasahitza' name='pasahitza' required>
                    <!-- <label>
                        <input type='checkbox' checked='checked' name='remember'> Remember me
                    </label> -->
                </div>
        
                <div class='btnContainer'>
                    <button type='submit' class='loginBtn' id='loginBtn'>Login</button>
                    <button type='button' class='cancelBtn' id='cancelBtn'>Cancel</button>
                </div>
            </form>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- Top Background Image Wrapper -->
        <div class='bgded overlay' style="background-image:url('../images/demo/backgrounds/fondoNegro.jpg');">
            <!-- ################################################################################################ -->
            <div class='wrapper row1'>
                <header id='header' class='hoc clear'>
                    <div id='logo' class='fl_left'>
                        <h1><a href='index.php'>Blog Tattoo</a></h1>
                    </div>
        
                    <!-------------------------------------------------->
                    <!------------------- NAVBAR ----------------------->
                    <!-------------------------------------------------->
        
                    <nav id='mainav' class='fl_right'>
                        <ul class='clear'>
                            <li><a href='index.php'>Hasiera</a></li>
                            <li><a href='blog.php'>Blog</a></li>
                            <!-- <li><a class='drop' href='#'>Galeria</a>
                                <ul>
                                    <li><a href='galeriaByN.html'>Zuri beltzak</a></li>
                                    <li><a href='galeriaColor.php'>Kolorez</a></li>
                                    <li><a class='drop' href='#'>Artistak</a>
                                    <ul>
                                        <li><a href='galeriaIvanP.html'>Ivan Pelegrin</a></li>
                                        <li><a href='#'>Ivan Morant</a></li>
                                        <li><a href='#'>Kat Von D</a></li>
                                    </ul>
                                    </li>
                
                                </ul>
                            </li> -->
                            <li><a href='aboutUs.php'>Guri buruz</a></li>
                        </ul>
                    </nav>
                    <!-- ################################################################################################ -->
                </header>
            </div>
            <!-- ################################################################################################ -->
            <!-- MIGAS -->
            <div class="migas">
              <div id="breadcrumb" class="hoc clear">
                  <!-- ################################################################################################ -->
                  <ul>
                      <li><a href="index.php">Hasiera</a></li>
                      <li><a href="update.php">Perfila</a></li>
                  </ul>
                  <!-- ################################################################################################ -->
              </div>
            </div>
            <!-- ----------------- -->
        </div>

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
                    <div class="datos">
                        <form method="POST" action="../php/datosPerfil.php">
                            <div class="divUser">
                                <h3>ERABILTZAILEAREN DATUAK</h3>
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
                            
                                <button type="submit" name="guardar1" id="enviar">Gorde</button>

                            </div>

                    
                        
                            <!-- // GUARDAR DATOS DE PERFIL -->
                            <div class="divUser">
                                <h3>PASAHITZAREN DATUAK</h3>
                                <ul>
                                    <li>
                                        <label>Pasahitza</label> 
                                        <input class="btmspace-15" type="text" name="contraseña" id="pss" placeholder="*************">
                                    </li>

                                    <li> 
                                        <label>Pasahitza berria</label>
                                        <input class="btmspace-15" type="password" name="nuevaContra" id="pss">
                                    </li>

                                    <li> 
                                        <label>Pasahitza berria berriro</label>
                                        <input class="btmspace-15" type="password" name="repetirNueva">
                                    </li>
                                                                                
                                    <input type="hidden" name="contraseñaAntigua" value="<?php echo $pasahitza; ?>">
                                </ul>  

                                <button type="submit" name="guardar2" id="enviar">Gorde</button>

                            </div>

                        </form>
                    </div>
                </div>
                <!-- ################################################################################################ -->
            </footer>
        </div>
       
        <!-- FOOTER -->
        <?php include 'footer.php';?>   

</body>

</html>