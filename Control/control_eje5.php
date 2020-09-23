<?php

class control_eje5  {

   

    public function verificarFormulario($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $texto ="";
        $genero= $datos["genero"];
        $estudios= $datos["radioEstudio"];
       
        $texto=" Hola soy ".$nombre." ".$apellido." mi direccion es ".$direccion." mi género es ".$genero.", mis estudios son ".$estudios;

        if ($edad >=18)
                $texto=$texto." y soy mayor de edad";
        else
                $texto=$texto." y soy menor de edad";

     return $texto;

    }

}
?>