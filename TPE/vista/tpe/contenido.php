<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

?>


<div class="col">

<form name='contenido' id='contenido' action="accion.php" method="POST" data-toggle="validator"  role='form'>
<div clas="form-group">
        <label for="seleccion">Seleccion:</label>
        <input class='form-control' type="text" id="seleccion" name="seleccion" disabled>
</div>
<div clas="form-group">
        <label for="ruta">Ruta Seleccionada:</label>
        <input class='form-control' type="text" id="ruta" name="ruta" value='../../archivos' >
</div>
<div class="col">
<?php

 $obj = new control_amarchivo();
$obj->mostrarArchivos2('../../archivos');

?>
</div>
    <div class="form-group">
        <h4>Crear Carpeta</h4>
        <label for="carpeta">Nombre de la Carpeta:</label>
        <input type="text" class='form-control' id="carpeta" name="carpeta" placeholder="Nombre de la Carpeta">
        <input type="submit" class="btn btn-primary" value="Nueva Carpeta" onclick="NuevaCarpeta()">        
    </div>
 
    <div class="row">
    <input type="text" id='accion' name='accion' hidden value='sinaccion'>
    </div>
    <form action="amarchivo.php" method='post'>
        <div class="form-group">
        <h4>Nuevo Archivo</h4>
        <input type="submit" class="btn btn-primary" value="Nuevo Archivo" onclick="NuevoArchivo()">        
    </div>
</form>
<!-- aca va el otro form -->
</form>

</div>






<?php
include_once("../estructura/pie.php")
?>