<?php 
$Titulo = "TP2 Ejercicio 4"; 
include_once("../estructura/cabecera.php");
?>
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<?php 
$datos = data_submitted();
$obj = new control_TP2_eje4();
$respuesta = $obj->AgregarPelicula($datos);


?>


<!-- <p>
<b>Respuesta: </b> 



</p> -->
<div class="row alert alert-success" role="alert">
<h3>La pelicula ingresada es:</h3>
</br>
<?php echo $respuesta ?>
</div>
<div class="row">
<a class="btn btn-primary" href="index.php" role="button">Atras</a>
</div>

</div>


<?php 

include_once("../estructura/pie.php");
?>
