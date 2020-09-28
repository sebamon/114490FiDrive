<?php 
include_once("../estructura/cabecera.php");
?>
<?php 
$datos = data_submitted();
$obj = new control_amarchivo();
$respuesta = $obj->UploadFile($datos);




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
