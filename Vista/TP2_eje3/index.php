<?php 
$Titulo = "TP2 Ejercicio 3"; 
include_once("../estructura/cabecera.php");
?>



<div class="row">
<div class="col col-4"></div>
<div class="col col-4 border">
<form id="login" name="login" class="form-signin text-center" method="POST" action="accion.php" data-toggle="validator" role="form">
  
<button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
<h1 class="h3 mb-3 font-weight-normal">Member Login</h1>
  
  <div class="form-group">
  
  <i class="fa fa-user"></i>
  <input type="text" id="username" name="username" class="form-control" placeholder="username" autofocus>
  </div>
  <div class="form-group">
  <input type="password" id="password" name="password" class="form-control" placeholder="password" >
  </div>
  <button class="btn btn-lg btn-success btn-block" type="submit">Log in</button>

</form>
</div>
</div>
</div>

<?php 

include_once("../estructura/pie.php");
?>
