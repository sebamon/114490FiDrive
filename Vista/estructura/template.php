<?php
$Titulo = " Titulo"; 
include_once("../estructura/cabeceraBT.php");
if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menuBT.php");
?>


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Programacion Web Avanzada</h2>
      <ol>
        <li><a href="index.html">Home</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">

  
</section><!-- End Portfolio Details Section -->




<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- <div class="row"> -->


<?php
include_once("../estructura/pieBT.php")
?>