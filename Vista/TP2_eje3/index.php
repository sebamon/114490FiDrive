<?php 
$Titulo = " Ejercicio 4"; 
include_once("../estructura/cabecera.php");
?>


<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<p>
LOG IN
</p>

<!---->
<form name="Login" method="POST" action="accion.php">
<div class="form-group">
    <label>Usuario</label>
    <input type="text" id='lblUsuario' class="form-control" placeholder="Usuario">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Contraseña:</label>
    <input type="password" class="form-control" id="txtPassword" placeholder="Password">
  </div>

</form >


</div>


</body>
<?php 

include_once("../estructura/pie.php");
?>
