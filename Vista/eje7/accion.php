<?php 
$Titulo = " Ejercicio 7"; 
include_once("../estructura/cabecera.php");
?>
<div class="container-fluid">
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<?php 
$datos = data_submitted();
$obj = new control_eje7();

$respuesta= $obj->Procesar($datos);



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
