<?php 
include_once("../estructura/cabeceraBT.php");
if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menuBT.php");

$datos = data_submitted();
$abmusuario = new AbmUsuario();

if($respuesta=$abmusuario->alta($datos))
{
    
}

?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Programacion Web Avanzada</h2>
      <ol>
        <li><a href="../main/contenido.php">Contenido</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->
<div class="container-fluid">

<h1 align="center">Gestion de Usuarios</h1>
<?php
     if($respuesta){
        echo '<div class="col alert alert-success" role="alert">';
        echo '<p><b>El Usuario ha sido creado con Exito</b></p></div>';
    }
    else{
    echo '<div class="col alert alert-danger" role="alert">';
    echo '<p><b>No se pudo crear el usuario</b></p></div>';
}

?>
<div class="row">
<a class="btn btn-primary" href="../main/contenido.php" role="button">Atras</a>

</div>
</div>


<?php
include_once("../estructura/pieBT.php");
?>