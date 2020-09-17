<?php

class control_eje7  {

    public function Procesar($datos){
        $valor1 = $datos['valor1'];
        $valor2 = $datos['valor2'];
        $operacion=$datos['operacion'];
    
        switch($operacion)
        {
            case ('Suma'): $resultado=$valor1+$valor2;break;
            case ('Resta'): $resultado=$valor1-$valor2;break;
            case ('Multiplica'): $resultado=$valor1*$valor2;
        }

        $texto = "Hola la operacion ".$operacion.", de el valor ".$valor1." y el valor ".$valor2." da como resultado ".$resultado;
     // print_r($datos);
     return $texto;
    }

   

}
?>