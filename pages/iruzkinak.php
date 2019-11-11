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
        <script src='../js/slider.js'></script>
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
                        <li class='active'><a href='blog.php'>Blog</a></li>
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
    <!-- ################################################################################################ -->
    <!-- MIGAS -->
    <div class="migas">
        <div id="breadcrumb" class="hoc clear">
            <ul>
                <li><a href="index.php">Hasiera</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="iruzkinak.php">Iruzkinak</a></li>
            </ul>
        </div>
    </div>
    <!-- ------------- -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row3">
        <main class="hoc container clear">
            <!-- main body -->
            <!-- ################################################################################################ -->
            <div class="content">

              <!--------------------------------->
              <!-- SELECT DE TITULOS DEL TEMA  -->
              <!--------------------------------->
              <?php
                include_once "../BD/conexionBD.php";
                $id_gaia = $_GET["idGaia"];
                $sql = "SELECT * FROM gaia WHERE id_gaia='$id_gaia'";

                foreach ($conexionBD->query($sql) as $row) {
                  $erabiltzailea = $row['erabiltzaile_iz'];
                  $gaia = $row['titulua'];
                  $deskribapena = $row['deskribapena'];

                  $sqlImg = "SELECT * FROM argazkia WHERE id_gaia='$id_gaia'";

            ?>
                    <h2><?php echo $gaia; ?></h2>
                    <hr>
            <?php

                  foreach ($conexionBD->query($sqlImg) as $rowImg) {
                    $img_src = $rowImg['url'];
                    $img_name = $rowImg['izena'];
              ?>
                  
                    <!-- SLIDER -->
                    <div class="carrusel">
                        <img class="mySlides" src="<?php echo $img_src; ?>" alt="<?php echo $img_name; ?>">
                    </div>
                <?php
                  }
                }
              ?>
                <div class="gaiaContainer">
                        <!-- Avatar y nombre usuario -->
                        <div class="usuarioFlex">
                            <img class="gaiaAvatar" src="../images/demo/avatar.png" alt="user icon">
                            <h4 class="gaiaUsuario"><?php echo $erabiltzailea;?></h4>
                        </div>                                
                        <!-- Resumen -->
                        <figcaption class="gaiaLaburpena"><?php echo $deskribapena;?></figcaption>
                </div>
                    
            </div>

            <!-------------------------------->
            <!-- CODIGO COMENTARIOS -->
            <div id="comments">
              <h3 class="iruzkinakTitle">Iruzkinak</h3>
              <!-- Vamos a mostrar los comentarios de la base de datos -->
              <?php
                include_once "../BD/conexionBD.php";
                $sql = "SELECT * FROM iruzkina WHERE id_gaia='$id_gaia'";

                foreach ($conexionBD->query($sql) as $row) {    
                  $id_gaia = $row['id_gaia'];
                  $erabiltzailea = $row['erabiltzaile_iz'];
                  $iruzkina = $row['iruzkina'];
                  $sortze_data = $row['sortze_data'];
                  $id_iruzkina = $row['id_iruzkina'];
              ?>

                  <form method="post" action="../php/comentario.php">
                    <ul>
                      <li>
                        <article>
                          <!-- Informacion del comentario -->
                          <header>
                            <figure class="avatar">
                                <i class="fa fa-user-circle-o" id="avatarImg"></i>
                            </figure>

                            <address><?php echo $erabiltzailea;?></address>

                            <input type="hidden" name="iruzkinaId" value="<?php echo $id_iruzkina; ?>">
                            <input type="hidden" name="idGaia" value="<?php echo $id_gaia; ?>">

                            <time datetime="2045-04-06T08:15+00:00"><?php echo $sortze_data;?></time>
                          </header>

                          <div class="comcont">
                              <p><?php echo $iruzkina;?></p>
                          </div>

                          <!-- COMPRAMOS SI LA EL USUARIO ES EL CORRESPONDIENTE -->
                          <?php
                            if(isset($_SESSION["usuario"])){
                              if($_SESSION["usuario"] == $erabiltzailea || $_SESSION["adminRol"] == "1" || $_SESSION["adminRol"] == "2") {
                          ?>
                            <div class="commentsIcon">
                                <button type="submit" name="btnDelete">
                                    <i class="fa fa-lg fa-trash-o"></i>
                                </button>
                            </div>

                          <?php
                              }
                            }
                          ?>
                        </article>
                      </li>
                    </ul>

              <?php                
                }
              ?>
                  </form>

                <!-------------------------->

                <!-- COMPRAMOS SI LA SESION EXISTE -->
              <?php
                if(isset($_SESSION["usuario"])){
              ?>
                <!-- AÑADIMOS EL COMENTARIO -->
                <div class="insertarComentario">
                    <h2>IRUZKINA SARTU</h2>
                    <form method="post" action="../php/comentario.php">

                        <div class="block clear">
                            <label for="iruzkina">Zure iruzkina:</label>
                            <textarea name="iruzkina" id="comment" cols="25" rows="10"></textarea>
                        </div>

                        <input type="hidden" name="idGaia" value="<?php echo $id_gaia; ?>">

                        <div class="flex">
                            <input type="submit" class="flexBtn" name="send" value="Bidali">
                            <input type="reset" class="flexBtn" name="reset" value="Borratu">
                        </div>
                    </form>

                    <p name="errores"></p>
                </div>

              <?php
                }
              ?>

          <!-- ################################################################################################ -->
          </div>
    </div>

    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
    </main>
    </div>
    <!-- ################################################################################################ -->
    <!-- FOOTER -->
    <?php include 'footer.php';?>   
</body>

</html>