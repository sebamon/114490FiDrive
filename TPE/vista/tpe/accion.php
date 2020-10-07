<?php 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
?>
<?php 
$datos = data_submitted();
$obj = new control_amarchivo();

$ruta=$datos['ruta'];
$obj->UploadFile($datos);
/*

$valor=$datos['clave'];
if($datos['clave']==0)
{
    $resultado=$obj->UploadFile($datos);

}*/