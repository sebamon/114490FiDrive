<?php 
$Titulo = " Ejercicio 1"; 
include_once("../estructura/cabecera.php");
?>
<!-- <div id="contenido" class="container" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<?php 
$datos = data_submitted();
$obj = new control_eje1();
$respuesta = $obj->CalcularPositivo($datos);




?>


<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>
<div class="form-group">
<a class="btn btn-primary" href="index.php" role="button">Atras</a>

</div>

</div>


<?php 

include_once("../estructura/pie.php");
?>
