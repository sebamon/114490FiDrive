<?php 
$Titulo = "TP2 Ejercicio 4"; 
include_once("../estructura/cabecera.php");
?>

<div class="row border">
<form  id="formularioCinema" name="formularioCinema" method="POST" action="accion.php" data-toggle="validator" role="form">
<h1>Cinem@s</h1>
<div class="row">
    <div class="form-group col-6">
        <label for="titulo" class="control-label">Titulo</label>
            <input type="text" class="form-control" name="titulo" size="100" placeholder="Titulo">
            <div class="help-block with-errors">

            </div>    
    </div>

    <div class="form-group col-6">
        <label for="actores" class="control-label">Actores</label>
            <input type="text" class="form-control" name="actores" size="100" placeholder="Actores">
            <div class="help-block with-errors">

            </div>     
    </div>      
  
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="director" class="control-label">Director</label>
            <input type="text" class="form-control" name="director" size="100" placeholder="Director">
            <div class="help-block with-errors">

            </div>    
    </div>

    <div class="form-group col-6">
        <label for="guion" class="control-label">Guion</label>
            <input type="text" class="form-control" name="guion" size="100" placeholder="Guion">
            <div class="help-block with-errors">

            </div>     
    </div>      
  
</div>

<div class="row">
    <div class="form-group col-6">
        <label for="produccion" class="control-label">Produccion</label>
            <input type="text" class="form-control" name="produccion" size="100">
            <div class="help-block with-errors">

            </div>    
    </div>

    <div class="form-group col-2">
        <label for="año" class="control-label">Año</label>
            <input type="number" class="form-control" name="anio" size="100">
            <div class="help-block with-errors">

            </div>     
    </div>      
</div>
<div class="row">
    <div class="form-group col-6">
        <label for="nacionalidad" class="control-label">Nacionalidad</label>
            <input type="text" class="form-control" name="nacionalidad" size="100">
            <div class="help-block with-errors">

            </div>    
    </div>

    <div class="form-group col-4">
        <label for="genero" class="control-label">Genero</label>
            <select class="form-control" name='genero'>
                <option selected value="comedia">Comedia</option>
                <option value="Drama">Drama</option>
                <option value="Terro">Terror</option>
                <option value="Romantica">Romantica</option>
                <option value="Suspenso">Suspenso</option>
                <option value="Otras">Otras</option>
            </select>
            <div class="help-block with-errors">

            </div>     
    </div>      
  
</div>
<div class="row">
    <div class="form-group col-4">
        <label for="duracion" class="control-label">Duracion</label>
            <input type="numer" class="form-control" name="duracion" size="100">
            <div class="help-block with-errors">
                (minutos)
            </div>    
    </div>

    <div class="form-group col-8">
        <div class="form-group">
            <label for="restriccion" class="control-label">Restriccion de edad</label>
        </div>
            <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" id="radioATP" name="radioEdad" class="custom-control-input" value='ATP'>
                 <label class="custom-control-label" for="radioATP">Apta todo Publico</label>
            </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="radioMas7" name="radioEdad" class="custom-control-input" value='Mas7'>
            <label class="custom-control-label" for="radioMas7">Mayores de 7 años</label>
        </div>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="radioMas18" name="radioEdad" class="custom-control-input" value='Mas18'>
            <label class="custom-control-label" for="radioMas18">Mayores de 18 años</label>
        </div>
        <div class="help-block with-errors">

        </div>
        
    </div>  
</div>

<div class="row">
        <div class="form-group col-12">
            <label for="sinopsis" class="control-label">Sinospis</label>
            <input type="text" class="form-control" name="sinopsis" size="200">
            <div class="help-block with-errors">

            </div>    
        </div>
</div>
<div class="row">
    <div class="col-9"> 
    </div>
    <div class="form-group col-3">
      <button type="submit" name="btn_Enviar" class="btn btn-primary">Enviar</button>
      <button type="reset" class="btn btn-secondary">Borrar</button>
     </div>

</div>

</form>
</div>
</div>
<?php 

include_once("../estructura/pie.php");
?>
