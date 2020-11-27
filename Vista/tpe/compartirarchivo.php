<?php 
$Titulo = "Compartir Archivo"; 
include_once("../estructura/cabecera.php");

include_once("../estructura/menu.php");
$myLogin = new AbmLogin();
$myLogin->iniciarSesion();
if(!$myLogin->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/tpe/login.php");
        
}
else {
if(isset($_GET['parametro'])) 
    {
        if($_GET['parametro']=='compartir')
        {

        $Abm = new AbmArchivoCargado();
        $elObj=$Abm->buscar($_GET);
        $elObj=$elObj[0];
        
    }
}
}
?>

<div class="col">
<form id="compartirarchivo" name="compartirarchivo"  method="POST" action="accion_amarchivo.php" data-toggle="validator" role="form" enctype="multipart/form-data">
    <div class="form-group">
        <label for="archivo">Nombre del Archivo:</label>
        <?php
        
        echo '<input type="text" class="form-control" id="acnombre" name="acnombre" readonly value="'.$elObj->getacnombre().'">';
        echo '<input type="text" id="idarchivocargado" name="idarchivocargado" hidden value="'.$elObj->getidarchivocargado().'">';
    
    ?>

    </div>
    <div class="form-group">
        <label for="cantidaddias">Cantidad de Dias Compartido:</label>
        
        <input type="number" class="form-control" id="cantidad_dias" name="cantidad_dias" placeholder="0 para ilimitado" >
        
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
        <?php
$myLogin = new AbmLogin();
$myLogin->iniciarSesion();
if(!$myLogin->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/tpe/login.php");
        
}
else {
    $select = new AbmUsuario();
    $objSelect = $select->buscar(null);

    echo  " <select class='form-control' name='usuario' id='usuario'>";
    echo  " <option value=' '>Seleccion un Usuario</option>";
    foreach($objSelect as $unUsuario){
        if(isset($_GET['parametro'])) 
    {
        if($_GET['parametro']!='nuevo')
        {
        
        if($unUsuario==$elObj->getusuario()){
        echo  " <option value='".$unUsuario->getidusuario()."' selected>".$unUsuario->getusapellido()."</option>";
        }
        else {
            echo  " <option value='".$unUsuario->getidusuario()."'>".$unUsuario->getusapellido()."</option>";
        }
        }
        else {
            echo  " <option value='".$unUsuario->getidusuario()."'>".$unUsuario->getusapellido()."</option>";
        }
        
    
    
    }
   // 
    }
    

    echo  " </select>";
}
   ?>
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
            <input type="text" class="form-control" readonly id='link' name="link" >
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
    <input type="text" id='accion' name='accion' hidden value='compartir'>
    </div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>