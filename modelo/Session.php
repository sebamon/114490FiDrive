<?php
class Session {

    private $idSession;
    private $idUsuario;
    private $Rol;
    private $mensajeoperacion;

    
    public function __construct()
    {
        $this->idSession='';
        $this->idUsuario='';
        $this->Rol='';
        $this->mensajeoperacion='';

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

   

    public function NuevaSesion()
    {
        $mySession = new Session();

    }

    public function validar()
    {


        $abmUser = new AbmUsuario();

        $user = new usuario();
        
        $user= $abmUser->buscar($this->getUsuario());

        
        
        
    }

    public function activa()
    {
        $activo=false;
        if(isset($this))
        {
            $activo=true;
        }

        return $activo;
    }

    public function cerrar()
    {
        session_unset();
        session_destroy();
    }



}

?>