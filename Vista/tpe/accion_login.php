<?php 
include_once("../estructura/cabecera.php");
?>
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<?php 
$datos = data_submitted();
$abmlogin = new AbmLogin();

if($abmlogin->login($datos))
{
    $respuesta='Usuario Logueado en el Sistema';
    header("location: contenido.php");

}
else {
    $respuesta='Las Credenciales son incorrectas';
}



?>


<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>
<div class="row">
<a class="btn btn-primary" href="index.php" role="button">Atras</a>
</div>

</div>


<?php 

include_once("../estructura/pie.php");
?>
