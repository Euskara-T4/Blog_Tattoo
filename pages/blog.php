<?php
  // INICIAMOS LA SESION
  session_start();
?>


<!DOCTYPE php>

<html lang="es">

  <head>
      <title>Blog Tattoo</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
      <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
  </head>

  <body id="top">
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
                    
                    <li><a href="pages/registro.html" title="Sign Up"><i class="fa fa-lg fa-user-plus"></i></a></li>
              </ul>
              <!-- ################################################################################################ -->
          </div>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- Top Background Image Wrapper -->
      <div class="bgded overlay" style="background-image:url('../images/demo/backgrounds/01.png');">
          <!-- ################################################################################################ -->
          <div class="wrapper row1">
              <header id="header" class="hoc clear">
                  <!-- ################################################################################################ -->
                  <div id="logo" class="fl_left">
                      <h1><a href="../index.php">Natucam</a></h1>
                  </div>
                  <nav id="mainav" class="fl_right">
                      <ul class="clear">
                          <li><a href="../index.php">Home</a></li>
                          <li class="active"><a class="drop" href="#">Pages</a>
                              <ul>
                                  <li class="active"><a href="gallery.php">Gallery</a></li>
                                  <li><a href="full-width.php">Full Width</a></li>
                                  <li><a href="sidebar-left.php">Sidebar Left</a></li>
                                  <li><a href="sidebar-right.php">Sidebar Right</a></li>
                                  <li><a href="basic-grid.php">Basic Grid</a></li>
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
                          <li><a href="aboutUs.php">Link Text</a></li>
                          <li><a href="#">Link Text</a></li>
                      </ul>
                  </nav>
                  <!-- ################################################################################################ -->
              </header>
          </div>
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <!-- ################################################################################################ -->
          <div>
              <div id="breadcrumb" class="hoc clear">
                  <!-- ################################################################################################ -->
                  <ul>
                      <li><a href="../index.php">Home</a></li>
                      <li><a href="gallery.php">Galeria</a></li>
                      <li><a href="#">Ipsum</a></li>
                      <li><a href="#">Dolor</a></li>
                  </ul>
                  <!-- ################################################################################################ -->
              </div>
          </div>
          <!-- ################################################################################################ -->
      </div>
      <!-- End Top Background Image Wrapper -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div class="wrapper row3">
          <main class="hoc container clear">
              <div class="content">
                  <div id="gallery">
                      <figure>
                            <header class="heading">TATUAJEEN BURUZKO POSTAK</header>

                            <?php
                                // Recoger informacion sobre los temas correspondientes
                                include_once "../BD/conexionBD.php";
                                $sql = "SELECT * FROM gaia";

                                foreach ($conexionBD->query($sql) as $row) {    
                                    $id_gaia = $row['id_gaia'];
                                    $erabiltzailea = $row['erabiltzaile_iz'];
                                    $gaia = $row['titulua'];
                                    $laburpena = $row['laburpena'];
                                    $deskribapena = $row['deskribapena'];

                                    // Recogemos la imagen que le corresponde
                                    $sqlImg = "SELECT * FROM argazkia WHERE id_gaia='$id_gaia'";
                                    
                                    foreach ($conexionBD->query($sqlImg) as $rowImg) {    
                                        $img_src = $rowImg['url'];
                                        $img_name = $rowImg['izena'];
                            ?>
                                    <div class="gaiaContainer">
                                        <a href='iruzkinak.php?idGaia=<?php echo $id_gaia;?>'>
                                            <!-- Imagen -->
                                            <img class="gaiaImg" src= "<?php echo $img_src; ?>" alt="<?php echo $img_name; ?>">
                                            <!-- Titulo -->
                                            <h3 class="gaiaTitulo"><?php echo $gaia;?></h3>
                                            <!-- Recoger ID del tema -->
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
      <!-- ################################################################################################ -->
      <div class="wrapper row5">
          <div id="copyright" class="hoc clear">
              <!-- ################################################################################################ -->
              <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
              <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/"
                      title="Free Website Templates">OS Templates</a></p>
              <!-- ################################################################################################ -->
          </div>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
      <!-- JAVASCRIPTS -->
      <script src="../layout/scripts/jquery.min.js"></script>
      <script src="../layout/scripts/jquery.backtotop.js"></script>
      <script src="../layout/scripts/jquery.mobilemenu.js"></script>
  </body>

</html>