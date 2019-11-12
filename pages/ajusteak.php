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
        <script src='../js/edit.js'></script>
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
                      <li><a href="ajusteak.php">Ajusteak</a></li>
                  </ul>
                  <!-- ################################################################################################ -->
              </div>
            </div>
            <!-- ----------------- -->
        </div>

        <!-- ################################################################################################ -->

        <!-- ---------------------------------- -->
        <!-- TABLA DE USUARIOS -->
        <div id="settingsTable" class="hoc clear">
            <h2>ERABILTZAILEEN TAULA</h2>

            <table>
                <tr>
                    <th>Erabiltzailea</th>
                    <th>Izena</th>
                    <th>Abizena</th>
                    <th>Emaila</th>
                    <th>Pasahitza</th>
                    <th>Admin Rol</th>
                    <th>Aukerak</th>
                </tr>

                <tr>
                    
                    <?php
                        include_once "../BD/conexionBD.php";

                        // Comprobar que administrador ha entrado
                        if($_SESSION["adminRol"] == 2){
                            $sql = "SELECT * FROM erabiltzailea WHERE admin!=2";
                            
                        } else if($_SESSION["adminRol"] == 1){
                            $sql = "SELECT * FROM erabiltzailea WHERE admin=0";
                        }

                        foreach ($conexionBD->query($sql) as $row) {
                            $erabiltzaile_iz = $row['erabiltzaile_iz'];
                            $izena = $row['izena'];
                            $abizena = $row['abizena'];
                            $email = $row['email'];
                            $pasahitza = $row['pasahitza'];
                            $adminRol = $row['admin'];            
                    ?>
                            <form method="post" action="../php/ajustes.php">
                                <td id="erabiltzaileaTd"> <input class="inputSetting" type="text" id="erabiltzaileaTxt" name="erabiltzailea" value="<?php echo $erabiltzaile_iz ?>" readonly></td>
                                
                                <td id="izenaTd"> <input class="inputSetting" type="text" id="izenaTxt" name="izena" value="<?php echo $izena ?>" readonly></td>
                                <td id="abizenaTd"> <input class="inputSetting" type="text" id="abizenaTxt" name="abizena" value="<?php echo $abizena ?>" readonly></td>
                                <td id="emailTd"> <input class="inputSetting" type="text" id="emailTxt"  name="email" value="<?php echo $email ?>" readonly></td>                                
                                <td id="passwordTd"> <input class="inputSetting" type="text" id="passwordTxt" name="password"  placeholder="***yyy***" readonly></td>                                
                                <input class="inputSetting" type="hidden" id="passwordTxtBD" name="passwordBD" value="*<?php echo $pasahitza ?>">
                                <td id="adminRolTd"> <input class="inputSetting" type="text" id="adminRolTxt" name="adminRol" value="<?php echo $adminRol ?>" readonly></td>
                                <td>
                                    <!-- BOTONES DE LAS OPCIONES CORRESPONDIENTES -->
                                    <div class="commentsIcon">
                                        <button type="submit" name="btnDeleteUser">
                                            <i class="fa fa-lg fa-trash-o"></i>
                                        </button>

                                        <button type="button" name="btnEditUser" id="btnEditUser">
                                            <i class="fa fa-lg fa-edit" id="iconEdit"></i>
                                        </button>
                                    </div>
                                </td>             
                    
                </tr>       
                            </form>
                     
                    <?php
                        }
                    ?>

            </table>    
        </div>

        <!-- ---------------------------------- -->


        
        <!-- ---------------------------------- -->
        <!-- TABLA DE POSTS -->
        <div id="settingsTable" class="hoc clear">
            <h2>POST GUZTIEN TAULA</h2>

            <table>
                <tr>
                    <th>Titulua</th>
                    <th>Sortzailea</th>
                    <th>Laburpena</th>
                    <th>Aukerak</th>
                </tr>

                <tr>
                    <?php
                        include_once "../BD/conexionBD.php";
                        
                        $sql = "SELECT * FROM gaia";
                        

                        foreach ($conexionBD->query($sql) as $row) {
                            $titulua = $row['titulua'];
                            $erabiltzaile_iz = $row['erabiltzaile_iz'];
                            $laburpena = $row['laburpena'];
                    ?>
                            <form method="post" action="../php/ajustes.php">

                                <td id="tituluaTd"> <input class="inputSetting" type="text" id="tituluaTxt" name="titulua" value="<?php echo $titulua ?>" readonly></td>
                                <td id="erabiltzaile_izTd"> <input class="inputSetting" type="text" id="erabiltzaile_izTxt" name="erabiltzaile_iz" value="<?php echo $erabiltzaile_iz ?>" readonly></td>
                                <td id="laburpenaTd" > <input class="inputSetting" type="text" id="laburpenaTxt"  name="laburpena" value="<?php echo $laburpena ?>" readonly></td>
                                <td>
                                    <!-- BOTONES DE LAS OPCIONES CORRESPONDIENTES -->
                                    <div class="commentsIcon">
                                        <button type="submit" name="btnDeletePost">
                                            <i class="fa fa-lg fa-trash-o"></i>
                                        </button>

                                        <button type="button" name="btnEdit" id="btnEditPost">
                                            <i class="fa fa-lg fa-edit" id="iconEdit"></i>
                                        </button>
                                    </div>
                                </td>
                    </tr>                            

                    </form>
                     
                    <?php
                        }
                    ?>

            </table>    
        </div>
        <!-- ---------------------------------- -->


        <!-- ################################################################################################ -->


        <!-- ---------------------------------- -->
        
        <!-- FOOTER -->
        <?php include 'footer.php';?>   
    </body>

</html>