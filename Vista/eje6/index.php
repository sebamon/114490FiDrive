<?php 
$Titulo = " Ejercicio 6"; 
include_once("../estructura/cabecera.php");
?>


<div class="row">
    <p>Ejercicio 6
</br>    
Modificar el formulario del ejercicio anterior para que permita seleccionar los diferentes
deportes que practica (futbol, basket, tennis, voley) un alumno. Mostrar en la página
que procesa el formulario la cantidad de deportes que practica.
    </p>
</div>

<div class="row ml-3">
    <form  id="formulario5" name="formulario5" method="POST" action="accion.php" data-toggle="validator" role="form">

    <div class="form-group">
        <label for="nombre" class="control-label">Nombre</label>
      
            <input type="text" class="form-control" name="nombre" size="100" placeholder="Escriba sus nombre completo">
            <div class="help-block with-errors">

            </div>
        
    </div> 

    <div class="form-group">
        <label for="apellido" class="control-label">Apellido</label>
        
            <input type="text" class="form-control" name="apellido" size="100" placeholder="Escriba todos sus apellidos">
            <div class="help-block with-errors">

            </div>
        
    </div>

    <div class="form-group">
        <label for="edad" class="control-label">Edad</label>
        
            <input type="number" class="form-control" name="edad" min="1" placeholder="Escriba su edad, debe ser mayor a 1">
            <div class="help-block with-errors">

            </div>
        
    </div>
    <div class="form-group">
    <label for="direccion" class="control-label" >Direccion</label>
        
        <textarea name="direccion" class="form-control" id="direccion" rows="2" cols="100" placeholder="Escriba su direccion completa"></textarea>
            <div class="help-block with-errors">

            </div>
        
    </div>


    <div class="form-group">
    <label for="Estudios" class="control-label" >Estudios:  </label>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="radioEstudio1" name="radioEstudio" class="custom-control-input" value='Sin Estudios'>
        <label class="custom-control-label" for="radioEstudio1">Sin Estudios</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="radioEstudio2" name="radioEstudio" class="custom-control-input" value='Estudios Primarios'>
        <label class="custom-control-label" for="radioEstudio2">Estudios Primarios</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="radioEstudio3" name="radioEstudio" class="custom-control-input" value='Estudios Secundarios'>
        <label class="custom-control-label" for="radioEstudio3">Estudios Secundarios</label>
    </div>
        
            <div class="help-block with-errors">

            </div>
        
    </div>
    <div class="form-group">
    <label for="Sexo" class="control-label" >Sexo:  </label>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="generoM" name="genero" class="custom-control-input" value='Masculino'>
        <label class="custom-control-label" for="generoM">Masculino</label>
    </div>
    <div class="custom-control custom-radio custom-control-inline">
        <input type="radio" id="generoF" name="genero" class="custom-control-input" value='Femenino'>
        <label class="custom-control-label" for="generoF">Femenino</label>
    </div>
    </div>


    <div class="form-group">
        <label for="deportes">Deportes que Practica:</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="chkFutbol" value="futbol" name="chkFutbol">
            <label class="form-check-label" for="inlineCheckbox1">Futbol</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="chkBasket" value="basket" name="chkBasket">
            <label class="form-check-label" for="inlineCheckbox2">Basket</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="chkTenis" value="tenis" name="chkTenis">
            <label class="form-check-label" for="inlineCheckbox3">Tenis</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="chkVolley" value="volley" name="chkVolley">
            <label class="form-check-label" for="inlineCheckbox3">Volley</label>
        </div>
    </div>


    <div class="form-group">
    <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">
    </div>
</form>


</div>

</div>



</body>
<?php 

include_once("../estructura/pie.php");
?>
