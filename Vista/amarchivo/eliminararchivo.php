<?php 
$Titulo = "Elimiar Archivo Compartido"; 
include_once("../estructura/cabecera.php");


if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menu.php");
if(isset($_GET['parametro'])) 
    {
        if($_GET['parametro']=='eliminar')
        {

        $Abm = new AbmArchivoCargadoEstado();
        $elObj=$Abm->buscar($_GET);
        $elObj=$elObj[0];
        
    }
}
?>


<div class="col">
<form id="eliminararchivo" name="eliminararchivo" method="POST" action="accion_amarchivo.php" data-toggle="validator" role="form">
    <div class="form-group">
        <label for="archivo">Nombre del Archivo:</label>
        <?php
        
        echo '<input type="text" class="form-control" id="acnombre" name="acnombre" readonly value="'.$elObj->getarchivocargado()->getacnombre().'">';
        echo '<input type="text" id="idarchivocargado" name="idarchivocargado" hidden value="'.$elObj->getarchivocargado()->getidarchivocargado().'">';
    
    ?>
    </div>
    <div class="form-group">
        <label for="cantidad_compartido">Cantidad de Veces Compartido:</label>
        <?php
        if(isset($_GET['parametro'])) 
        {
            echo '<input type="text" class="form-control" name="cantidad_compartido" disabled value="'.$elObj->getarchivocargado()->getaccantidadusada().'">';
        }
        ?>
        
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
        <?php

$select = new AbmUsuario();
$usuario = array('idusuario'=>$mySession->getidUsuario());
$objSelect = $select->buscar($usuario);

echo  " <select class='form-control' name='usuario' id='usuario'>";
echo  " <option value=' '>Seleccion un Usuario</option>";
foreach($objSelect as $unUsuario){
    if(isset($_GET['parametro'])) 
{
    if($_GET['parametro']=='descompartir')
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


?>
        <div class="invalid-feedback">

        </div>
    </div>

    <div class="form-group">
    <input type="text" id='accion' name='accion' hidden value='eliminar'>
    <input id="btn_eliminar" class="btn btn-primary btn-block" name="btn_eliminar" type="submit" value="Elimiar Archivo">    
    </div>
</form>
</div>
</div>



<?php
include_once("../estructura/pie.php")
?>