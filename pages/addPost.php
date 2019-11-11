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
        <div class='bgded overlay'>
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
                    <li><a href="addPost.php">Posta gehitu</a></li>
                </ul>
                <!-- ################################################################################################ -->
            </div>
        </div>
        <!-- ----------------- -->
        
        <!-- ################################################################################################ -->
        <div class="wrapper row4 bgded overlay" style="background-image:url('../images/demo/backgrounds/fondoRegistro.jpg');">
            <div id="footer" class="hoc clear">
                <!-- ################################################################################################ -->
                <div class="one_third">
                    <h6 class="heading">POST BERRIA</h6>
                    
                    <!-- FORM REGISTRO PHP -->
                    <form method="post" action="<?php $SERVER['PHP_SELF']?>">
                        <fieldset>
                            <legend>Newsletter:</legend>
                            <input class="btmspace-15" type="text" placeholder="Titulua" name="titulua"  id="titulua" pattern="[A-Za-zñÑ ]{1,20}" minlength="2" maxlength="20" required>
                            <input class="btmspace-15" type="text" placeholder="Laburpena" name="laburpena" id="laburpena" pattern="[A-Za-zñÑ0-9 ]{1,20}" minlength="5" maxlength="50" required>
                            <input class="btmspace-15" type="text" placeholder="Deskribapena" name="deskribapena" id="deskribapena" pattern="[A-Za-zñÑ0-9 ]{1,40}" minlength="10" maxlength="100" required>
                            <input class="btmspace-15" type="text" placeholder="Argazkia" name="argazkia" id="argazkia" pattern="[A-Za-zñÑ0-9/ ]{1,40}" minlength="5" maxlength="100" required>

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
        

        <?php
            if(!isset($_POST["titulua"]) || !isset($_POST["deskribapena"]) || !isset($_POST["argazkia"]) || !isset($_POST["laburpena"]) || !isset($_POST["enviar"])) exit();

            #Si todo va bien, se ejecuta esta parte del código...
            include_once "../BD/conexionBD.php";
            $sortzailea = $_SESSION['usuario'];
            $titulua = $_POST["titulua"];
            $laburpena = $_POST["laburpena"];
            $deskribapena = $_POST["deskribapena"];
            $argazkia = $_POST["argazkia"];
            
            // COMPROBACIONES DB
            $temaExist = comprobarTema($conexionBD, $titulua);
            
            if($temaExist == false){
                insertarTema($conexionBD, $titulua, $sortzailea, $laburpena, $deskribapena, $argazkia);       
            } else{
                echo "<h3>Fail insertar el tema</h3>";
            }          
        
            // Comprobaremos si el tema ya metido existe en la base de datos
            function comprobarTema($conexionBD, $titulua){
                $sql = "SELECT * FROM gaia WHERE titulua='$titulua'";

                foreach ($conexionBD->query($sql) as $row) {
                    echo "<h3>Tema -- $titulua -- ya existe</h3>";
                    return true;
                }
                echo "<h3>Tema -- $titulua -- NO existe</h3>";
                return false;
            }

            // Despues de hacer las comprobaciones, insertamos a la base de datos
            function insertarTema($conexionBD, $titulua, $sortzailea, $laburpena, $deskribapena, $argazkia) {
                $sentencia = $conexionBD-> prepare("INSERT INTO gaia(erabiltzaile_iz, titulua, laburpena, deskribapena, admin) VALUES (?, ?, ?, ?);");
                $resultado = $sentencia-> execute([$sortzailea, $titulua, $laburpena, $deskribapena]); 
                
                if($resultado == true){
                    echo "<h3>Tema insertado correctamente</h3>";
                    insertarFoto($conexionBD, $titulua, $sortzailea, $argazkia);
                } else{
                    echo "<h3>FAIL</h3>";
                }     
            }

            function insertarFoto($conexionBD, $titulua, $sortzailea, $argazkia){
                $sql = "SELECT * FROM gaia WHERE titulua='$titulua'";

                foreach ($conexionBD->query($sql) as $row) {
                    $id_gaia = $row['id_gaia'];                
                }

                $sentencia = $conexionBD-> prepare("INSERT INTO argazkia(id_gaia, izena, url) VALUES (?, ?, ?);");
                $resultado = $sentencia-> execute([$id_gaia, $sortzailea, $argazkia]); 
                
                if($resultado == true){
                    echo "<h3>Foto insertado correctamente</h3>";
                } else{
                    echo "<h3>FAIL</h3>";
                }   

                echo "<h3>Tema -- $titulua -- NO existe</h3>";

            }            

    
                        
        ?>

         <!-- FOOTER -->
        <?php include 'footer.php';?>   

</body>

</html>