<?php 
include_once("../estructura/cabeceraBT.php");
include_once("../estructura/menuBT.php");

$datos = data_submitted();

$datos['pass']=uniqid();
$AbmUser = new AbmUsuario();

if($AbmUser->recuperar_pass($datos))
{
    $respuesta='La contraseña se ha reseteado, la recibira en su correo electronico.';
}
else {
    $respuesta='Hubo un problema, puede que la direccion de correo no sea valida';
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

<h1 align="center">Recuperar Contraseña</h1>
<div class="col alert alert-success" role="alert">
<p>
<b>Respuesta: </b> 
<?php echo $respuesta?>
</p>
</br>
<div class="row">
<a class="btn btn-primary" href="login.php" role="button">Atras</a>

</div>
</div>
<?php

?>