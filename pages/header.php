<?php
    echo "
        <!-- INICIAMOS LA SESION -->
        <?php
            session_start();
        ?>          

        <head>
            <title>Blog Tattoo</title>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no'>
            <link href='../layout/styles/layout.css' rel='stylesheet' type='text/css' media='all'>
        </head>

        <body id='top'>
            <!-- ################################################################################################ -->
            <div class='wrapper row0'>
                <div id='topbar' class='hoc clear'>
                    <ul>
                        <li><i class='fa fa-clock-o'></i> Mon. - Fri. 8am - 5pm</li>
                        <li><i class='fa fa-phone'></i> +00 (123) 456 7890</li>
                        <li><i class='fa fa-envelope-o'></i> info@domain.com</li>

                        <!-- BOTONES LOGIN -->
                        <li><a href='#'><i class='fa fa-lg fa-home'></i></a></li>
                        <!-- COMPRAMOS SI LA SESION EXISTE -->
                        <?php
                          if(!isset($_SESSION['usuario'])){
                        ?>
                            <!-- Si la sesion no esta iniciada -->
                            <li><a href='#' title='Login' id='btnLogin'><i class='fa fa-lg fa-sign-in'></i></a></li>
                        
                        <?php
                          } else{
                            echo $_SESSION['usuario'];
                        ?>              
                            <li><a href='#' title='Logout' id='btnLogout'><i class='fa fa-lg fa-sign-out'></i></a></li>
                            
                        <?php
                          }
                        ?>
                        <li><a href='#' title='Sign Up'><i class='fa fa-lg fa-edit'></i></a></li>
                        
                        <!-------------------------------------------->
                    </ul>
                </div>
            </div>

            <!-- ################################################################################################ -->
            <!-- ################################################################################################ -->

            <!-- Top Background Image Wrapper -->
                <div class='wrapper row1'>

                    <header id='header' class='hoc clear'>
                        <div id='logo' class='fl_left'>
                            <a href='../index.php'>
                                <img src='../images/demo/logo3Txiki.jpg' alt='Logo blog' id='logoImg'>
                            </a>
                            <h1><a href='../index.php'>Blog tattoo</a></h1>
                        </div>

                        <nav id='mainav' class='fl_right'>
                            <ul class='clear'>
                                <li class='active'><a href='../blog/index.php'>Home</a></li>
                                <li><a class='drop' href='#'>Pages</a>
                                    <ul>
                                        <li><a href='gallery.php'>Gallery</a></li>
                                        <li><a href='full-width.html'>Full Width</a></li>
                                        <li><a href='pages/sidebar-left.php'>Sidebar Left</a></li>
                                        <li><a href='pages/sidebar-right.php'>Sidebar Right</a></li>
                                        <li><a href='pages/basic-grid.php'>Basic Grid</a></li>
                                    </ul>
                                </li>

                                <li><a class='drop' href='#'>Dropdown</a>
                                    <ul>
                                        <li><a href='#'>Level 2</a></li>
                                        <li><a class='drop' href='#'>Level 2 + Drop</a>
                                            <ul>
                                                <li><a href='#'>Level 3</a></li>
                                                <li><a href='#'>Level 3</a></li>
                                                <li><a href='#'>Level 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href='#'>Level 2</a></li>
                                    </ul>
                                </li>
                                <li><a href='#'>Link Text</a></li>
                                <li><a href='#'>Link Text</a></li>
                            </ul>
                        </nav>
                    </header>
                </div>
        ";

?>