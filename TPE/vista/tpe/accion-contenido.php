<?php 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
?>
<?php 
$datos = data_submitted();
$obj = new control_amarchivo();

$obj->CrearCarpeta($datos);
//$respuesta = $obj->UploadFile($datos);
//$respuesta=$obj->ListarArchivos2('../../archivos');
//$obj->listFiles('../../archivos');
//$obj->MostrarArchivos();




?>


<p>
<b>Respuesta: </b> 
<?php /*echo $respuesta*/?>
</p>
<div class="form-group">
<a class="btn btn-primary" href="contenido.php" role="button">Atras</a>

</div>

</div>


<?php 

include_once("../estructura/pie.php");
?>
