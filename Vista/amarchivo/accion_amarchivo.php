<?php 
include_once("../estructura/cabeceraBT.php");


if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}

include_once("../estructura/menuBT.php");

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
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Programacion Web Avanzada</h2>
      <ol>
        <li><a href="../main/contenido.php">Contenido</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->
<div class="container-fluid">
<h1 align="center">Proceso de Archivos</h1>
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

<?php
include_once("../estructura/pieBT.php");
?>