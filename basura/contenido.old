<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

?>

<div class="col">
<form name='contenido' id='contenido' action="accion.php" method="get" data-toggle="validator"  role='form'>
<div clas="form-group">
        <label for="seleccion">Seleccion:</label>
        <input class='form-control' type="text" id="seleccion"  onchange="ArchivoSeleccionado()" name="seleccion" >
</div>
<div clas="form-group">
        <label for="ruta">Ruta Seleccionada:</label>
        <input class='form-control' type="text" id="ruta" name="ruta" onchange="ArchivoSeleccionado()"  value='../../archivos' >
        <input type="text" id='accion' name='accion' hidden value='sinaccion'>
</div>
<!-- <div class="col"> -->
<?php

$obj = new control_amarchivo();
$obj->mostrarArchivos2('../../archivos');

?>
    <div class="form-group">
        <h4>Crear Carpeta</h4>
        <label for="carpeta">Nombre de la Carpeta:</label>
        <input type="text" class='form-control' id="carpeta" name="carpeta" placeholder="Nombre de la Carpeta">
        <input type="submit" class="btn btn-primary" value="Nueva Carpeta" onclick="NuevaCarpeta()">        
    </div>
    
</form>
<div class="row">
<form action="amarchivo.php" method='post'>
<input type="text" name="am" id="am" hidden>
        <div class="row form-group ml-auto">
        <h4>Nuevo Archivo</h4>
        <input type="submit" class="btn btn-primary" value="Nuevo Archivo" onclick="NuevoArchivo()">        
        </div>
        <div class="row form-group ml-auto">
        <h4>Modificar Archivo</h4>
        <input type="button" name='btn_modificar' id='btn_modificar' class="btn btn-primary" value="Modificar Archivo" onclick="ModificarArchivo()" >    <!-- ESTOS BOTONES VAN DISABLED, PERO NO PUEDO INVOCAR AL EVENTO QUE LOS PONE ENABLE, EL  -->   
</div>                                                                                                                                                  <!-- EL EVENTO ONCHANGE DE SELECCION NO FUNCIONA CUANDO SE CAMBIA EL VALUE EN LA FUNCION JS DOCUMENT.GETELEMENTBYID -->
        <div class="row form-group ml-auto">
        <h4>Compartir Archivo</h4>
        <input type="button" name='btn_compartir' id='btn_compartir' class="btn btn-primary" value="Compartir Archivo" onclick="CompartirArchivo()" >        
        </div>
</form>
</div>
</div>
</div>









<?php
include_once("../estructura/pie.php")
?>