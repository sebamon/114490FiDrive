<?php

class control_eje8  {

    public function CalcularValor($datos){
  
            $edad = $datos['edad'];
         /*   if($datos['estudiante']!=null)
            {
                $estudiante=$datos['estudiante'];
            }
            else
            {
                $estudiante="";
            }*/
            
            if(isset($datos['estudiante'])){ // ESTO LO TUVE QUE BUSCAR, PORQUE ME TIRABA EL MENSAJE Undefined index en un checkbox, Si bien calculaba bien el resultado, escribia ese mensaje de error.
                $estudiante = $datos['estudiante'];
            }else{
                $estudiante = "";#default value
            }
           
            if($edad < 12 )
            {
                $resultado=160;
                $resultado = "El valor de la entrada para una persona de ".$edad." años el valor de la entrada es de $".$resultado."";
            }
            else
            {

                if($estudiante=="true")
                {
                    $resultado=180;
                    $resultado = "El valor de la entrada para una persona de ".$edad." años y siendo estudiante el valor de la entrada es de $".$resultado."";
                }
                else
                {
                    $resultado=300;
                    $resultado = "El valor de la entrada para una persona de ".$edad." años y no siendo estudiante el valor de la entrada es de $".$resultado."";
                }
            }
            return $resultado;
        }
       
    }

?>