<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

?>


<div class="col">

<form name='contenido' id='contenido' action="accion-contenido.php" method="POST" data-toggle="validator"  role='form'>
<div clas="form-group">
        <label for="seleccion">Seleccion:</label>
        <input class='form-control' type="text" id="seleccion" name="seleccion" disabled>
</div>
<div clas="form-group">
        <label for="ruta">Ruta Seleccionada:</label>
        <input class='form-control' type="text" id="ruta" name="ruta" value='../../archivos' >
</div>
    <div class="form-group">
        <h4>Crear Carpeta</h4>
        <label for="carpeta">Nombre de la Carpeta:</label>
        <input type="text" class='form-control' id="carpeta" name="carpeta" placeholder="Nombre de la Carpeta">
        <input type="submit" class="btn btn-primary" value="Crear Carpeta">
        
    </div>
    <div class="row">

    </div>
    
</form>
<div class="col">
<?php
//listFiles('../../archivos')
 $obj = new control_amarchivo();
$obj->mostrarArchivos2('../../archivos');
 //$obj->mostrarCarpetas('../../archivos');
//$obj->listFiles('../../archivos/');
//$obj->ListarArchivos();
?>
</div>
</div>






<?php
include_once("../estructura/pie.php")
?>