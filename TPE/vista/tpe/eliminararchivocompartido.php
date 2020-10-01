<?php 
$Titulo = "Elimiar Archivo Compartido"; 
include_once("../estructura/cabecera.php");

include_once("../estructura/menu.php");
?>


<div class="col">
<form id="compartirarchivo" name="compartirarchivo" class="form-group" method="POST" action="" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="archivo">Nombre del Archivo: 1234.png</label>

    </div>
    <div class="form-group">
        <label for="cantidad_compartido">Cantidad de Veces Compartido:</label>
        <input type="text" class="form-control" name="cantidad_compartido" disabled>
        <div class="invalid-feedback">
         
        </div>
    </div>
    <div class="form-group">
    <label for="motivo">Motivo: </label>
    <input type="text"  class="form-control" name='motivo' id='motivo'>
    <div class="invalid-feedback">

    </div>
</div>
    <div class="form-group" >
        <label for="usuario">Usuario</label>
        <select class="custom-select" name='usuario' id='usuario'>
        <option value='admin'>Admin</option>
        <option value='visitante'>Visitante</option>
        <option value='usted'>Usted</option>
        </select>
        <div class="invalid-feedback">

        </div>
    </div>

    <div class="form-group">
    <input id="btn_descompartir" class="btn btn-primary btn-block" name="btn_descompartir" type="submit" value="Descompartir Archivo">    
</div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>