<?php 
$Titulo = " Ejercicio 7"; 
include_once("../estructura/cabecera.php");
?>


<div class="row">
    <p>Ejercicio 7
</br>    
Crear una página con un formulario que contenga dos input de tipo text y un select. En
los inputs se ingresarán números y el select debe dar la opción de una operación
matemática que podrá resolverse usando los números ingresados. En la página que
procesa la información se debe mostrar por pantalla la operación seleccionada, cada
uno de los operandos y el resultado obtenido de resolver la operación. Ejemplo del
formulario:
    </p>
</div>

<div class="row ml-3">
    <form  id="formulario7" name="formulario7" method="POST" action="accion.php" data-toggle="validator" role="form">

    <div class="form-group">
        <label for="primernumero" class="control-label">Primer Digito</label>
      
            <input type="text" name="primervalor" class="form-control" size="100">
            <div class="help-block with-errors">

            </div>
        
    </div> 
    <div class="form-group">
        <label for="segundonumero" class="control-label">Segundo Digito</label>
      
            <input type="text" name="segundovalor" class="form-control"  size="100">
            <div class="help-block with-errors">

            </div>
        
    </div>

    <div class="form-group">
        <label for="operador" class="control-label">Operacion</label>
        <select class="custom-select" name='operador'>
            <option selected value="sumar">SUMAR</option>
            <option value="restar">RESTAR</option>
            <option value="multiplicar">MULTIPLICAR</option>
            <option value="dividir">DIVIDIR</option>
        </select>
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
