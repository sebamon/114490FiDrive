<?php 
$Titulo = "Usuario"; 
include_once("../estructura/cabecera.php");
/*
if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}*/
//$mySession
include_once("../estructura/menu.php");

?>
<div class="col border border-primary">
<div class="row " >
<form id="usuario" name="usuario"  method="post" action="accion_usuario.php" data-toggle="validator" role="form">

    <div class="row ">

        <div class="form-group col-6 " >
            <label for="" class="control-label">Nombre</label>
        </div>
 
        <div class="form-group col-6 ">
            <input type="text" class="form-control" name="usnombre" id="usnombre">
        </div>

    </div>

    <div class="row">

        <div class="form-group col-6">
            <label for="" class="control-label">Apellido</label>
        </div>

        <div class="form-group col-6"> 
            <input type="text" class="form-control" name="usapellido" id="usapellido">
        </div>

    </div>

    <div class="row">
   
        <div class="form-group col-6">
            <label for="" class="control-label">Usuario</label>
        </div>
            
        <div class="form-group col-6">
            <input type="text" class="form-control" name="uslogin" id="uslogin">
        </div>

    </div>

    <div class="row">
   
        <div class="form-group col-6">
            <label for="" class="control-label">Email</label>
        </div>

        <div class="form-group col-6">
            <input type="email" class="form-control" name="usmail" id="usmail">
        </div>

    </div>

    <div class="row">
   
        <div class="form-group col-6">
            <label for="" class="control-label">Password</label>
        </div>

        <div class="form-group col-6">
            <input type="password" class="form-control" name="usclave" id="usclave">
            
        </div>
        
    </div>

    <div class="row">
   
        <div class="form-group col-6">
            <label for="" class="control-label">Confirmar Password</label>
        </div>

        <div class="form-group col-6">
            <input type="password" class="form-control" name="usclave2" id="usclave2" data-match="#usclave" data-match-error="Los Password no coincide">
           
        </div>

    </div>
    <?php
    if($mySession->isLog() and $mySession->isAdmin())
    {
     echo '   <div class="row">';

     echo '   <div class="form-group col-6">';
     echo '       <label for="" class="control-label">Rol</label>';
     echo '   </div>';
     $abmRol = new AbmRol();
     $roles = $abmRol->buscar(null);
     echo '    <div class="form-group col-6">';
     echo  " <select class='form-control' name='rol' id='rol'>";
     echo  " <option value=' '>Seleccion un Rol</option>";
    foreach($roles as $unRol){
        echo " <option value='".$unRol->getidrol()."'>".$unRol->getrodescripcion()."</option>";
    }
        echo  " </select>";
    
     echo '    </div>';
     echo '    </div>';


    }
    ?>

    <div class="row">
    
        <div class="form-group col-6">
            <a href="usuario.php" tabindex="-1" role="button" aria-disabled="true">
            <button class="btn btn-secondary btn-block " type="submit">Reset</button>
            </a> 
        </div>    
        <div class="form-group col-6">
            <button class="btn btn-primary btn-block " type="submit">Nuevo</button>
        </div>    

    </div>

</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>
