<?php 
$Titulo = " Ejercicio 1"; 
include_once("../estructura/cabecera.php");
?>

<!-- <div id="contenido" style="height: 400px; width: 89%; border: 2px solid red; border-radius: 5px;margin-left:10.5%;" > -->
<!-- <div class="container-fluid"> no puedo ponerlo a la derecha -->
    <div class="row">
        <!-- <div class="col-12 mb-3"> -->
        <p>
            Ejercicio 1
            Confeccionar un formulario que solicite un número. Al pulsar el botón de enviar debe
            llamar a un script –vernumero.php- (accion.php) y visualizar un mensaje que indique si el número
            enviado fue: positivo, cero o negativo. Añadir un link, a la página que visualiza la
            respuesta, que permita volver a la página anterior.
        </p>
        <!-- </div> -->
    </div>

        <div class="row">
                <form  id="formulario" name="formulario" method="POST" action="accion.php" data-toggle="validator" role="form">
                <div class="form-group">
                    <label class="control-label">Numero: </label>
                    <input type="number" class="form-control" name="numero" placeholder="Ingrese un Numero"></p>       
                    <div class="invalid-feedback">

                    </div>                         
                    <input id="btn_enviar" class="btn btn-primary btn-block" name="btn_enviar" type="submit" value="Enviar">
                </div>
                </form >
        </div>
        

        </div>
        
<?php 

include_once("../estructura/pie.php");
?>
