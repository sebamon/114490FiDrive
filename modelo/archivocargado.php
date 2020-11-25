<?php 
class archivocargado {
    private $idarchivocargado;
    private $acnombre;
    private $acdescripcion;
    private $acicono;
    private $usuario;
    private $aclinkacceso;
    private $accantidaddescarga;
    private $accantidadusada;
    private $acfechainiciocompartir;
    private $acefechafincompartir;
    private $acprotegidoclave;
    private $mensajeoperacion;
   
    public function __construct(){
        
        $this->idarchivocargado="";
        $this->acnombre="";
        $this->acdescripcion ="";
        $this->acicono="";
        $this->usuario="";
        $this->aclinkacceso="";
        $this->accantidaddescarga="";
        $this->accantidadusada="";
        $this->acfechainiciocompartir="";
        $this->acefechafincompartir="";
        $this->acprotegidoclave="";
        $this->mensajeoperacion ="";

    }
    public function setear($idarchivocargado, $acnombre, $acdescripcion, $acicono, $usuario, 
    $aclinkacceso, $accantidaddescarga, $accantidadusada, $acfechainiciocompartir, $acefechafincompartir,$acprotegidoclave)    {
        $this->setidarchivocargado($idarchivocargado);
        $this->setacnombre($acnombre);
        $this->setacdescripcion($acdescripcion);
        $this->setacicono($acicono);
        $this->setusuario($usuario);
        $this->setaclinkacceso($aclinkacceso);
        $this->setaccantidaddescarga($accantidaddescarga);
        $this->setaccantidadusada($accantidadusada);
        $this->setacfechainiciocompartir($acfechainiciocompartir);
        $this->setacefechafincompartir($acefechafincompartir);
        $this->setacprotegidoclave($acprotegidoclave);

    }
    public function seteocorto($acnombre,$acdescripcion,$acicono,$usuario)
    {
        $this->setacnombre($acnombre);
        $this->setacdescripcion($acdescripcion);
        $this->setacicono($acicono);
        $this->setusuario($usuario);
    }
    
    
    
    public function getidarchivocargado(){
        return $this->idarchivocargado;
        
    }
    public function setidarchivocargado($valor){
        $this->idarchivocargado = $valor;
        
    }
    
    public function getacnombre(){
        return $this->acnombre;
        
    }
    public function setacnombre($valor){
        $this->acnombre = $valor;
        
    }
    public function getacdescripcion(){
        return $this->acdescripcion;
        
    }
    public function setacdescripcion($valor){
        $this->acdescripcion = $valor;
        
    }
    public function getacicono(){
        return $this->acicono;
        
    }
    public function setacicono($valor){
        $this->acicono = $valor;
        
    }   public function getusuario(){
        return $this->usuario;
        
    }
    public function setusuario($valor){
        $this->usuario = $valor;
        
    }   public function getaclinkacceso(){
        return $this->aclinkacceso;
        
    }
    public function setaclinkacceso($valor){
        $this->aclinkacceso = $valor;
        
    }   public function getaccantidaddescarga(){
        return $this->accantidaddescarga;
        
    }
    public function setaccantidaddescarga($valor){
        $this->accantidaddescarga = $valor;
        
    }   public function getaccantidadusada(){
        return $this->accantidadusada;
        
    }
    public function setaccantidadusada($valor){
        $this->accantidadusada = $valor;
        
    }   public function getacfechainiciocompartir(){
        return $this->acfechainiciocompartir;
        
    }
    public function setacfechainiciocompartir($valor){
        $this->acfechainiciocompartir = $valor;
        
    }   public function getacefechafincompartir(){
        return $this->acefechafincompartir;
        
    }
    public function setacefechafincompartir($valor){
        $this->acefechafincompartir = $valor;
        
    }   public function getacprotegidoclave(){
        return $this->acprotegidoclave;
        
    }
    public function setacprotegidoclave($valor){
        $this->acprotegidoclave = $valor;
        
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
        $sql="SELECT * FROM archivocargado WHERE idarchivocargado = ".$this->getidarchivocargado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $usuario = new usuario();
                    $usuario->setidusuario($row['idusuario']);
                    $usuario->cargar();

                    $this->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $usuario, $row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir'], $row['acefechafincompartir'], $row['acprotegidoclave']);
                    
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
        return $resp;
    
        
    }
    
    public function insertarNuevo(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargado(acnombre,acdescripcion,acicono,idusuario)  VALUES('";
        $sql.=$this->getacnombre()."','";
        $sql.=$this->getacdescripcion()."','";
        $sql.=$this->getacicono()."','";
        $sql.=$this->getusuario()->getidusuario()."');";
        


        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidarchivocargado($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargado(acnombre,acdescripcion,acicono,idusuario,aclinkacceso,accantidaddescarga,accantidadusada,acfechainiciocompartir,acfechafincompartir,acprotegidoclave)  VALUES('";
        $sql.=$this->getacnombre()."','";
        $sql.=$this->getacdescripcion()."','";
        $sql.=$this->getacicono()."','";
        $sql.=$this->getusuario()->getidusuario()."','";
        $sql.=$this->getaclinkacceso().",";
        $sql.=$this->getaccantidaddescarga().",";
        $sql.=$this->getaccantidadusada().",'";
        $sql.=$this->getacfechainiciocompartir()."','";
        $sql.=$this->getacfechafincompartir()."','";
        $sql.=$this->getacprotegidoclave()."');";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidarchivocargado($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->insertar: ".$base->getError());
        }
        return $resp;
    }
    
    public function modificar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE archivocargado SET acnombre='".$this->getacnombre()."',";
        $sql.="acdescripcion='".$this->getacdescripcion()."',";
        $sql.="acicono='".$this->getacicono()."',";
        $sql.="idusuario=".$this->getusuario()->getidusuario().",";
        $sql.="aclinkacceso='".$this->getaclinkacceso()."',";
        $sql.="accantidaddescarga='".$this->getaccantidaddescarga()."',";
        $sql.="acfechainiciocompartir='".$this->getacfechainiciocompartir()."',";
        $sql.="acefechafincompartir='".$this->getacefechafincompartir()."',";
        $sql.="acprotegidoclave='".$this->getacprotegidoclave()."'";
        $sql.=" WHERE idarchivocargado=".$this->getidarchivocargado().";";
        
        
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

    public function AsignarDatosCompartir(){
        $resp = false;
        $base=new BaseDatos();
        $sql="UPDATE archivocargado SET ";
        $sql.="aclinkacceso='".$this->getaclinkacceso()."',";
        $sql.="accantidaddescarga='".$this->getaccantidaddescarga()."',";
        $sql.="acfechainiciocompartir='".$this->getacfechainiciocompartir()."',";
        $sql.="acefechafincompartir='".$this->getacefechafincompartir()."',";
        $sql.="acprotegidoclave='".$this->getacprotegidoclave()."'";
        $sql.=" WHERE idarchivocargado=".$this->getidarchivocargado().";";
        
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
    
   /* public function eliminar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="DELETE FROM archivocargado WHERE idarchivocargado=".$this->getidarchivocargado();
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
    }*/
    
    public static function listar($parametro=""){
        $arreglo = array();
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivocargado();
                    $obj2= new usuario();
                    $obj2->setidusuario($row['idusuario']);
                    $obj2->cargar();
                    $obj->setear($row['idarchivocargado'], $row['acnombre'], $row['acdescripcion'], $row['acicono'], $obj2, $row['aclinkacceso'], $row['accantidaddescarga'], $row['accantidadusada'], $row['acfechainiciocompartir'], $row['acefechafincompartir'], $row['acprotegidoclave']);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
           // $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>