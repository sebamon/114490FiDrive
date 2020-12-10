<?php 
$Titulo = "Usuario"; 
include_once("../estructura/cabeceraBT.php");
if($mySession->isLog())
{
    $AbmUser = new AbmUsuario();
    $AbmRol = new AbmRol();
    $AbmUserRol = new AbmUsuarioRol();
    
   if(isset($_GET['user']))
   {
       if(($_GET['user'] == $mySession->getidUsuario()) || $mySession->isAdmin())
       {
        $param= array('idusuario'=>$_GET['user']);
        $unUser =  $AbmUser->buscar($param);
        $unUser=$unUser[0];
        $suRol = $AbmUserRol->ObtenerRol($unUser->getidusuario());
        }
        else
        {
            header($PRINCIPAL);
        }
    }
    
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
        <li><a href="../usuario/gestionusuario.php">Gestion de Usuario</a></li>
        <li>FiDrive 114490</li>
      </ol>
    </div>
    
    </div>

  </div>
</section>
<!-- End Breadcrumbs -->
<div class="container-fluid">

<h1 align="center">Gestion de Usuarios</h1>
<form id="usuario" name="usuario"  method="post" action="accion_usuario.php" data-toggle="validator" role="form">

    <div class="row">

        <div class="form-group col-4 " >
            <label for="" class="control-label">Nombre</label>
        </div>
 
        <div class="form-group col-6 ">
        <?php 
         if(isset($_GET['user']))
         {
             echo "<input type='text' name='idusuario' id='idusuario' hidden value='".$unUser->getidUsuario()."'>";
         }
        if(isset($_GET['user']))
        {
            echo '<input type="text" class="form-control" name="usnombre" id="usnombre" value="'.$unUser->getusnombre().'">';
        }else {
            echo '<input type="text" class="form-control" name="usnombre" id="usnombre">';
        } ?>
            
        </div>
        

    </div>

    <div class="row">

        <div class="form-group col-4">
            <label for="" class="control-label">Apellido</label>
        </div>

        <div class="form-group col-6"> 
        <?php 
       if(isset($_GET['user']))
        {
            echo '<input type="text" class="form-control" name="usapellido" id="usapellido"  value="'.$unUser->getusapellido().'">';
        }
        else {
                echo '<input type="text" class="form-control" name="usapellido" id="usapellido">';
            }
            ?>
        </div>

    </div>

    <div class="row">
   
        <div class="form-group col-4">
            <label for="" class="control-label">Usuario</label>
        </div>
            
        <div class="form-group col-6">
        <?php 
         if(isset($_GET['user']))
        {
            echo '<input type="text" class="form-control" name="uslogin" id="uslogin" readonly value="'.$unUser->getuslogin().'">';
        }
        else {
            echo '<input type="text" class="form-control" name="uslogin" id="uslogin">';
        }
        ?>
        </div>

    </div>

    <div class="row">
   
        <div class="form-group col-4">
            <label for="" class="control-label">Email</label>
        </div>

        <div class="form-group col-6">
        <?php 
          if(isset($_GET['user']))
        {
            echo  '<input type="email" class="form-control" name="usmail" id="usmail" value="'.$unUser->getusmail().'">';
        }
        else {
            echo  '<input type="email" class="form-control" name="usmail" id="usmail">';
        }
           ?>
        </div>

    </div>
    <?php 
          if(!isset($_GET['user']))
        {
        echo '<div class="row">';
   
        echo '<div class="form-group col-4">';
        echo '    <label for="" class="control-label">Password</label>';
        echo ' </div>';

        echo ' <div class="form-group col-6">';
        echo '    <input type="password" class="form-control" name="usclave" id="usclave">';
            
        echo ' </div>';
        
        echo ' </div>';

        echo ' <div class="row">';
   
        echo ' <div class="form-group col-4">';
        echo '    <label for="" class="control-label">Confirmar Password</label>';
        echo ' </div>';

        echo ' <div class="form-group col-6">';
        echo '    <input type="password" class="form-control" name="usclave2" id="usclave2" data-match="#usclave" data-match-error="Los Password no coincide">';
           
        echo ' </div>';

        echo ' </div>';
        }
    if($mySession->isLog() and $mySession->isAdmin())
    {
     echo '   <div class="row">';

     echo '   <div class="form-group col-4">';
     echo '       <label for="" class="control-label">Rol</label>';
     echo '   </div>';
     $roles = $AbmRol->buscar(null);
     echo '    <div class="form-group col-6">';
     echo  " <select class='form-control' name='rol' id='rol'>";
     echo  " <option value=' '>Seleccion un Rol</option>";
    foreach($roles as $unRol){
        if($unRol==$suRol){

            echo " <option value='".$unRol->getidrol()."' selected>".$unRol->getrodescripcion()."</option>";
        
        }
        else{
        echo " <option value='".$unRol->getidrol()."'>".$unRol->getrodescripcion()."</option>";
    }
    }
        echo  " </select>";
    
     echo '    </div>';
     echo '    </div>';


    }
    ?>

    <div class="row">    
        <div class="form-group col-12">
        <?php
      if(isset($_GET['user']))
    {
        echo '<input type="text" name="accion" id="accion" hidden value="Modificar">';
        echo   '<button class="btn btn-primary btn-block " type="submit">Modificar</button>';
        }
        else {
            echo '<input type="text" name="accion" id="accion" hidden value="Nuevo">';
            echo   '<button class="btn btn-primary btn-block " type="submit">Nuevo</button>';        }
            ?>
        </div>    

    </div>

</form>
</div>



<?php
include_once("../estructura/pieBT.php");
?>
