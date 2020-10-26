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
        $respuesta = $AbmArchivoCargado->DesCompartirEliminar($datos);
        // if($respuesta)
        // {
        //     $respuesta = $AbmArchivoCargado->alta($datos);//Da de alta en la tabla archivocargado
        // }
    }
    if($parametro=='eliminar')
    {
        $respuesta=$AbmArchivoCargado->baja($datos);
    }
    
}
// switch($parametro)
// {
//     case ('nuevo'): $respuesta=$obj;

//     case ('modificar'): $respuesta=$obj->;

// }


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


