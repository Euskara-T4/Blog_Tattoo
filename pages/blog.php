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
        <link rel='shortcut icon' type='image/x-icon' href='../images/demo/logo3Txiki.jpg'/>
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
                    <div id='logo' class='fl_left flex'>
                        <img src='../images/demo/logo3Txiki.jpg' alt='Logo' class='logo'>
                        <h1><a href='index.php'>Blog Tattoo</a></h1>
                    </div>
        
                    <!-------------------------------------------------->
                    <!------------------- NAVBAR ----------------------->
                    <!-------------------------------------------------->
        
                    <nav id='mainav' class='fl_right'>
                        <ul class='clear'>
                            <li><a href='index.php'>Hasiera</a></li>
                            <li class='active'><a href='blog.php'>Blog</a></li>
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
                      <li><a href="blog.php">Blog</a></li>
                  </ul>
                  <!-- ################################################################################################ -->
              </div>
            </div>
            <!-- ----------------- -->
        </div>

      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
        <div class="wrapper row3">
            <main class="hoc container clear">
                <h2>TATUAJEEI BURUZKO POSTAK</h2>
                <hr>

                <div class="content">                    
                    <div id="gallery">
                        <figure>                            
                                <?php
                                    // Recoger informacion sobre los temas correspondientes
                                    include_once "../BD/conexionBD.php";
                                    
                                    // Ya que hay temas repetidos, vamos a hacer una array que contenga cada unico IC del tema
                                    $sqlDistinct = "SELECT DISTINCT id_gaia FROM argazkia";
                                    $arrayId = array();

                                    foreach ($conexionBD->query($sqlDistinct) as $sqlDistinct) {
                                        $id_gaia = $sqlDistinct['id_gaia'];
                                        $arrayId[] = ($id_gaia);                                           
                                    }

                                        for ($i = 0; $i < count($arrayId); $i++) {

                                            $sqlImg = "SELECT * FROM argazkia WHERE id_gaia='$arrayId[$i]' LIMIT 1";

                                            foreach ($conexionBD->query($sqlImg) as $rowImg) {    

                                                $img_src = $rowImg['url'];
                                                $img_name = $rowImg['izena'];
                                                $id_gaia = $rowImg['id_gaia'];

                                                // Mostrar solo la primera imagen de cada tema
                                                $sql = "SELECT * FROM gaia WHERE id_gaia='$id_gaia'";

                                                foreach ($conexionBD->query($sql) as $row) {    
                                                    $erabiltzailea = $row['erabiltzaile_iz'];
                                                    $gaia = $row['titulua'];
                                                    $laburpena = $row['laburpena'];
                                                    $deskribapena = $row['deskribapena'];                                   
                                     
                                        
                                       
                                ?>
                                        <div class="gaiaContainer">
                                            <a href='iruzkinak.php?idGaia=<?php echo $id_gaia;?>'>
                                                <!-- Imagen -->
                                                <img class="gaiaImg" src= "<?php echo $img_src; ?>" alt="<?php echo $img_name; ?>">
                                                <!-- Titulo -->
                                                <h3 class="gaiaTitulo"><?php echo $gaia;?></h3>                                      
                                                <!-- Avatar y nombre usuario -->
                                                <div class="usuarioFlex">
                                                    <img class="gaiaAvatar" src="../images/demo/avatar.png" alt="user icon">
                                                    <h4 class="gaiaUsuario"><?php echo $erabiltzailea;?></h4>
                                                </div>                                
                                                <!-- Resumen -->
                                                <figcaption class="gaiaLaburpena"><?php echo $laburpena;?></figcaption>
                                            </a>
                                        </div>
                                <?php
                                        }
                                            
                                        }
                                    }
                                ?>
                        </figure>
                    </div>
                  <!-- ################################################################################################ -->
                  <!-- ################################################################################################ -->
                    <nav class="pagination">
                        <ul>
                            <li><a href="#">&laquo; Previous</a></li>
                            <li class="current"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><strong>&hellip;</strong></li>
                            <li><a href="#">Next &raquo;</a></li>
                        </ul>
                   </nav>
                  <!-- ################################################################################################ -->
                </div>
              <!-- ################################################################################################ -->
              <!-- / main body -->
              <div class="clear"></div>
          </main>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
        
        <!-- FOOTER -->
        <?php include 'footer.php';?>   
  </body>

</html>