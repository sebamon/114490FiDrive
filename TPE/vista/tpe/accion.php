<?php 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$datos = data_submitted();
$obj = new control_amarchivo();
$accion=$datos['accion'];

switch($accion)
{
    case ('accionhash'): $respuesta=$obj->GenerarHash($datos);break;
    case ('nuevacarpeta'): $respuesta=$obj->CrearCarpeta($datos);break;
    case ('modificararchivo'): $respuesta=$obj->ModificarArchivo($datos);break;
    case ('nuevoarchivo'):$respuesta=$obj->UploadFile($datos);break;
}


?>
<div class="col alert alert-success" role="alert">
<p>
<b>Respuesta: </b> 
<?php echo $respuesta?>
</p>
</br>
<div class="row">
<a class="btn btn-primary" href="contenido.php" role="button">Atras</a>

</div>
</div>


