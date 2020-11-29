<?php 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$datos = data_submitted();
$AbmArchivoCargado = new AbmArchivoCargado();
$AbmArchivoEstado = new AbmArchivoCargadoEstado();

if(isset($datos['accion'])){
    $parametro=$datos['accion'];
    if($parametro=='descompartir')
    {
        $respuesta = $AbmArchivoEstado->NuevoEstado($datos);

    }

    
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


