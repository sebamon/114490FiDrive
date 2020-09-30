<?php 
$Titulo = "Compartir Archivo"; 
include_once("../estructura/cabecera.php");

// include_once("../../../vista/estructura/cabecera.php");
include_once("../estructura/menu.php");
?>


<div class="container-fluid">
<form id="compartirarchivo" name="compartirarchivo" class="form-group" method="POST" action="accion.php" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div class="row form-group">
        <label for="archivo">Nombre del Archivo:</label>

    </div>
    <div class="row">
        <label for="cantidaddias">Cantidad de Dias Compartido:</label>
        <input type="text" class="form-control" name="cantidad_dias">
        <div class="help-block with-errors">

        </div>
    </div>
    <div class="row">
        <label for="cantidaddescargas">Cantidad de Descargas:</label>
        <input type="text" class="form-control" name="cantidad_descargas">
        <div class="help-block with-errors">

        </div>
    </div>
    <div class="row" >
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
        <input type="checkbox"  id="contraseña"  name="contraseña"  value="true">
        <label class="form-check-label">Protegido con contraseña:</label>
        <div class="text-danger">

        </div>
    </div>
    <div class="row">
        <label for="contraseña">Contraseña:</label>
        <input type="password" class="form-control" name="contraseña">
        <div class="help-block with-errors">

        </div>
    </div>

</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>