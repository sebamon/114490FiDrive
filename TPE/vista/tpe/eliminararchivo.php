<?php 
$Titulo = "Elimiar Archivo Compartido"; 
include_once("../estructura/cabecera.php");

include_once("../estructura/menu.php");
?>


<div class="col">
<form id="eliminararchivo" name="eliminararchivo" method="POST" action="" data-toggle="validator" role="form">
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
    <label for="motivo">Motivo de Eliminacion: </label>
    <input type="text"  class="form-control" name='motivo' id='motivo'>
    <div class="invalid-feedback">

    </div>
</div>
    <div class="form-group" >
        <label for="usuario">Usuario</label>
        <select class="form-control" name='usuario' id='usuario'>
        <option value=" ">Seleccion un Usuario</option>
        <option value='admin'>Admin</option>
        <option value='visitante'>Visitante</option>
        <option value='usted'>Usted</option>
        </select>
        <div class="invalid-feedback">

        </div>
    </div>

    <div class="form-group">
    <input id="btn_eliminar" class="btn btn-primary btn-block" name="btn_eliminar" type="submit" value="Elimiar Archivo">    
    </div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>