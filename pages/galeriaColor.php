<!DOCTYPE html>

<html lang="es">

<head>
  <title>Blog Tattoo | Galeria | Kolorezkoa</title>
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
        <li><a href="#" title="Login"><i class="fa fa-lg fa-sign-in"></i></a></li>
        <li><a href="#" title="Sign Up"><i class="fa fa-lg fa-edit"></i></a></li>
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
          <h1><a href="../index.html">Natucam</a></h1>
        </div>
        <nav id="mainav" class="fl_right">
          <ul class="clear">
            <li><a href="../index.html">Home</a></li>
            <li class="active"><a class="drop" href="#">Pages</a>
              <ul>
                <li class="active"><a href="gallery.html">Gallery</a></li>
                <li><a href="full-width.html">Full Width</a></li>
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
            <li><a href="aboutUs.html">Link Text</a></li>
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
          <li><a href="../index.html">Hasiera</a></li>
          <li><a href="gallery.html">Galeria</a></li>
          <li><a href="galeriaColor.html">Kolorezkoa</a></li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
    </div>
    <!-- ################################################################################################ -->
  </div>

  <!-- ################################################################################################ -->
  <div class="wrapper row3">
    <main class="hoc container clear">
      <!-- main body -->
      <!-- ################################################################################################ -->
      <div class="content">
        <!-- ################################################################################################ -->
        <div id="gallery">
          <figure>
            <header class="heading">KOLOREZKO TATUAJEAK</header>
            <!-- HABRIA QUE METER UN CODIGO PHO JUSTO AQUI ---
           
                <?php
                  include_once "../BD/conexionBD.php";
		              $sql = "SELECT * FROM argazkia WHERE erabiltzaile_iz='$nombre_usuario' AND pasahitza='$passEncript'";


                  foreach ($conexionBD->query($sql) as $row) {
                    echo " 
                      <li class="one_quarter first">
                        <img src="$row['url']" alt="$row['izena']">
                        <figcaption>$row['url']</figcaption>
                      </li>      
                    ";
                  }

                ?>
            -->

            <li class="one_quarter first">
              <img src="../images/demo/gallery/01.png" alt="">
              <figcaption>Gallery Description Goes Here</figcaption>
            </li>




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