<?php 
//$Titulo = "Contenido"; 
include_once("../estructura/cabeceraBT.php");

if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
if(!$mySession->isAdmin())
{
    header ("location: http://localhost/114490fidrive/vista/usuario/usuario.php");
    exit;
}
include_once("../estructura/menuBT.php");
  

$AbmUser= new AbmUsuario();
$listaUsuarios = $AbmUser->buscar(null)






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

<h1 align="center">Gestion de Usuarios</h1>
<!-- Formulario -->
<form>
<div class="form-group">
        <label for="nuevo" class="">Nuevo</label>
        <a href='../usuario/usuario.php'><button type="button" class="btn btn-primary">+</button></a>
</div>
<div class="form-group">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Usuario</th>
      <th scope="col">Email</th>
      <th scope="col">Rol</th>
      <th scope="col">Perfil</th>
      <th scope="col">Password</th>
      <th scope="col">Activo</th>
      
    </tr>
    </thead>
<?php	

 if( count($listaUsuarios)>0)
 {
     $i=1;
     echo '<tbody>';
    foreach ($listaUsuarios as $unUsuario) 
    { 
        $AbmUserRol= new AbmUsuarioRol();
        $elRol = $AbmUserRol->ObtenerRol($unUsuario->getidusuario());

        echo '<tr>';
        echo '<th scope="row">'.$i.'</th>';
        echo '<td>'.$unUsuario->getusnombre().'</td>';
        echo '<td>'.$unUsuario->getusapellido().'</td>';
        echo '<td>'.$unUsuario->getuslogin().'</td>';
        echo '<td>'.$unUsuario->getusmail().'</td>';
        echo '<td>'.$elRol->getrodescripcion().'</td>';
        echo '<td><a class="btn btn-info" href="usuario.php?user='.$unUsuario->getidUsuario().'">Modificar</a></td>';
        echo '<td><a class="btn btn-primary" href="../login/recuperar_contrasena.php?user='.$unUsuario->getidUsuario().'">Reset</a></td>';
        if($unUsuario->getusactivo()){
        echo '<td> <a class="btn btn-danger" href="habilitar_usuario.php?idusuario='.$unUsuario->getidUsuario().'&activo=0">Deshabilitar
        </a></td>';
      }
      else {
        echo '<td><a class="btn btn-outline-danger" href="habilitar_usuario.php?idusuario='.$unUsuario->getidUsuario().'&activo=1">Habilitar</a></td>';
      }
        echo '</tr>';
        $i++;
    }
    echo '</tbody>';
    echo'</table>';


}
?>

</div>

</form>

<!-- /Formulario -->



<?php
include_once("../estructura/pieBT.php");
?>