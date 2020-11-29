<?php 
include_once("../estructura/cabecera.php");


if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}

include_once("../estructura/menu.php");

$datos = data_submitted();
$AbmArchivoCargado = new AbmArchivoCargado();
$AbmArchivoEstado = new AbmArchivoCargadoEstado();
$respuesta=null;
if(isset($datos['accion'])){
    $parametro=$datos['accion'];
    if($parametro=='nuevo')
    {
        $respuesta = $AbmArchivoCargado->UploadFile($datos);//Sube el archivo a la carpeta
        if($respuesta)
        {
            $respuesta = $AbmArchivoEstado->NuevoAmarchivo($datos);//Da de alta en la tabla archivocargado
          // $respuesta = $AbmArchivoEstado->alta($datos);
        }
    }
    else 
    if($parametro=='modificar')
    {
        $respuesta=$AbmArchivoCargado->ActualizarAmarchivo($datos);
    }
    
    else {
         $respuesta = $AbmArchivoEstado->NuevoEstado($datos);
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
<a class="btn btn-primary" href="../main/contenido.php" role="button">Atras</a>

</div>
</div>


