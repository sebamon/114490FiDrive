<?php
class AbmLogin{

    public function login($param)
    {
        $resp = false;
        
        $elObjtTabla = $this->objLogin($param);
        if($elObjtTabla!=null)
        {
            $resp=true;
            $mySession = new Session();
            $mySession->setUsuario($elObjtTabla);
            if($mySession->loguear())//si encuentra usuario devuelve true
            {
                $abmUserRol=new AbmUsuarioRol();
                $userrol= $abmUserRol->obtenerRol($mySession->getusuario()->getidusuario());
                $mySession->getUsuario($userrol->getUsuario());
                $mySession->setRol($userrol->getRol());


                session_start();


                $_SESSION=$mySession;

            }
            else {
                $resp='Las credenciales son incorrectas';
            }

        }
        

        return $resp;
           

        }

    public function objLogin($param)
    {
        $obj = new usuario();
        $obj->setuslogin($param['username']);
        $obj->setusclave($param['clave']);

        return $obj;
    }

}