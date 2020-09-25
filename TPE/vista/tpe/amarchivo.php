<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabecera.php");
?>
<div class="container-fluid border float:right">Este el main
<form id="amarchivo" name="amarchivo" method="POST" action="accion.php" data-toggle="validator" role="form" enctype="multipart/formdata">
<div class="row">
    <label for="fileArchivo">Seleccione un archivo</label>
    <input type="file" name='fileArchivo' id='fileArchivo'>
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