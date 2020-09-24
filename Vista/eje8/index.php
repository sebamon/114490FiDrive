<?php 
$Titulo = " Ejercicio 8"; 
include_once("../estructura/cabecera.php");
?>

<div class="row">
<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<!--<div class="contenido">-->
<p>EJERCICIO 8 </br>
La empresa de Cine Cinem@s tiene establecidas diferentes tarifas para las entradas, en
función de la edad y de la condición de estudiante del cliente. Desea que sean los propios
clientes los que puedan calcular el valor de sus entradas a través de una página web. Si
es estudiante o menor de 12 años el precio es de $160, si es estudiante y mayor o igual
de 12 años el precio es de $180, en cualquier otro caso el precio es de $300. Diseñar un
formulario que solicite la edad y permita ingresar si se trata de un estudiante o no. Con
un botón enviar los datos a un script encargado de realizar el cálculo y visualizarlo.
Agregar un botón para limpiar el formulario y volver a consultar.

</p>
</div>

<div class="row ml-3">
<!-- <form  id="formulario8" name="formulario8" class="form-group" method="POST" action="accion.php" onSubmit="return VerificarEdad();"> -->
<form  id="formulario8" name="formulario8" class="form-group" method="POST" action="accion.php" data-toggle="validator" role="form">
<div class="form-group">
    <label for="edad" class="control-label">Edad:</label>
    <input type="number" class="form-control" id='edad'name="edad" min=1 placeholder="Ingrese Edad">
</div>
<div class="form-group form-check">
    <label class="form-check-label">Soy Estudiante:</label>
    <input type="checkbox" class="form-check-input" id="estudiante"  name="estudiante"  value="true">
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-primary btn-block">Calcular</button>
  </div>

</form >


</div>
</div>


<?php 

include_once("../estructura/pie.php");
?>
