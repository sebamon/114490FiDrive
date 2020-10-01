<?php 
$Titulo = "Compartir Archivo"; 
include_once("../estructura/cabecera.php");

include_once("../estructura/menu.php");
?>


<div class="col">
<form id="compartirarchivo" name="compartirarchivo" class="form-group" method="POST" action="" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="archivo">Nombre del Archivo: 1234.png</label>

    </div>
    <div class="form-group">
        <label for="cantidaddias">Cantidad de Dias Compartido:</label>
        <input type="text" class="form-control" name="cantidad_dias" placeholder="0 para ilimitado">
        <div class="invalid-feedback">
        
        </div>
    </div>
    <div class="form-group">
        <label for="cantidaddescargas">Cantidad de Descargas:</label>
        <input type="text" class="form-control" name="cantidad_descargas" placeholder="0 para ilimitado">
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
        <input type="checkbox"  id="contraseña"  name="contraseña"  value="true" onclick="CheckPassword()">
        <label class="form-check-label">Protegido con contraseña:</label>
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
        <label for="contraseña">Contraseña:</label>
        <input type="password" class="form-control" name="txtcontraseña" id="txtcontraseña" disabled>
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
        <label for="link">Link para Compartir:</label>
        <input type="text" class="form-control" name="link">
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
    <input id="btn_hash" class="btn btn-primary btn-block" name="btn_hash" type="submit" value="Generar Hash">    
</div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>