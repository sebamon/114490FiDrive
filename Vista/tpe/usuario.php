<?php 
$Titulo = "Contenido"; 
include_once("../estructura/cabecera.php");






?>

<form id="usuario" name="usuario"  method="post" action="accion_usuario.php" data-toggle="validator" role="form">

    <div class="row">

        <div class="col col-4">
            <label for="" class="control-label">Nombre</label>
        </div>

        <div class="col col-4">
            <input type="text" class="form-control" name="usnombre" id="usnombre">
        </div>

    </div>

    <div class="row">

        <div class="col col-4">
            <label for="" class="control-label">Apellido</label>
        </div>

        <div class="col col-4"> 
            <input type="text" class="form-control" name="usapellido" id="usapellido">
        </div>

    </div>

    <div class="row">
   
        <div class="col col-4">
            <label for="" class="control-label">Usuario</label>
        </div>
            
        <div class="col col-4">
            <input type="text" class="form-control" name="uslogin" id="uslogin">
        </div>

    </div>

    <div class="row">
   
        <div class="col col-4">
            <label for="" class="control-label">Email</label>
        </div>

        <div class="col col-4">
            <input type="text" class="form-control" name="usmail" id="usmail">
        </div>

    </div>

    <div class="row">
   
        <div class="col col-4">
            <label for="" class="control-label">Password</label>
        </div>

        <div class="col col-4">
            <input type="password" class="form-control" name="usclave" id="usclave">
        </div>

    </div>

    <div class="row">
   
        <div class="col col-4">
            <label for="" class="control-label">Confirmar Password</label>
        </div>

        <div class="col col-4">
            <input type="password" class="form-control" name="usclave2" id="usclave2">
        </div>

    </div>

    <div class="row">
    
        <div class="col col-4">
            <input id='btn_Limpiar' class='btn btn-secondary' name='btn_Limpiar' type='reset' value='Reset'>
        </div>
        <div class="col col-4">
            <input id='btn_nuevo' class='btn btn-primary' name='btn_nuevo' type='submit' value='Nuevo'>
        </div>

    </div>

</form>
</div>

<?php
include_once("../estructura/pie.php")
?>
