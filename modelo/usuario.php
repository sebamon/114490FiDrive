<?php 
class usuario {
    private $idusuario;
    private $usnombre;
    private $usapellido;
    private $uslogin;
    private $usmail;
    private $usclave;
    private $usactivo;
    private $usdeshabilitado;
    private $mensajeoperacion;

    public function __construct(){
        
        $this->idusuario="";
        $this->usnombre="";
        $this->usapellido ="";
        $this->uslogin ="";
        $this->usmail ="";
        $this->usclave ="";
        $this->usactivo ="";
        $this->usdeshabilitado ="";
        $this->mensajeoperacion = "";
    }
    public function setear($idusuario, $usnombre, $usapellido, $uslogin,$usmail, $usclave, $usactivo, $usdeshabilitado)    {
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setusapellido($usapellido);
        $this->setuslogin($uslogin);
        $this->setusmail($usmail);
        $this->setusclave($usclave);
        $this->setusactivo($usactivo);
        $this->setusdeshabilitado($usdeshabilitado);
    }
    public function seteoSesion($idusuario,$usnombre,$usapellido/*,$uslogin,$usmail*/)
    {
        $this->setidusuario($idusuario);
        $this->setusnombre($usnombre);
        $this->setusapellido($usapellido);
       /* $this->setuslogin($uslogin);
        $this->setusmail($usmail);*/
    }
 
    
    
    public function getidusuario(){
        return $this->idusuario;
        
    }
    public function setidusuario($valor){
        $this->idusuario = $valor;
        
    }
    
    public function getusnombre(){
        return $this->usnombre;
        
    }
    public function setusnombre($valor){
        $this->usnombre = $valor;
        
    }
    public function getusapellido(){
        return $this->usapellido;
        
    }
    public function setusapellido($valor){
        $this->usapellido = $valor;
        
    }
    public function getuslogin(){
        return $this->uslogin;
    }
    public function setuslogin($valor){
        $this->uslogin=$valor;
    }
    public function getusmail(){
        return $this->usmail;
    }
    public function setusmail($valor){
        $this->usmail=$valor;
    }
    public function getusclave(){
        return $this->usclave;
    }
    public function setusclave($valor){
        $this->usclave=$valor;
    }
    public function getusactivo(){
        return $this->usactivo;
    }
    public function setusactivo($valor){
        $this->usactivo=$valor;
    }
    public function getusdeshabilitado(){
        return $this->usdeshabilitado;
    }
    public function setusdeshabilitado($valor){
        $this->usdeshabilitado=$valor;
    }
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
    }
    public function setearCredenciales($user,$pass)
    {
        $this->setuslogin($user);
        $this->setusclave($pass);
    }
    
  
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE idusuario = ".$this->getidusuario();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'],$row['usmail'], $row['usclave'], $row['usactivo'],$row['usdeshabilitado']);
                    
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
        $sql="INSERT INTO usuario(usnombre,usapellido,uslogin,usmail,usclave,usactivo)  VALUES('";
        $sql.=$this->getusnombre()."','";
        $sql.=$this->getusapellido()."','";
        $sql.=$this->getuslogin()."','";
        $sql.=$this->getusmail()."','";
        $sql.=$this->getusclave()."',";
        $sql.=$this->getusactivo().");";
    
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidusuario($elid);
                $resp = true;
            } else {
                //$this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
                $this->setmensajeoperacion('No se puedo Ingresar el Usuario');
            }
        } else {
            $this->setmensajeoperacion("No se pudo conectar con la base de datos");
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="update usuario SET usnombre='".$this->getusnombre()."'";
        $sql.=", usapellido='".$this->getusapellido()."'";
        $sql.=", uslogin='".$this->getuslogin()."'";
        $sql.=", usmail='".$this->getusmail()."'";
        $sql.=", usactivo=".$this->getusactivo();
        $sql.=" WHERE idusuario=".$this->getidusuario();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)>=0) {
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
        $sql="DELETE FROM usuario WHERE idusuario=".$this->getidusuario();
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
    public function CambiarEstado($activo){
        $resp = false;
        $base=new BaseDatos();
        $sql="update usuario set usactivo=".$activo." WHERE idusuario=".$this->getidusuario();
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
        $sql="SELECT * FROM usuario ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new usuario();
                    $obj->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'], $row['usmail'],null, $row['usactivo'], $row['usdeshabilitado']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
           // $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    public function loguear(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM usuario WHERE usactivo=1 and uslogin = '".$this->getuslogin()."' and usclave = '".$this->getusclave()."';";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    //$this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'],$row['usmail'], $row['usclave'], $row['usactivo'],$row['usdeshabilitado']);
                    $this->seteoSesion($row['idusuario'],$row['usnombre'], $row['usapellido']);
                    $this->setusclave('');
                    $resp=true;
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    public function resetearPassword()
    {
        $resp = false;
        $base=new BaseDatos();
        $sql="update usuario set usclave='".$this->getusclave()."' WHERE idusuario='".$this->getidusuario()."';";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                
                return true;
            } else {
                $this->setmensajeoperacion("Tabla: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla: ".$base->getError());
        }
        return $resp;
    }
    public function ExisteEmail()
    {
        $resp=false;
        $base=new BaseDatos();
        $sql="select idusuario from usuario where usmail='".$this->getusmail()."';";
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    //$this->setear($row['idusuario'], $row['usnombre'], $row['usapellido'], $row['uslogin'],$row['usmail'], $row['usclave'], $row['usactivo'],$row['usdeshabilitado']);
                    $this->setidusuario($row['idusuario']);
                    $resp=true;
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
    }
    
}


?>