<?php 
$Titulo = " Ejercicio 8"; 
include_once("../estructura/cabecera.php");
?>


<!--<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >-->
<div class=container-fluid>
<p>
La empresa de Cine Cinem@s tiene establecidas diferentes tarifas para las entradas, en
función de la edad y de la condición de estudiante del cliente. Desea que sean los propios
clientes los que puedan calcular el valor de sus entradas a través de una página web. Si
es estudiante o menor de 12 años el precio es de $160, si es estudiante y mayor o igual
de 12 años el precio es de $180, en cualquier otro caso el precio es de $300. Diseñar un
formulario que solicite la edad y permita ingresar si se trata de un estudiante o no. Con
un botón enviar los datos a un script encargado de realizar el cálculo y visualizarlo.
Agregar un botón para limpiar el formulario y volver a consultar.

</p>

<!---->
<form  id="eje8" name="eje8"class="form-group" method="POST" action="accion.php">

<p>Edad: <input type="text" class="form-control" name="edad" size="100" ></p>
<input type="checkbox"  class="form-check-input" name="estudiante" value='true'>Soy Estudiante

<input id="btn_eje7"  name="btn_eje7" class="btn btn-primary" type="submit" value="Enviar">

</form >


</div>


</body>
<?php 

include_once("../estructura/pie.php");
?>
