<?php

class control_eje7  {

    public function Procesar($datos){
        $valor1 = $datos['primervalor'];
        $valor2 = $datos['segundovalor'];
        $operacion=$datos['operador'];
    
        if($operacion=="dividir")
        {
            if($valor2==0)
            {
                $texto="Imposible dividir por 0";
            }
            else{
                $resultado=$valor1/$valor2;
                    $texto="Hola la operacion ".$operacion.", de el valor ".$valor1." y el valor ".$valor2." da como resultado ".$resultado;
                }
        }
        else
        {
            switch($operacion)
            {
                case ('sumar'): $resultado=$valor1+$valor2;break;
                case ('restar'): $resultado=$valor1-$valor2;break;
                case ('multiplicar'): $resultado=$valor1*$valor2;                   
            }
            $texto = "Hola la operacion ".$operacion.", de el valor ".$valor1." y el valor ".$valor2." da como resultado ".$resultado;
        }
     return $texto;
    }

   

}
?>