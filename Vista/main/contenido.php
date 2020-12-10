<?php 
//$Titulo = "Contenido"; 
include_once("../estructura/cabeceraBT.php");

if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
include_once("../estructura/menuBT.php");
  

$objAbmArchivoCargado= new AbmArchivoCargado();
$Estado = new AbmArchivoCargadoEstado();
$parametro['idusuario']=$mySession->getidUsuario();
$listaTablaEstado= $Estado->buscar($parametro);



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

<h1 align="center">Contenido de Archivos</h1>
<!-- Formulario -->
<form>
<div class="form-group">
        <label for="nuevo" class="">Nuevo</label>
        <a href='../amarchivo/amarchivo.php?parametro=nuevo'><button type="button" class="btn btn-primary">+</button></a>
</div>
<div class="form-group">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Usuario</th>
      <th scope="col">Ver</th>
      <th scope="col">Estado</th>
      <th scope="col">Modificar</th>
      <th scope="col">Compartir</th>
      <th scope="col">Eliminar</th>
      
    </tr>
    </thead>
<?php	

 if( count($listaTablaEstado)>0)
 {
     $i=1;
     echo '<tbody>';
    foreach ($listaTablaEstado as $objTabla) 
    { 


        echo '<tr>';
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>'.$objTabla->getarchivocargado()->getacnombre().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getacdescripcion().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getusuario()->getuslogin().'</td>';
        echo '<td><a href=../../archivos/'.urlencode($objTabla->getarchivocargado()->getacnombre()).'>'.$objTabla->getarchivocargado()->getacnombre().'</a></td>';
        echo '<td>'.$objTabla->getestadotipo()->getetdescripcion().'</td>';
        echo '<td><a  class="btn btn-info" href="../amarchivo/amarchivo.php?parametro=modificar&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Modificar</a></td>';
        switch($objTabla->getestadotipo()->getidestadotipos())
        {
          case '1': echo '<td><a class="btn btn-primary" href="../compartirarchivo/compartirarchivo.php?parametro=compartir&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Compartir</a></td>';break;
          case '2': echo '<td><a class="btn btn-outline-primary" href="../amarchivo/eliminararchivocompartido.php?parametro=descompartir&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Descompartir</a></td>';break;
          case '3': echo '<td><a class="btn btn-primary" href="../compartirarchivo/compartirarchivo.php?parametro=compartir&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Compartir</a</td>';break;
          case '4': echo '<td>No Compartible</td>';
        }
        echo '<td><a class="btn btn-danger" href="../amarchivo/eliminararchivo.php?parametro=eliminar&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Eliminar</a></td>';
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo'</table>';


}
?>

</div>

</form>

<!-- /Formulario -->



<?php
include_once("../estructura/pieBT.php");
?>