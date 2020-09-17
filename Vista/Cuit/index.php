<?php 
$Titulo = "Cuit"; 
include_once("../estructura/cabecera.php");
?>


<div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" >
<p>
Ingrese CUIT

</p>

<!---->
<form  id="cuit" name="cuit" method="POST" action="accion.php">
<!--<form  id="eje4" name="eje4" method="POST" action="accion.php">-->

<p>Ingrese CUIT: <input type="text" name="cuit" size="100" ></p>
 

<input id="btn_eje7"  name="btn_eje7" type="submit" value="Enviar">

</form >


</div>

<script src="../js/jquery-3.5.1.slim.min.js"></script>
 <script src="../js/popper.min.js"></script>
 <script src="../js/bootstrap.min.js"></script>
</body>
<?php 

include_once("../estructura/pie.php");
?>
