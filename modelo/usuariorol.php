<?php 
class usuariorol {
    private $usuario;
    private $rol;
    private $mensajeoperacion;
   
    public function __construct(){
        
        $this->usuario=new usuario();
        $this->rol=new rol();
        $this->mensajeoperacion ="";
        
    }
    public function setear($usuario, $rol)    {
        $this->setusuario($usuario);
        $this->setrol($rol);
    }
    
    
    
    public function getusuario(){
        return $this->usuario;
        
    }
    public function setusuario($valor){
        $this->usuario = $valor;
        
    }
    
    public function getrol(){
        return $this->rol;
        
    }
    public function setrol($valor){
        $this->rol = $valor;
        
    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol WHERE idusuario = ".$this->getusuario()->getidusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();

                    $unUsuario = new usuario();
                    $unUsuario->setidusuario($row['idusuario']);
                    $unUsuario->cargar();

                    $unRol= new rol();
                    $unRol->setidrol($row['idrol']);
                    $unRol->cargar();

                    $this->setear($unUsuario,$unRol);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO usuariorol(idusuario,idrol)  VALUES(";
        $sql.=$this->getusuario()->getidusuario().",".$this->getrol()->getidrol().");";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
               // $this->setId($elid); //ACA NO NECESITO QUE DEVUELVA EL ID
                $resp = true;
            } else {
                //$this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE usuariorol SET idrol=".$this->getrol()->getidrol()." WHERE idusuario=".$this->getusuario()->getidusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->modificar: ".$base->getError());
        }
        return $resp;
    }
    
    public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM usuariorol WHERE idusuario=".$this->getusuario()->getidusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: ".$base->getError());
        }
        return $resp;
    }
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM usuariorol ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuariorol();

                    $unUsuario = new usuario();
                    $unUsuario->setidusuario($row['idusuario']);
                    $unUsuario->cargar();

                    $unRol= new rol();
                    $unRol->setidrol($row['idrol']);
                    $unRol->cargar();


                    $obj->setear($unUsuario, $unRol);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
        //$this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>