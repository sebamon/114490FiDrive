<?php 
class archivocargadoestado {
    private $idarchivocargadoestado;
    private $estadotipo;
    private $acedescripcion;
    private $usuario;
    private $acefechaingreso;
    private $acefechafin;
    private $archivocargado;
    
   
    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->estadotipo="";
        $this->acedescripcion ="";
        $this->usuario ="";
        $this->acefechaingreso ="";
        $this->acefechafin ="";
        $this->archivocargado ="";

    }
    public function setear($idarchivocargadoestado, $idestadotipos,$acedescripcion,$idusuario,$acefechaingreso,$acefechaifin,$archivocargado)    {
        $this->setId($idarchivocargadoestado);
        $this->setestadotipo($idestadotipos);
        $this->setacedescripcion($acedescripcion);
        $this->setusuario($idusuario);
        $this->setacefechaingreso($acefechaingreso);
        $this->setacefechaifin($acefechafin);
        $this->setarchivocargado($archivocargado);
    }
    
    
    
    public function getidarchivocargadoestado(){
        return $this->idarchivocargadoestado;
        
    }
    public function setidarchivocargadoestado($valor){
        $this->idarchivocargadoestado = $valor;
        
    }
    
    public function getestadotipo(){
        return $this->estadotipo;
        
    }
    public function setestadotipo($valor){
        $this->estadotipo = $valor;
        
    }
    public function getacedescripcion(){
        return $this->acedescripcion;
        
    }
    public function setacedescripcion($valor){
        $this->acedescripcion = $valor;
        
    }
    public function getusuario(){
        return $this->usuario;
        
    }
    public function setusuario($valor){
        $this->usuario = $valor;
        
    }
    public function getacefechaingreso(){
        return $this->acefechaingreso;
        
    }
    public function setacefechaingreso($valor){
        $this->acefechaingreso = $valor;
        
    }
    public function getacefechafin(){
        return $this->acefechafin;
        
    }
    public function setacefechafin($valor){
        $this->acefechafin = $valor;
        
    }
    public function getarchivocargado(){
        return $this->archivocargado;
        
    }
    public function setarchivocargado($valor){
        $this->archivocargado = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM archivocargadoestado WHERE idarchivocargadoestado = ".$this->getidarchivocargadoestado();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $objP= new usuario();
                    $objP->setidusuario($row['idusuario']);
                    $objP->cargar();
                    $objE=new estadotipos();
                    $objE->setidestadotipos($row['idestadotipos']);
                    $objE->cargar();
                    $objA=new archivocargado();
                    $objA->setidarchivocargado($row['idarchivocargado']);
                    $objA-cargar();
                    $this->setear($row['idarchivocargadoestado'], $objE, $row['acedescripcion'], $objP, $row['acefechaingreso'], $objA);
                    
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
        $sql="INSERT INTO archivocargadoestado(idestadotipos,acedescripcion,idusuario,acefechaingreso,acefechafin,idarchivocargado)  VALUES('";
        $sql.=$this->getestadotipo()->getidestadotipos()."','";
        $sql.=$this->getacedescripcion()."',";
        $sql.=$this->getusuario()->getidusuario().",'";
        $sql.=$this->getacefechaingreso()."','";
        $sql.=$this->getacefechafin()."',";
        $sql.=$this->getusuario()->getidusuario().");";

        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidarchivocargadoestado($elid);
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
        $sql="UPDATE archivocargadoestado SET ";
        $sql.="idestadotipo=".$this->getestadotipo()->getidestadotipos().", ";
        $sql.="acedescripcion='".$this->getacedescripcion()."', ";
        $sql.="idusuario=".$this->getusuario()->getidusuario().", ";
        $sql.="acefechaingreso='".$this->getacefechaingreso()."', ";
        $sql.="acefechafin='".$this->getacefechafin()."', ";
        $sql.="idarchivocargado=".$this->getarchivocargado()->getidarchivocargado()." ";
        $sql.="WHERE idarchivocargadoestado=".$this->getidarchivocargadoestado().";";
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
        $sql="DELETE FROM archivocargadoestado WHERE idarchivocargadoestado=".$this->getidarchivocargadoestado();
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
        $sql="SELECT * FROM archivocargadoestado ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new archivocargadoestado();
                    $objP= new usuario();
                    $objP->setidusuario($row['idusuario']);
                    $objP->cargar();
                    $objE=new estadotipos();
                    $objE->setidestadotipos($row['idestadotipos']);
                    $objE->cargar();
                    $objA=new archivocargado();
                    $objA->setidarchivocargado($row['idarchivocargado']);
                    $objA-cargar();
                    $obj->setear($row['idarchivocargadoestado'], $objE,$row['acedescripcion'],$objP,$row['acefechaingreso'],$row['acefechafin'],$objA);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
            $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    
}


?>