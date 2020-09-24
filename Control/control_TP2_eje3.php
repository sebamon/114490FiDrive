<?php

class control_TP2_eje3  {

    public function LogIn($datos)
    {
        $usuarios= [
            "smon" => "seba1234",
            "prueba" => "12345678hola",
            "admin" => "administrador1"
        ];
        $username = $datos["username"];
        $pass = $datos["password"];
        $credenciales="Las credenciales son incorrectas";
        foreach ($usuarios as $clave => $valor) {
          if($clave==$username)
            {
                if($valor==$pass){
                $credenciales="LogIn Exitoso";
                }
            }
            
        }

        return $credenciales;

           
    }
       
    }

?>