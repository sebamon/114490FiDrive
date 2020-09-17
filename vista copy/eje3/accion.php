<?php 
$Titulo = " Ejercicio 3"; 
include_once("../estructura/cabecera.php");
?>
<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<?php 
$datos = data_submitted();
$obj = new control_eje3();
//print_r($datos);

$respuesta = $obj->verInformacion($datos);
//$respuesta = $obj->verInformacion($_POST);
//$respuesta = $obj->verInformacion($_GET);



?>


<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>

</div>


</body>
<?php 

include_once("../estructura/pie.php");
?>
