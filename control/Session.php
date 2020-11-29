<?php
class Session {

    private $idSession;
    private $idUsuario;
    private $Nombre;
    private $Apellido;
    private $Rol;
    private $mensajeoperacion;

    
    public function __construct()
    {
        $this->idSession='';
        $this->idUsuario='';
        $this->Nombre='';
        $this->Apellido='';
        $this->Rol='';
        $this->mensajeoperacion='';

    }
    public function seteo($idSession,$idUsuario,$Nombre,$Apellido,$Rol)
    {
        $this->setidSession($idSession);
        $this->setidUsuario($idUsuario);
        $this->setNombre($Nombre);
        $this->setApellido($Apellido);
        $this->setRol($Rol);
    }
    public function getidSession()
    {
        return $this->idSession;
    }
    public function setidSession($valor)
    {
        $this->idSession=$valor;
    }
    public function getidUsuario()
    {
        return $this->idUsuario;
    }
    public function setidUsuario($valor)
    {
        $this->idUsuario=$valor;
    }
    public function getNombre()
    {
        return $this->Nombre;
    }
    public function setNombre($valor)
    {
        $this->Nombre=$valor;
    }
    public function getApellido()
    {
        return $this->Apellido;
    }
    public function setApellido($valor)
    {
        $this->Apellido=$valor;
    }

    public function getRol()
    {
        return $this->Rol;
    }
    public function setRol($valor)
    {
        $this->Rol=$valor;
    }
        
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }   
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

            //$this = new Session();
            $this->iniciarSesion();
            $this->setidSession(session_id());
            $this->setidUsuario($myUser->getidusuario());
            $this->setNombre($myUser->getusnombre());
            $this->setApellido($myUser->getusapellido());
            $this->setRol($userrol);

           // $_SESSION=$this; // Con esto no funciona
            $this->assignSession('idUsuario',$this->getidUsuario());
            $this->assignSession('Nombre',$this->getNombre());
            $this->assignSession('Apellido',$this->getApellido());
            $this->assignSession('Rol',$this->getRol());
            $this->assignSession('idSession',$this->getidSession());
            
            $resp=true;
        }

        return $resp;
           

        }

    public function iniciarSesion()
    {/*
        
        //if(!(isset($_SESSION))){}
        $valor=isset($_SESSION);
        if((isset($_SESSION)==false))
            {
                session_start();
               
            }*/
            $valor=session_status();
            if(session_status() !== PHP_SESSION_ACTIVE) 
            @session_start();
            
   }
   public function cerrarSesion()
   {
      
    if(session_status()===PHP_SESSION_ACTIVE or session_status()===PHP_SESSION_NONE)
    {
        session_unset();
        session_destroy();
    }
   }

    
    public function assignSession($nombreVariable,$valor)// Se dejo de utilizar y ahora pasamos el objeto Session al arreglo $_SESSION
    {
        if(isset($nombreVariable) and isset($valor))
        {
            $_SESSION[$nombreVariable]=$valor;
        }
    }
    public function getSession()
    {
        
        $this->seteo($_SESSION['idSession'],$_SESSION['idUsuario'],$_SESSION['Nombre'],$_SESSION['Apellido'],$_SESSION['Rol']);
        

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
        $valor=session_status();
        if (isset($_SESSION['idUsuario'])) // session_status()===PHP_SESSION_ACTIVE
      //  if(session_status()===PHP_SESSION_ACTIVE)
        {
            $resp=true;
            $this->getSession();
        }
        return $resp;
    }
    

}

?>
