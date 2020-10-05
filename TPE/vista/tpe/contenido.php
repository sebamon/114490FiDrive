<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

?>


<div class="col">

<form action="accion-contenido.php">
    <div class="form-group border border-primary">
        <h4>Crear Carpeta</h4>
        <label for="carpeta">Nombre de la Carpeta:</label>
        <input type="text" id="carpeta" name="carpeta" placeholder="Nombre de la Carpeta">
        <input type="submit" class="btn btn-primary" value="Crear Carpeta">
        
    </div>
    <div class="row">
    <!-- <label for="seleccion">Archivo Seleccionado:</label>
        <input type="text" id="seleccion" name="seleccion" placeholder="Seleccione un archivo o directorio">
        <input type="submit" class="btn btn-primary" value="Crear Carpeta"> -->
    </div>
    
</form>
<div class="col">
<?php
//listFiles('../../archivos')
 $obj = new control_amarchivo();
 $obj->mostrarArchivos();
//$obj->listFiles('../../archivos/');
//$obj->ListarArchivos();
?>
</div>
</div>






<?php
include_once("../estructura/pie.php")
?>