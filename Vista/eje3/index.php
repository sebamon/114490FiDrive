<?php 
$Titulo = " Ejercicio 3"; 
include_once("../estructura/cabecera.php");
?>

<div class="row ml-3">
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<p>
Ejercicio 3
Crear una página php que contenga un formulario HTML como el que se indica en la
imagen (darle formato con CSS), enviar estos datos por el método Post a otra página php
que los reciba y muestre por pantalla un mensaje como el siguiente: “Hola, yo soy
nombre , apellido tengo edad años y vivo en dirección”, usando la información recibida.
Cambiar el método Post por Get y analizar las diferencias

</p>
</div>
<div class="row ml-3">
<!---->
<form  id="formulario3" name="formulario3" method="POST" action="accion.php"  data-toggle="validator" role="form" >
    
    <div class="form-group">
        
        <label for="lbl_nombre" class="control-label">Nombre</label>
        
            <input type="text" class="form-control" name="nombre" size="100" placeholder="Escriba sus nombre completo">
            <div class="invalid-feedback">

            </div>
    </div>
     
    <div class="form-group">
        <label for="lbl_apellido" class="control-label">Apellido</label>
        <input type="text" class="form-control" name="apellido" size="100" placeholder="Escriba todos sus apellidos">
        <div class="invalid-feedback">

        </div> 
    </div>

    <div class="form-group ">
        <label for="lbl_edad" class="control-label">Edad</label>
        <input type="number" class="form-control" name="edad" min="1" placeholder="Escriba su edad, debe ser mayor a 1">
        <div class="invalid-feedback">

        </div> 
    </div>

    <div class="form-group">
        <label for="lbl_direccion" class="control-label">Direccion</label>
        <textarea name="direccion" class="form-control" id="direccion" rows="2" cols="100" placeholder="Escriba su direccion completa"></textarea>
        <div class="invalid-feedback">

        </div> 
    </div>

    <div class="form-group">
        <input id="btn_enviar"  name="btn_enviar" class="btn btn-primary btn-block" type="submit" value="Enviar">
    </div>

</form>


</div>
</body>
<?php 

include_once("../estructura/pie.php");
?>
