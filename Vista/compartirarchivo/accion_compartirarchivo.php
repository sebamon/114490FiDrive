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

if(isset($datos['accion'])){
    $parametro=$datos['accion'];
    if($parametro=='compartir')
    {
        $respuesta = $AbmArchivoCargado->Compartir($datos);
        if($respuesta)
        {
            $respuesta='El archivo fue compartido';
        }
        else{
            $respuesta='No pudo compartirse el archivo';
        }
    }
    if($parametro=='eliminar')
    {
        $respuesta=$AbmArchivoCargado->baja($datos);
        if($respuesta)
        {
            $mensaje='El archivo fue eliminado';
        }
        else{
            $mensaje='No pudo eliminarse el archivo';
        }
        
    }
    
}


if($respuesta)
{
    echo '<div class="col alert alert-success" role="alert">';
}
else
{
    echo '<div class="col alert alert-danger" role="alert">';
}
"<p>";
"<b>Respuesta: </b> ";
 echo $respuesta;
 ?>


</p>
</br>
<div class="row">
<a class="btn btn-primary" href="../main/contenido.php" role="button">Atras</a>

</div>
</div>


