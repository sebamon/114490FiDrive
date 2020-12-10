<?php 
$Titulo = " AM Archivo"; 
include_once("../estructura/cabeceraBT.php");


if(!$mySession->isLog())
{
        header ($INICIO);
        exit;
}
include_once("../estructura/menuBT.php");
?>


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container-fluid">

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

<!-- ======= Portfolio Details Section ======= -->
<section id="portfolio-details" class="portfolio-details">


    <div class="portfolio-details-container">

    <h1 align="center">Alta y Modificacion de Archivos</h1>
    <form id="amarchivo" name="amarchivo" method="post" action="accion_amarchivo.php" data-toggle="validator" role="form" enctype="multipart/form-data">
 
 <div class="form-group">
 <?php
 //esto es para que no falle si es un archivo nuevo que va a entrar sin parametros
     if(isset($_GET['parametro'])) {
         if($_GET['parametro']=='nuevo')
     {
     echo '<label for="archivo" class="control-label">Seleccione un archivo: </label>';
     echo '<input type="file"  class="form-control" name="archivo" id="archivo" onchange="SugerirIcono()">';
     echo '<input type="text" name="extension" id="extension" hidden>';
     echo '<div class="invalid-feedback">';
 
     echo '</div>';
     echo '</div>';
 }
 }
 
 ?>
 <div class="form-group">
     <label for="nombre" class="control-label">Nombre: </label>
     <?php
     if(isset($_GET['parametro'])) 
     {
         if($_GET['parametro']!='nuevo')
         {
 
         $Abm = new AbmArchivoCargado();
         $elObj=$Abm->buscar($_GET);
 
         echo '<input type="text"  class="form-control" name="acnombre" id="acnombre" value='.$elObj[0]->getacnombre().' readonly> ';
         echo '<input type="text" name="idarchivocargado" id="idarchivocargado" hidden value="'.$_GET['idarchivocargado'].'">';
         }
         else {
             echo '<input type="text"  class="form-control" name="acnombre" id="acnombre" value="" > ';
         }
     }
     ?>
     <div class="invalid-feedback">
 
     </div>
 </div>
 <div class="form-group">
     <label for="descripcion" class="control-label">Descripcion: </label>
     <textarea  id="acdescripcion" class="form-control" name='acdescripcion'>
     <?php
     if(isset($_GET['parametro'])) 
     {
         if($_GET['parametro']!='nuevo')
         {
             echo $elObj[0]->getacdescripcion();
         }
         else {
             echo 'Esta es una descripción generica, si lo necesita la puede cambiar.';
         }
         
     }
     else {
         echo 'Esta es una descripción generica, si lo necesita la puede cambiar.';
     }
     ?>
     </textarea>
     <div class="help-block with-errors">
 
     </div>
 </div>
 <div class="form-group">
 
    
     <label class="control-label" for="usuario">Usuario</label>
   <?php
 
     $select = new AbmUsuario();
     $usuario = array('idusuario'=>$mySession->getidUsuario());
     $objSelect = $select->buscar($usuario);
 
     echo  " <select class='form-control' name='usuario' id='usuario'>";
     echo  " <option value=' '>Seleccion un Usuario</option>";
     foreach($objSelect as $unUsuario){
         if(isset($_GET['parametro'])) 
     {
         if($_GET['parametro']!='nuevo')
         {
         
         if($unUsuario==$elObj[0]->getusuario()){
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
     <label for="icono" class="control-label" >Seleccione el Icono: </label>
     <div class="custom-control custom-radio custom-control-inline ">
     <?php
     if(isset($_GET['parametro'])) 
        {
            if($_GET['parametro']=='modificar')
            {
                if($elObj[0]->getacicono()=='Imagen')
                 echo "<input type='radio' id='radioImagen' name='acicono' class='custom-control-input' value='Imagen' checked>";
            }
            else 
                {
                 echo "<input type='radio' id='radioImagen' name='acicono' class='custom-control-input' value='Imagen'>";
                }
            
         }
     ?>
         <label class="custom-control-label" for="radioImagen"><i class="far fa-image"></i> Imagen  </label>
         
     </div>
     <div class="custom-control custom-radio custom-control-inline ">
     <?php
     if(isset($_GET['parametro'])) 
        {
            if($_GET['parametro']=='modificar')
            {
             if($elObj[0]->getacicono()=='Zip' || $elObj[0]->getacicono()=='Rar')
             echo "<input type='radio' id='radioZip' name='acicono' class='custom-control-input' value='Zip'checked>";
         }
         else {
          echo "<input type='radio' id='radioZip' name='acicono' class='custom-control-input' value='Zip'>";
         }
      }
      ?>
         <label class="custom-control-label" for="radioZip"><i class="far fa-file-archive"></i> Zip  </label>
     </div>
     <div class="custom-control custom-radio custom-control-inline ">
     <?php
     if(isset($_GET['parametro'])) 
        {
            if($_GET['parametro']=='modificar')
            {
             if($elObj[0]->getacicono()=='Doc' || $elObj[0]->getacicono()=='Docx')
             echo "<input type='radio' id='radioDoc' name='acicono' class='custom-control-input' value='Doc' checked>";
         }
         else {
          echo "<input type='radio' id='radioDoc' name='acicono' class='custom-control-input' value='Doc'>";
         }
      }
      ?>
         <label class="custom-control-label" for="radioDoc"><i class="far fa-file-word"></i> Doc  </label>
     </div>
     <div class="custom-control custom-radio custom-control-inline ">
     <?php
     if(isset($_GET['parametro'])) 
        {
            if($_GET['parametro']=='modificar')
            {
             if($elObj[0]->getacicono()=='Pdf')
             echo "<input type='radio' id='radioPdf' name='acicono' class='custom-control-input' value='Pdf' checked>";
            }
            else {
             echo "<input type='radio' id='radioPdf' name='acicono' class='custom-control-input' value='Pdf'>";
            }
         }
         ?>
         <label class="custom-control-label" for="radioPdf"><i class="bx bx-file-pdf"></i> PDF  </label>
     </div>
     <div class="custom-control custom-radio custom-control-inline">
     <?php
     if(isset($_GET['parametro'])) 
        {
            if($_GET['parametro']=='modificar')
            {
             if($elObj[0]->getacicono()=='Xls' || $elObj[0]->getacicono()=='Xlsx')
             echo "<input type='radio' id='radioXls' name='acicono' class='custom-control-input' value='Xls'checked>";
         }
         else {
          echo "<input type='radio' id='radioXls' name='acicono' class='custom-control-input' value='Xls'>";
         }
      }
      ?>
 
         <label class="custom-control-label" for="radioXls"><i class="far fa-file-excel"></i> XLS</label>
     </div>
     <div class="invalid-feedback">
 
     </div>
 </div>
 
 <div class="form-group">
     <input type='number' class="form-control" name='acprotegidoclave' id='acprotegidoclave' hidden> 
     <?php
     if(isset($_GET['parametro'])) 
     {
         if($_GET['parametro']=='nuevo')
             echo "<input type='text' id='accion' name='accion' hidden value='nuevo'>";
         else
             echo '<input type="text" id="accion" name="accion" hidden value="modificar">';
     }
     ?>
     <div class="invalid-feedback">
 
     </div>
 </div>
 <div class="form-group">
 <?php
     if(isset($_GET['parametro'])) 
     {
         if($_GET['parametro']=='nuevo')
             echo "<input id='btn_enviar' class='btn btn-primary btn-block' name='btn_enviar' type='submit' value='Nuevo'>";
         else
             echo "<input id='btn_enviar' class='btn btn-primary btn-block' name='btn_enviar' type='submit' value='Modificar'>";   
     }
 ?>
 </div>
 
 </form>

  
    </div>

   

  
</section><!-- End Portfolio Details Section -->





<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
<!-- <div class="row"> -->

</div>

<?php
include_once("../estructura/pieBT.php")

?>