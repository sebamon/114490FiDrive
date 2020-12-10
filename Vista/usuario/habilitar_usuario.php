<?php 
$Titulo = "Usuario"; 
include_once("../estructura/cabeceraBT.php");
include_once("../estructura/menuBT.php");
        
if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
if($mySession->isAdmin())
{
if($mySession->isLog() and $mySession->isAdmin())
{
    if(isset($_GET['idusuario']) and isset($_GET['activo']))
    {
        $AbmUser = new AbmUsuario();
        $parametros = array ('idusuario' => $_GET['idusuario'], 'activo' => $_GET['activo']);
        if($respuesta=$AbmUser->HDUsuario($parametros))
        {
            $mensaje='El usuario ha cambiado de estado';
        }
        
    }

}
}
else {
    $mensaje='No tiene Permisos para realizar la accion';
}


?>
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
<h1 align="center">Proceso de Archivos</h1>
<div class="col alert alert-success" role="alert">
<p>
<b>Respuesta: </b> 
<?php echo $mensaje?>
</p>
</br>
<div class="row">
<a class="btn btn-primary" href="../usuario/gestionusuario.php" role="button">Atras</a>

</div>
</div>

<?php
include_once("../estructura/pieBT.php");
?>