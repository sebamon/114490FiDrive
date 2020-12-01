<?php 
include_once("../estructura/cabeceraBT.php");
if(!$mySession->isLog())
{
        header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menuBT.php");

$datos = data_submitted();
$abmusuario = new AbmUsuario();

if($respuesta=$abmusuario->alta($datos))
{
    
}

?>

<?php
     if($respuesta){
        echo '<div class="col alert alert-success" role="alert">';
        echo '<p><b>El Usuario ha sido creado con Exito</b></p></div>';
    }
    else{
    echo '<div class="col alert alert-danger" role="alert">';
    echo '<p><b>No se pudo crear el usuario</b></p></div>';
}

?>
<div class="row">
<a class="btn btn-primary" href="../main/contenido.php" role="button">Atras</a>

</div>
</div>


<?php
include_once("../estructura/pieBT.php");
?>