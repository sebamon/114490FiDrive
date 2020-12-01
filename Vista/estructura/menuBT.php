<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->

  <main id="main">

<!-- ======= Mobile nav toggle button ======= -->
<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

<!-- ======= Header ======= -->
<header id="header">
  <div class="d-flex flex-column">

    <div class="profile">
      <img src="../../externos/iPortfolio/assets/img/apple-touch-icon.png" alt="" class="img-fluid rounded-circle">
      <h1 class="text-light"><a href="#">  
      <?php 

      if($mySession->isLog())
      {

        echo $mySession->getNombre().' '.$mySession->getApellido(); 
      }   

   ?></a></h1>
      <div class="social-links mt-3 text-center">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
    <?php 

if($mySession->isLog())
{

        echo '<nav class="nav-menu">';
          echo '<ul>';
            echo '<li><a href="../main/contenido.php"><i class="bx bx-grid-alt"></i> <span>Contenido</span></a></li>';
            echo '<li><a href="../amarchivo/amarchivo.php?parametro=nuevo"><i class="bx bx-file-blank"></i> <span>Nuevo Archivo</span></a></li>';
            echo '<li><a href="../main/archivoscompartidos.php"><i class="bx bx-share-alt"></i> <span>Archivos Compartidos</span></a></li>';
            echo '<li><a href="../usuario/usuario.php"><i class="bx bx-user"></i> <span>Gestion de Usuarios</span></a></li>';
            echo '<li><a href="../login/cerrar_session.php"><i class="bx bx-exit"></i> <span>Cerrar Sesion</span></a></li>';
          echo '</ul>';
        echo '</nav><!-- .nav-menu -->';
        echo '<button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>';
}   

?>
    

  </div>
</header><!-- End Header -->