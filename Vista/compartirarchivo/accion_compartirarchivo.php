<?php 
include_once("../estructura/cabeceraBT.php");


if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
include_once("../estructura/menuBT.php");

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

<h1 align="center">Compartir Archivo</h1>
<?php

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


<?php
include_once("../estructura/pieBT.php");
?>
