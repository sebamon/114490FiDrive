<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
?>
<div class="container-fluid border">Este el main
<form id="amarchivo" name="amarchivo" method="POST" action="accion.php" data-toggle="validator" role="form" enctype="multipart/form-data">
<div class="row">
    <label for="archivo">Seleccione un archivo</label>
    <input type="file" name='archivo' id='archivo'>
    <div class="text-danger">

    </div>
</div>
<div class="row">
    <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">    
</div>

</form>


<?php
include_once("../estructura/pie.php")
?>