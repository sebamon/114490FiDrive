<?php 
$Titulo = " Ejercicio 2"; 
include_once("../estructura/cabecera.php");
?>

<!-- <div id="contenedor" style="height: 500px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
    <div class="row">
        <p>
            Ejercicio 2
            Crear una página php que contenga un formulario HTML que permita ingresar las horas
            de cursada, de la materia Programación Web Dinámica, por cada día de la semana.
            Enviar los datos del formulario por el método Get a otra página php que los reciba y
            complete un array unidimensional. Visualizar por pantalla la cantidad total de horas que
            se cursan por semana.
        </p>
    </div>

    <div class="row ml-3">
    <form id="formulario2" name="formulario2" method="POST" action="accion.php" data-toggle="validator" role="form">

        <div class="form-group"> 
            <label for="">Lunes:</label>
            <input type="numer" class="form-control" id='lunes'name="lunes" placeholder="">
            <div class="invalid-feedback">

            </div> 
        </div>

        <div class="form-group"> 
            <label for="">Martes:</label>
            <input type="text" class="form-control" id='martes'name="martes" placeholder="">
            <div class="invalid-feedback">

            </div> 
        </div>

        <div class="form-group"> 
            <label for="">Miercoles:</label>
            <input type="number" class="form-control" id='miercoles'name="miercoles" placeholder="" >
            <div class="invalid-feedback">

            </div> 
        </div>

        <div class="form-group"> 
            <label for="">Jueves:</label>
            <input type="number" class="form-control" id='jueves'name="jueves" placeholder="" >
            <div class="invalid-feedback">

            </div> 
        </div>

        <div class="form-group"> 
            <label for="">Viernes:</label>
            <input type="number" class="form-control" id='viernes'name="viernes" placeholder="" >
            <div class="invalid-feedback">

            </div> 
        </div>

        <div class="form-group"> 
            <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">
        </div>
    </form>
    </div>


</div>


<?php 

include_once("../estructura/pie.php");
?>
