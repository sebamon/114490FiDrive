<?php 
$Titulo = " Ejercicio 3"; 
include_once("../estructura/cabecera.php");
?>


<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<p>
Ejercicio 3
Crear una página php que contenga un formulario HTML como el que se indica en la
imagen (darle formato con CSS), enviar estos datos por el método Post a otra página php
que los reciba y muestre por pantalla un mensaje como el siguiente: “Hola, yo soy
nombre , apellido tengo edad años y vivo en dirección”, usando la información recibida.
Cambiar el método Post por Get y analizar las diferencias

</p>

<!---->
<form  id="eje3" name="eje3" method="POST" action="accion.php"  data-toggle="validator" role="form" >
<!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->
    <div class="form-group col-sm-6">
        <label for="lbl_nombre" class="control-label">Nombre</label>
        <input type="text" name="nombre" size="100" placeholder="Escriba sus nombre completo" required>
    </div>
    <div class="form-group col-sm-6">
        <label for="lbl_apellido" class="control-label">Apellido</label>
        <input type="text" name="apellido" size="100" placeholder="Escriba todos sus apellidos" required>
    </div>
    <div class="form-group">
        <label for="lbl_edad" class="control-label">Edad</label>
        <input type="number" name="edad" min="1" placeholder="Escriba su edad, debe ser mayor a 1" required>
    </div>
    <div class="form-group">
        <label for="lbl_direccion" class="control-label">Direccion</label>
        <textarea name="direccion" id="direccion" rows="2" cols="100" placeholder="Escriba su direccion completa"></textarea></p>
    </div>
    <div class="form-group">
        <input id="btn_eje3"  name="btn_eje3" class="btn btn-primary" type="submit" value="Enviar">
    </div>
</form >


</div>

<script src="../js/jquery-3.5.1.slim.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/bootstrapvalidator-0.5.2/dist/js/bootstrapValidator.min.js"></script>
</body>
<?php 

include_once("../estructura/pie.php");
?>
