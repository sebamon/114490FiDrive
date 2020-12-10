<?php 
$Titulo = "Elimiar Archivo Compartido"; 
include_once("../estructura/cabeceraBT.php");


if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
include_once("../estructura/menuBT.php");
if(isset($_GET['parametro'])) 
    {
        if($_GET['parametro']=='descompartir')
        {

        $Abm = new AbmArchivoCargadoEstado();
        $elObj=$Abm->buscar($_GET);
        $elObj=$elObj[0];
        
    }
}
?>


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>Programacion Web Avanzada</h2>
      <ol>
        <li><a href="../main/contenido.php">Contenido</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->
<div class="container-fluid">

<h1 align="center">Descompartir Archivo</h1>
<form id="compartirarchivo" name="compartirarchivo" class="form-group" method="POST" action="accion_amarchivo.php" data-toggle="validator" role="form" enctype="multipart/form-data">
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
    <label for="motivo">Motivo: </label>
    <input type="text"  class="form-control" name='motivo' id='motivo'>
    <div class="invalid-feedback">

    </div>
</div>
    <div class="form-group" >
        <label for="usuario">Usuario</label>
        <!-- <select class="custom-select" name='usuario' id='usuario'> -->
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
    echo  " <option value='".$unUsuario->getidusuario()."' selected>".$unUsuario->getusnombre().' '.$unUsuario->getusapellido()."</option>";
    }
    else {
        echo  " <option value='".$unUsuario->getidusuario()."'>".$unUsuario->getusnombre().' '.$unUsuario->getusapellido()."</option>";
    }
    }
    else {
        echo  " <option value='".$unUsuario->getidusuario()."'>".$unUsuario->getusnombre().' '.$unUsuario->getusapellido()."</option>";
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
    <input type="text" id='accion' name='accion' hidden value='descompartir'>
    <input id="btn_descompartir" class="btn btn-primary btn-block" name="btn_descompartir" type="submit" value="Descompartir Archivo">    
</div>
</form>
</div>
</div>



<?php
include_once("../estructura/pieBT.php")
?>