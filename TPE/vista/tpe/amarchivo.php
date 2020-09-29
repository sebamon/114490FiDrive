<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabecera.php");
//include_once("../estructura/menu.php");
?>

<div class="row">
<form id="amarchivo" name="amarchivo" method="POST" action="accion.php" data-toggle="validator" role="form" enctype="multipart/form-data">
<div class="row">
    <label for="archivo">Seleccione un archivo</label>
    <input type="file" name='archivo' id='archivo'>
    <div class="text-danger">

    </div>
</div>
<div class="row">
    <label for="usuario">Usuario</label>
    <select class="custom-select" name='usuario' id='usuario'>
    <option value='admin'>Admin</option>
    <option value='visitante'>Visitante</option>
    <option value='usted'>Usted</option>
    </select>
    <div class="text-danger">

    </div>
</div>
<div class="row">
    <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">    
</div>

</form>
</div>
<?php
include_once("../estructura/pie.php")
?>