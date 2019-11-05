<?php
  // INICIAMOS LA SESION
  session_start();
?>

<!DOCTYPE html>

<html lang="es">
<!-- HEADER.PHP -->

  <head>
    <title>Blog Tattoo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/login.js"></script>

  </head>

  <body id="top">
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <div class="wrapper row0">
      <div id="topbar" class="hoc clear">
        <!-- ################################################################################################ -->
        <ul>
          <li><i class="fa fa-clock-o"></i> Mon. - Fri. 8am - 5pm</li>
          <li><i class="fa fa-phone"></i> +00 (123) 456 7890</li>
          <li><i class="fa fa-envelope-o"></i> info@domain.com</li>
          <!-- ################################################################################################ -->
          <!-- USER ACTION ICONS -->
          <li><a href="#" title="Perfila"><i class="fa fa-lg fa-home"></i></a></li>
          
          <!-- COMPRAMOS SI LA SESION EXISTE -->
          <?php
            if(!isset($_SESSION["usuario"])){
          ?>
              <!-- Si la sesion no esta iniciada -->
              <li><a href="#" title="Logeatu" id="btnLogin"><i class="fa fa-lg fa-sign-in"></i></a></li>
          <?php
            } else{
              echo $_SESSION["usuario"];
          ?>              
              <li><a href="#" title="Irten" id="btnLogout"><i class="fa fa-lg fa-sign-out"></i></a></li>
              
          <?php
                if($_SESSION["adminRol"] = 1 || $_SESSION["adminRol"] = 2){
          ?>
                  <li><a href="pages/ajusteak.php" title="Ajusteak" id="btnSettings"><i class="fa fa-lg fa-cog"></i></a></li>
          
          <?php
              }            
            }
          ?>
          <!-- -------------------------------------- -->
          
          <li><a href="pages/registro.html" title="Sortu"><i class="fa fa-lg fa-user-plus"></i></a></li>
        </ul>
        <!-- ################################################################################################ -->
      </div>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->

    <!-- LOGIN MODAL -->
    <div id="loginModal" class="modal">
      <form class="modal-content animate" action="php/login.php" method="post">
        <!-- ################################################################################################ -->
        <div class="imgcontainer">
          <span class="close" id="close" title="Close Modal">&times;</span>
          <img src="images/demo/avatar.png" alt="Avatar" class="avatar">
        </div>

        <div class="logContainer">
          <label for="erabiltzaile_iz"><b>Erabiltzaile izena:</b></label>
          <input type="text" placeholder="Sartu erabiltzailea" name="erabiltzaile_iz" required>

          <label for="psw"><b>Pasahitza:</b></label>
          <input type="password" placeholder="Sartu pasahitza" name="pasahitza" required>
          <!-- <label>
              <input type="checkbox" checked="checked" name="remember"> Remember me
            </label> -->
        </div>

        <div class="btnContainer">
          <button type="submit" class="loginBtn" id="loginBtn">Login</button>
          <button type="button" class="cancelBtn" id="cancelBtn">Cancel</button>
        </div>
      </form>
    </div>
    <!-- ################################################################################################ -->
    <!-- ################################################################################################ -->
    <!-- Top Background Image Wrapper -->
    <div class='bgded overlay' style="background-image:url('images/demo/backgrounds/fondoIndex.jpg');">
      <!-- ################################################################################################ -->
      <div class="wrapper row1">
        <header id="header" class="hoc clear">
          <div id="logo" class="fl_left">
            <h1><a href="index.php">Blog Tattoo</a></h1>
          </div>

          <!-------------------------------------------------->
          <!------------------- NAVBAR ----------------------->
          <!-------------------------------------------------->

          <nav id="mainav" class="fl_right">
            <ul class="clear">
              <li class="active"><a href="index.php">Hasiera</a></li>
              <li><a href="pages/blog.php">Blog</a>
              </li>
              <li><a class="drop" href="#">Galeria</a>
                <ul>
                  <li><a href="pages/galeriaByN.html">Zuri beltzak</a></li>
                  <li><a href="pages/galeriaColor.php">Kolorez</a></li>
                  <li><a class="drop" href="#">Artistak</a>
                    <ul>
                      <li><a href="pages/galeriaIvanP.html">Ivan Pelegrin</a></li>
                      <li><a href="#">Ivan Morant</a></li>
                      <li><a href="#">Kat Von D</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li><a href="pages/aboutUs.html">Guri buruz</a></li>
              <li><a href="pages/iruzkinak.php">IRUZKINAK</a></li>
            </ul>
          </nav>
          <!-- ################################################################################################ -->
        </header>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div id="pageintro" class="hoc clear">
        <article>
          <!-- ################################################################################################ -->
          <h3 class="heading"> BLOG TATTOO</h3>
          <p> Ongi etorri gure tatuajeen blogera</p>
          <!-- ################################################################################################ -->
        </article>
      </div>
      <!-- ################################################################################################ -->
    </div>
    
    <!-- FOOTER -->
    <!-- ################################################################################################ -->
    <div class="wrapper row5">
      <div id="copyright" class="hoc clear">
        <!-- ################################################################################################ -->
        <p class="fl_left">Copyright &copy; 2019 - Nahia & Alex - Txurdinaga</p>
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
    <script src="layout/scripts/jquery.min.js"></script>
    <script src="layout/scripts/jquery.backtotop.js"></script>
    <script src="layout/scripts/jquery.mobilemenu.js"></script>
    <script src="layout/scripts/jquery.fitvids.js"></script>
  </body>

</html>