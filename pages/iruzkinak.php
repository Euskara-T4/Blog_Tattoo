<?php
  // INICIAMOS LA SESION    
  session_start();
?>

<!DOCTYPE html>

<html lang="es">

<head>
<title>Blog Tattoo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <link href="../layout/styles/myCss.css" rel="stylesheet" type="text/css" media="all">
    <script src="../js/slider.js"></script>
    <script src="../js/edit.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body id="top">
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
                    
                    <li><a href="pages/registro.html" title="Sign Up"><i class="fa fa-lg fa-user-plus"></i></a></li>
              </ul>
              <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->
        </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- Top Background Image Wrapper -->
    <div class="bgded overlay">
        <div class="wrapper row1">

            <header id="header" class="hoc clear">
                <div id="logo" class="fl_left">
                    <h1><a href="../index.html">Natucam</a></h1>
                </div>

                <nav id="mainav" class="fl_right">
                    <ul class="clear">
                        <li><a href="../index.html">Home</a></li>
                        <li class="active"><a class="drop" href="#">Pages</a>
                            <ul>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li class="active"><a href="full-width.html">Full Width</a></li>
                                <li><a href="sidebar-left.html">Sidebar Left</a></li>
                                <li><a href="sidebar-right.html">Sidebar Right</a></li>
                                <li><a href="basic-grid.html">Basic Grid</a></li>
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
        <div class="wrapper row2">
            <div id="breadcrumb" class="hoc clear">
                <ul>
                    <li><a href="../index.html">Hasiera</a></li>
                    <li><a href="iruzkinak.html">IRUZKINAK</a></li>
                </ul>
            </div>
        </div>
        <!-- ################################################################################################ -->
    </div>
    <!-- End Top Background Image Wrapper -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
<<<<<<< HEAD
  </div>
  <!-- End Top Background Image Wrapper -->
  <!-- ################################################################################################ -->
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

          foreach ($conexionBD->query($sqlImg) as $rowImg) {
            $img_src = $rowImg['url'];
            $img_name = $rowImg['izena'];
            ?>

            <!-------slider imagen de blog con botones
          
                  carga de imagenes desde la BD-------------------------->

            <div class="carrusel">
              <!-- Informacion sobre el tema  -->
              <img class="mySlides" src="<?php echo $img_src; ?>" alt="<?php echo $img_name; ?>">
            </div>
              <!----------------------------------------------------------------->
              <!---------------script para recorrer imagen automatica ---------------------->
            <?php
              }
              ?>
            <script>
                var slideIndex = 1;
                var slideIndex = 0;
                  carousel();

                  function carousel() {
                    var i;
                    var x = document.getElementsByClassName("mySlides");
                    for (i = 0; i < x.length; i++) {
                      x[i].style.display = "none";
                    }
                    slideIndex++;
                    if (slideIndex > x.length) {slideIndex = 1}
                    x[slideIndex-1].style.display = "block";
                    setTimeout(carousel, 8000); // Change image every 8 seconds
                  }
          </script>
          <?php
          }
          ?>

      </div>
  <div id="comments">
    <h3 class="iruzkinakTitle">Iruzkinak</h3>
    <!-- Vamos a mostrar los comentarios de la base de datos -->
    <?php
    include_once "../BD/conexionBD.php";
    $sql = "SELECT * FROM iruzkina WHERE id_gaia='$id_gaia'";
=======
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

                  foreach ($conexionBD->query($sqlImg) as $rowImg) {
                    $img_src = $rowImg['url'];
                    $img_name = $rowImg['izena'];
              ?>

                    <!------- Slider imagen de blog con botones          
                      carga de imagenes desde la BD --------->

                    <div class="carrusel">
                        <!-- Informacion sobre el tema  -->
                        <img class="mySlides" src="<?php echo $img_src; ?>" alt="<?php echo $img_name; ?>">
                    </div>
                <?php
                  }
                ?>

              <?php
                }
              ?>

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
>>>>>>> 277e9b81157f40a1da533267cdc1f0e5aced8e6f

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