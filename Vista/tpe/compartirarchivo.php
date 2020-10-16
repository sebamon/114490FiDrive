<?php 
$Titulo = "Compartir Archivo"; 
include_once("../estructura/cabecera.php");

include_once("../estructura/menu.php");
?>


<div class="col">
<form id="compartirarchivo" name="compartirarchivo"  method="POST" action="accion.php" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="archivo">Nombre del Archivo:</label>
        <?php
        if(isset($_GET['parametro'])) {
        echo '<input type="text" class="form-control" id="nombre" name="nombre" value="'.$_GET['parametro'].'">';
    }
    ?>

    </div>
    <div class="form-group">
        <label for="cantidaddias">Cantidad de Dias Compartido:</label>
        <input type="number" class="form-control" id="cantidad_dias" name="cantidad_dias" placeholder="0 para ilimitado">
        <div class="invalid-feedback">
        
        </div>
    </div>
    <div class="form-group">
        <label for="cantidaddescargas">Cantidad de Descargas:</label>
        <input type="number" class="form-control" id="cantidad_descargas" name="cantidad_descargas" placeholder="0 para ilimitado">
        <div class="invalid-feedback">
        
        </div>
    </div>
    <div class="form-group" >
        <label for="usuario">Usuario</label>
        <select class="form-control" name='usuario' id='usuario'>
        <option value=' '>Seleccione un Usuario</option>
        <option value='admin'>Admin</option>
        <option value='visitante'>Visitante</option>
        <option value='usted'>Usted</option>
        </select>
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
        <input type="checkbox"  id="pass"  name="pass"  value="true" onclick="CheckPassword()">
        <label class="form-check-label">Protegido con contraseña:</label>
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
            <label for="contraseña">Contraseña:</label>
            <input type="password" class="form-control" name="txtpassword" id="txtpassword" onkeyup='FortalezaPassword()'disabled>
            <span id="passstrength">
            <label id='labelstrengpass'for=""></label></span>
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
        <label for="link">Hash para Compartir:</label>
            <input type="text" class="form-control" id='link' name="link" >
        <div class="invalid-feedback">

        </div>
    </div>
    <div class="form-group">
        <!-- <input id="btn_hash" class="btn btn-primary btn-block" name="btn_hash" type="submit" value="Generar Hash">     -->
        <input id="btn_hash" class="btn btn-primary btn-block" name="btn_hash" type="button" onclick="GenerarHash()" value="Generar Hash">    
    </div>
    <div class="form-group">
        
        <input id="btn_compartir" class="btn btn-primary btn-block" name="btn_compartir" type="submit" value="Compartir">    
    </div>
    <div class="row">
    <input type="text" id='accion' name='accion' hidden value='sinaccion'>
    </div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>