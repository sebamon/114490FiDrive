<?php 
//$Titulo = "Contenido"; 
include_once("../estructura/cabeceraBT.php");

if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menuBT.php");
  

$objAbmArchivoCargado= new AbmArchivoCargado();
$Estado = new AbmArchivoCargadoEstado();
$parametro['idusuario']=$mySession->getidUsuario();
$parametro['idestadotipos']=2;
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

</section>

<div class="container-fluid">
<h1 align="center">Archivos Compartidos</h1>
<div class="form-group">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Compartido Hasta</th>
      <th scope="col">Limite de Descargas</th>
      <th scope="col">Descargas Realizadas</th>
      <th scope="col">Link</th>
      
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
        echo '<td>'.$objTabla->getarchivocargado()->getacefechafincompartir().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getaccantidaddescarga().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getaccantidadusada().'</td>';
        echo '<td><a href onclick="ObtenerEnlace()">'.$objTabla->getarchivocargado()->getaclinkacceso().'</a></td>';
       
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo'</table>';


}
?>

</div>
</div>




<?php
include_once("../estructura/pieBT.php");
?>