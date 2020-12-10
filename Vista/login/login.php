<?php 
$Titulo = "Login"; 
//include_once("../estructura/cabeceraBT.php");
include_once("../estructura/cabeceraLogin.php");

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
<div class="container">

<form id="login" name="login" class="form-signin text-center" method="POST" action="accion_login.php" data-toggle="validator" role="form" onsubmit="return Encriptar()"> 
  
<button class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<h1 class="h3 mb-3 font-weight-normal">Login de Usuario</h1>
  
  <div class="form-group">
  
  <i class="fa fa-user"></i>
  <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
  </div>
  <div class="form-group">
  <input type="password" id="clave" name="clave" class="form-control" placeholder="Password" " >
  </div>
  <div class="row">
  
  <div class="col-6">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button></div>
  <div class="col-6">
  <a href='../usuario/usuario.php'><button class="btn btn-lg btn-secondary btn-block" type="button">Crear Usuario</button></a>
  </div>
  </div>
</form>
<div class="row col-8">
<a href="recuperar_contrasena.php">Recuperar contraseña</a>
</div>
</div>


<?php 

include_once("../estructura/pieBT.php");
?>
