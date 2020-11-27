<?php
class AbmLogin{

    public function login($param)
    {
        $resp = false;
        
        $myUser = new usuario();
        $myUser->setearCredenciales($param['username'],$param['clave']);
       // $elObjtTabla = $this->objLogin($param);
        if($myUser->loguear())//si encuentra usuario devuelve true
        {
            $abmUserRol=new AbmUsuarioRol();
            $userrol= $abmUserRol->obtenerRol($myUser->getidusuario());

            $mySession = new Session();
            $mySession->setidUsuario($myUser->getidusuario());
            $mySession->setRol($userrol);

            $this->iniciarSesion();

            foreach($mySession as $Parametros)
            {
            $this->assignSession('idUsuario',$myUser->getidUsuario());
            $this->assignSession('Nombre',$myUser->getusnombre());
            $this->assignSession('Apellido',$myUser->getusapellido());
            $this->assignSession('Rol',$userrol);
            }
            $resp=true;
        }

        return $resp;
           

        }

    public function iniciarSesion()
    {
        //if(!(isset($_SESSION))){}
        $valor=session_status();
        if(session_status()!=PHP_SESSION_ACTIVE)
            {
                session_start();
                $_SESSION['idSession']=session_id();
            }
            
   }
   public function cerrarSesion()
   {
       print_r(session_status());
    if(session_status()===PHP_SESSION_ACTIVE or session_status()===PHP_SESSION_NONE)
    {
        session_unset();
        session_destroy();
    }
   }

    
    public function assignSession($nombreVariable,$valor)
    {
        if(isset($nombreVariable) and isset($valor))
        {
            $_SESSION[$nombreVariable]=$valor;
        }
    }
    public function isAdmin(){
        $resp=false;
        if (session_status()===PHP_SESSION_ACTIVE)
        {
            if($_SESSION['Rol']->getidrol()=='1' && $_SESSION['Rol']->getrodescripcion()=='Administrador')
                $resp=true;
        }
        return $resp;
    }
    public function isLog(){
        $resp=false;
        if (session_status()===PHP_SESSION_ACTIVE)
        {
            $resp=true;
        }
        return $resp;
    }

}