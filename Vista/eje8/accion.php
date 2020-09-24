<?php 
$Titulo = " Ejercicio 8"; 
include_once("../estructura/cabecera.php");
?>
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->

<?php 

$datos = data_submitted();
$obj = new control_eje8();
$respuesta = $obj->CalcularValor($datos);



?>


<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>
<!-- <a href="index.php">Volver Atras</a> -->
<div class="form-group">
<a class="btn btn-primary" href="index.php" role="button">Atras</a>

</div>

</div>


<?php 

include_once("../estructura/pie.php");
?>
