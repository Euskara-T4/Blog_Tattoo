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
                    <li><a href="aboutUs.php">Guri buruz</a></li>
                </ul>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ----------------- -->
        <!-- ################################################################################################ -->

        <footer id="footer" class="hoc clear">
            <!-- ################################################################################################ -->
            <div class="one_third first">
                <h6 class="heading">Non gaude</h6>
                <ul class="nospace btmspace-30 linklist contact">
                <li><i class="fa fa-map-marker"></i>
                    <address>
                    Street Name &amp; Number, Town, Postcode/Zip
                    </address>
                </li>
                <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
                </ul>
            </div>
            <!------------------------>
            <!-- MAPA DEL INSTITUTO -->
            <!------------------------>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2905.6865514897463!2d-2.9053552849856654!3d43.257990685914905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4e4fac87437727%3A0x364f27e82def0130!2sCIFP%20Txurdinaga%20LHII!5e0!3m2!1ses!2ses!4v1571830347683!5m2!1ses!2ses" width="315" height="315" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            <!-- ################################################################################################ -->
        </footer>

        <!-- FOOTER -->
        <?php include 'footer.php';?>   
  </body>

</html>