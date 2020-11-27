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

            $this->assignSession('idUsuario',$myUser->getidUsuario());
            $this->assignSession('Nombre',$myUser->getusnombre());
            $this->assignSession('Apellido',$myUser->getusapellido());
            $this->assignSession('Rol',$userrol);
            $resp=true;
        }

        return $resp;
           

        }

    public function iniciarSesion()
    {
        if($_SESSION!=null){
            session_start();
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