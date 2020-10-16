<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabecera.php");
include_once("../estructura/menu.php");

//esto es para que no falle si es un archivo nuevo que va a entrar sin parametros





?>
<!-- <div class="row"> -->
<form id="amarchivo" name="amarchivo" method="post" action="accion.php" data-toggle="validator" role="form" enctype="multipart/form-data">
 
<div class="form-group">
<?php
    if(!isset($_GET['parametro'])) {
    
    echo '<label for="archivo" class="control-label">Seleccione un archivo: </label>';
    echo '<input type="file"  class="form-control" name="archivo" id="archivo" onchange="SugerirIcono()">';
    echo '<div class="invalid-feedback">';

    echo '</div>';
    echo '</div>';
}
?>
<div class="form-group">
    <label for="nombre" class="control-label">Nombre: </label>
    <?php
    if(isset($_GET['parametro'])) {
    echo '<input type="text"  class="form-control" name="nombre" id="nombre" value='.$_GET['parametro'].' readonly> ';
    }
    else {
        echo '<input type="text"  class="form-control" name="nombre" id="nombre" value="" > ';
    }
    ?>
    <div class="invalid-feedback">

    </div>
</div>
<div class="form-group">
    <label for="descripcion" class="control-label">Descripcion: </label>
    <textarea  id="descripcion" class="form-control" name='descripcion'>
    Esta es una descripción generica, si lo necesita la puede cambiar.
    </textarea>
    <div class="help-block with-errors">

    </div>
</div>
<div class="form-group">

   
    <label class="control-label" for="usuario">Usuario</label>
  
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
    <label for="icono" class="control-label" >Seleccione el Icono: </label>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioImagen" name="radioIcono" class="custom-control-input" value='Imagen'>
       
        <label class="custom-control-label" for="radioImagen"><i class="far fa-image"></i> Imagen  </label>
        
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioZip" name="radioIcono" class="custom-control-input" value='Zip'>
        <label class="custom-control-label" for="radioZip"><i class="far fa-file-archive"></i> Zip  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioDoc" name="radioIcono" class="custom-control-input" value='Doc'>
        <label class="custom-control-label" for="radioDoc"><i class="far fa-file-word"></i> Doc  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline ">
        <input type="radio" id="radioPdf" name="radioIcono" class="custom-control-input" value='Pdf'>
        <label class="custom-control-label" for="radioPdf"><i class="far fa-file-pdf"></i> PDF  </label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="radioXls" name="radioIcono" class="custom-control-input" value='Xls'>
        <label class="custom-control-label" for="radioXls"><i class="far fa-file-excel"></i> XLS</label>
    </div>
    <div class="invalid-feedback">

    </div>
        
</div>

<div class="form-group">
    <input type='number' class="form-control" name='clave' id='clave' hidden> 
    <?php
    if(isset($_GET['clave'])) {
    echo '<input type="text" id="accion" name="accion" hidden value='.$_GET['clave'].'>';
    }
    else {
        echo '<input type="text" id="accion" name="accion" hidden value="0">';
    }
    ?>
    <div class="invalid-feedback">

    </div>
</div>
<div class="form-group">
<?php
    if(!isset($_GET['clave'])) {
    echo '<input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar" onclick="NuevoArchivo()"">';    
}else {
    {
        echo '<input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar" onclick="ModificarArchivo()">';   
    }
}
?>
</div>

</form>
</div>

<?php
include_once("../estructura/pie.php")
?>