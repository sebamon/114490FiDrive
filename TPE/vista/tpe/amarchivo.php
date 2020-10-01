<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");
?>
<div class="col">
<form id="amarchivo" name="amarchivo" method="POST" action="" class="form-group" data-toggle="validator" role="form" enctype="multipart/form-data">

<div class="form-group">
    <label for="nombre">Nombre: </label>
    <input type="text"  class="form-control" name='nombre' id='nombre' value="1234.png" readonly> 
    <div class="invalid-feedback">

    </div>
</div>
<div class="form-group">
    <label for="descripcion">Descripcion: </label>
    <input type="text"  class="form-control" name='descripcion' id='descripcion'>
    <div class="invalid-feedback">

    </div>
</div>
<div class="form-group">

   
    <label class="input-group-text" for="usuario">Usuario</label>
  
    <select class="custom-select" name='usuario' id='usuario'>
        <option value='admin'>Admin</option>
        <option value='visitante'>Visitante</option>
        <option value='usted' selected>Usted</option>
    </select>

    <div class="invalid-feedback">

    </div>

 </div>
<div class="form-group">
    <label for="icono" class="control-label" >Seleccione el Icono: </label>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioImagen" name="radioIcono" class="custom-control-input" value='Imagen'>
        <label class="custom-control-label" for="radioImagen">Imagen  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioZip" name="radioIcono" class="custom-control-input" value='Zip'>
        <label class="custom-control-label" for="radioZip">Zip  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioDoc" name="radioIcono" class="custom-control-input" value='Doc'>
        <label class="custom-control-label" for="radioDoc">Doc  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioPdf" name="radioIcono" class="custom-control-input" value='Pdf'>
        <label class="custom-control-label" for="radioPdf">PDF  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="radioXls" name="radioIcono" class="custom-control-input" value='Xls'>
        <label class="custom-control-label" for="radioXls">XLS</label>
    </div>
    <div class="invalid-feedback">

    </div>
        
</div>
<div class="form-group">
    <label for="clave">Clave: </label>
    <input type="password" class="form-control" name='clave' id='clave'> 
    <div class="invalid-feedback">

    </div>
</div>
<div class="form-group">
    <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">    
</div>

</form>
</div>

<?php
include_once("../estructura/pie.php")
?>