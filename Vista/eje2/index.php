<?php 
$Titulo = " Ejercicio 2"; 
include_once("../estructura/cabecera.php");
?>


<div id="contenedor" style="height: 500px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<p>
Ejercicio 2
Crear una página php que contenga un formulario HTML que permita ingresar las horas
de cursada, de la materia Programación Web Dinámica, por cada día de la semana.
Enviar los datos del formulario por el método Get a otra página php que los reciba y
complete un array unidimensional. Visualizar por pantalla la cantidad total de horas que
se cursan por semana.
</p>


<form id="eje2" name="eje2" method="GET" action="accion.php" data-toggle="validator" role="form">

<div class="form-group"> 
    <label for="">Lunes:</label>
    <input type="number" class="form-control" id='lunes'name="lunes" placeholder="" required>
</div>
<div class="form-group"> 
    <label for="">Martes:</label>
    <input type="number" class="form-control" id='martes'name="martes" placeholder="" required>
</div>
<div class="form-group"> 
    <label for="">Miercoles:</label>
    <input type="number" class="form-control" id='miercoles'name="miercoles" placeholder="" required>
</div>
<div class="form-group"> 
    <label for="">Jueves:</label>
    <input type="number" class="form-control" id='jueves'name="jueves" placeholder="" required>
</div>
<div class="form-group"> 
    <label for="">Viernes:</label>
    <input type="number" class="form-control" id='viernes'name="viernes" placeholder="" required>
</div>

<div class="form-group"> 
    <input id="btn_eje2"  name="btn_eje2" type="submit" value="Enviar">
</div>
</form>


</div>


<script src="../js/jquery-3.5.1.slim.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
 <script src="../js/bootstrapvalidator-0.5.2/dist/js/bootstrapValidator.min.js"></script>
</body>
<?php 

include_once("../estructura/pie.php");
?>
