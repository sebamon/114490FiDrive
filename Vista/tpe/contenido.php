<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

$objAbmArchivoCargado= new AbmArchivoCargado();
$Estado = new AbmArchivoCargadoEstado();
$listaTabla = $objAbmArchivoCargado->buscar(null);
//$elObjE = new archivocargadoestado();
$listaTablaEstado= $Estado->buscar(null);



?>

<!-- Formulario -->
<div>
<form>
<div class="form-group">
        <label for="nuevo" class="">Nuevo</label>
        <a href='amarchivo.php?parametro=nuevo'><button type="button" class="btn btn-primary">+</button></a>
</div>
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

 if( count($listaTabla)>0)
 {
     $i=1;
     echo '<tbody>';
    foreach ($listaTablaEstado as $objTabla) 
    { 


        echo '<tr>';
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>'.$objTabla->getarchivocargado()->getacnombre().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getacdescripcion().'</td>';
        echo '<td>'.$objTabla->getarchivocargado()->getusuario()->getusnombre().'</td>';
        echo '<td><a href=../..'.$objTabla->getarchivocargado()->getaclinkacceso().'>'.$objTabla->getarchivocargado()->getacnombre().'</a></td>';
        echo '<td>'.$objTabla->getestadotipo()->getetdescripcion().'</td>';
        echo '<td><a href="amarchivo.php?parametro=modificar&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Modificar</a></td>';
        echo '<td><a href="compartirarchivo.php?parametro=compartir&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Compartir</a></td>';
        echo '<td><a href="accion_amarchivo.php?parametro=eliminar&idarchivocargado='.$objTabla->getarchivocargado()->getidarchivocargado().'">Eliminar</a></td>';
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo'</table>';

}

?>


</form>
<!-- /Formulario -->

</div>

<?php
include_once("../estructura/pie.php")
?>