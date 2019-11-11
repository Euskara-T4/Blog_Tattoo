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
        <script src="../js/validacion.js"></script>
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
                    <li><i class='fa fa-phone'></i> 944 12 57 12</li>
                    <li><i class='fa fa-envelope-o'></i> idazkaria@fpTXurdinaga.com</li>
                    
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
                        <li><a class='drop' href='#'>Galeria</a>
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
                        </li>
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
                    <li><a href="registro.php">Erabiltzaile berria</a></li>
                </ul>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ----------------- -->

        <!-- ################################################################################################ -->
        <div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/backgrounds/fondoRegistro.jpg');">
            <footer id="footer" class="hoc clear">
                <!-- ################################################################################################ -->
                <div class="one_third">
                    <h6 class="heading">ERABILTZAILE BERRIA:</h6>
                    
                    <!-- FORM REGISTRO PHP -->
                    <form method="post" action="../php/registro.php">
                        <fieldset>
                            <legend>Newsletter:</legend>
                            <input class="btmspace-15" type="text" placeholder="Izena" name="nombre"  id="nombre" pattern="[A-Za-zñÑ ]{1,20}" minlength="2" maxlength="20" required>
                            <input class="btmspace-15" type="text" placeholder="Abizena" name="apellido"  id="apellido" pattern="[A-Za-zñÑ ]{1,30}" minlength="2" maxlength="30" required>
                            <input class="btmspace-15" type="text" placeholder="Erabiltzailea Izena" name="usuario" id="usuario" pattern="[A-Za-zñÑ0-9 ]{1,20}" minlength="5" maxlength="20" required>
                            <input class="btmspace-15" type="text" placeholder="Email" name="correo" id="correo" pattern="[A-Za-z.0-9-_]{1,20}[@][a-z]{1,20}[.][a-z]{1,3}" minlength="10" maxlength="50" required>
                            <input class="btmspace-15" type="password" placeholder="Pasahitza" name="contraseña" id="contraseña" pattern="[A-Za-zÑñ0-9]{1,20}" minlength="5" maxlength="100" required>
                            <input class="btmspace-15" type="password" placeholder="Pasahitzaren Konfirmazioa" name="contraseña_confirm" id="contraseña2" pattern="[A-Za-zÑñ0-9]{1,20}" minlength="5" maxlength="100" required>
                           
                            <!-- Solo los administradores podran hacer esto -->
                            <?php
                                if(isset($_SESSION['usuario']) && $_SESSION["adminRol"] == 1 || isset($_SESSION['usuario']) && $_SESSION["adminRol"] == 2){
                            ?>
                                <input class="btmspace-15" type="text" placeholder="Administratzailearen Rola" name="admin" id="admin" pattern="[0-3]{1,1}" minlength="1" maxlength="1" required>
                            <?php
                              }
                            ?>



                            <p id="mensajeError"></p>

                            <div class="flex">
                                <button type="reset" value="borrar" id="borrar" class="flexBtn">BORRAR</button>
                                <button type="submit" value="submit" id="enviar" class="flexBtn">SORTU</button>
                            </div>

                        </fieldset>
                    </form>
                </div>
                <!-- ################################################################################################ -->
            </footer>
        </div>
        
        <!-- FOOTER -->
        <?php include 'footer.php';?>   

</body>

</html>