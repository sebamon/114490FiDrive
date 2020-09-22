<?php 
$Titulo = " Ejercicio 1"; 
include_once("../estructura/cabecera.php");
?>


<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<p>
Ejercicio 1
Confeccionar un formulario que solicite un número. Al pulsar el botón de enviar debe
llamar a un script –vernumero.php- (accion.php) y visualizar un mensaje que indique si el número
enviado fue: positivo, cero o negativo. Añadir un link, a la página que visualiza la
respuesta, que permita volver a la página anterior.
</p>

<!---->
<form  id="eje1" name="eje1" method="POST" action="accion.php" data-toggle="validator" role="form">
<!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
<div class="form-group">
<label class="control-label">Numero: </label>
<input type="number" class="form-control" name="numero" placeholder="Ingrese un Numero" required></p>
</div>

<input id="btn_eje1" class="btn btn-primary" name="btn_eje1" type="submit" value="Enviar">

</form >


</div>

<script src="../js/jquery-3.5.1.slim.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/bootstrapvalidator-0.5.2/dist/js/bootstrapValidator.min.js"></script>
</body>
<?php 

include_once("../estructura/pie.php");
?>
