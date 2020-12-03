<?php 
include_once("../estructura/cabeceraBT.php");
?>
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<?php 
$datos = data_submitted();
//$mySession = new Session();
$datos['clave']=md5($datos['clave']);
if($mySession->login($datos))
{
    $respuesta='Usuario Logueado en el Sistema';
    header("location: ../main/contenido.php");
    exit;

}
else {
    $respuesta='Las Credenciales son incorrectas';
}


include_once("../estructura/menuBT.php");
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
<div class="container">

<h1>Login</h1>

<p>
<b>Respuesta: </b> 
<?php echo $respuesta ?>
</p>
<div class="row">
<a class="btn btn-primary" href="../login/login.php" role="button">Atras</a>
</div>

</div>


<?php 

include_once("../estructura/pieBT.php");
?>
