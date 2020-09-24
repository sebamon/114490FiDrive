<?php

class control_eje6  {

   

    public function verificarFormulario($datos){
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $edad = $datos['edad'];
        $direccion = $datos['direccion'];
        $texto ="";
        $genero= $datos["genero"];
        $estudios= $datos["radioEstudio"];
        $deportes=0;

        if (isset($datos['chkFutbol']) && $datos['chkFutbol'] == 'futbol')
         
             $deportes+=1;
        
        if (isset($datos['chkBasket']) && $datos['chkBasket'] == 'basket')
          
                $deportes+=1;
              if (isset($datos['chkTenis']) && $datos['chkTenis'] == 'tenis')
           
                $deportes+=1;
                
         if (isset($datos['chkVolley']) && $datos['chkVolley'] == 'volley')

        $deportes+=1;
        

       
        $texto=" Hola soy ".$nombre." ".$apellido." mi direccion es ".$direccion." realizo ".$deportes." deportes,  mi género es ".$genero.", mis estudios son ".$estudios;

        if ($edad >=18)
                $texto=$texto." y soy mayor de edad";
        else
                $texto=$texto." y soy menor de edad";

     return $texto;

    }

}
?>