<?php
class Session {

    private $ssIdUsuario;
    private $ssNombre;
    private $ssPass;
    private $ssEmail;
    private $ssRol;
    private $ssDescripcionRol;
    

  /*  public function getUsuario()
    {
        return $this->Usuario;
    }

    public function setUsuario($valor)
    {
        $this->Usuario=$valor;
    }

     public function getRol()
    {
        return $this->Rol;
    }
    public function setRol($valor)
    {
        $this->Rol=$valor;
    }
*/
    public function __construct(){
    {
        $this->ssIdUsuario='';
        $this->ssNombre='';
        $this->ssPass='';
        $this->ssEmail='';
        $this->ssRol='';
        $this->ssDescripcionRol='';

    }
    public function getssNombre()
    {
        return $this->ssNombre;
    }
    public function setssNombre($valor)
    {
        $this->ssNombre=$valor;
    }

    public function getssPass()
    {
        return $this->ssPass;
    }
    public function setssPass($valor)
    {
        $this->ssPass=$valor;
    }

    public function getssEmail()
    {
        return $this->ssEmail;
    }
    public function setssEmail($valor)
    {
        $this->ssEmail=$valor;
    }

    public function getssRol()
    {
        return $this->ssRol;
    }
    public function setssRol($valor)
    {
        $this->ssRol=$valor;
    }
        
    public function getssDescripcionRol()
    {
        return $this->ssDescripcionRol;
    }
    public function setssDescripcionRol($valor)
    {
        $this->ssDescripcionRol=$valor;
    }
 

    public function loguear(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE uslogin = '".$this->getusuario()->getuslogin()."' and usclave = '".$this->getusuario()->getusclave()."';";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    //$this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'],$row['usmail'], $row['usclave'], $row['usactivo'],$row['usdeshabilitado']);
                    $usuario= new usuario();
                    $usuario->setidusuario($row['idusuario']);
                    $this->setUsuario($usuario);
                    $resp=true;
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }

    public function iniciar($user,$pass)
    {

        $buscar = array('usnombre');
        $usuario = new usuario();
        $usuario->setussNombre($user);
        $usuario->setussPass($pass);

        $usuario = AbmUsuario::buscar($usuario);
        if(isset($usuario))
        {
            $rol = AbmUsuarioRol::buscar($usuario->getidusuario());
            $this->setUsuario=$usuario;
            if(isset($rol))
            {
                $this->setRol($rol);
            }


        }
        //session_start();
      //  $session = new Session();
        $session->setUsuario($user);
        $session->setssPass($pass);

        //$_SESSION=$session;


    }

    public function validar()
    {


        $abmUser = new AbmUsuario();

        $user = new usuario();
        -
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