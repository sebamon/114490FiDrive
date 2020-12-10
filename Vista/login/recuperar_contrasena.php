<?php 
include_once("../estructura/cabeceraBT.php");
include_once("../estructura/menuBT.php");
if(isset($_GET['user']))
{
  $AbmUser = new AbmUsuario();
  $param= array('idusuario'=>$_GET['user']);
  $unUser =  $AbmUser->buscar($param);
  $unUser=$unUser[0];
}
?>
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Programacion Web Avanzada</h2>
      <ol>
        <li><a href="../main/contenido.php">Contenido</a></li>
        <li><a href="../usuario/gestionusuario.php">Gestion de Usuario</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<div class="container">
<h1>Recuperar Contraseña</h1>
<form action="accion_recuperar_contrasena.php" id="recuperar_contrasena" name="recuperar_contrasena" method="POST" data-toggle="validator" role="form">
<div class="row">
    <div class="form-group col-4">
    <label for="">Email</label>
    </div>
    <div class="form-group col-4">
    <?php
  if(isset($_GET['user']))
  {
  echo ' <input type="text" class="form-control" readonly name="email" id="email" value="'.$unUser->getusmail().'">';
  }
  else {
    echo '<input type="text" class="form-control" name="email" id="email">';
  }
    ?>
    
    </div>
</div>
<div class="row">
    <div class="form-group col-4">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button></div>
    </div>
</div>

</form>
</div>