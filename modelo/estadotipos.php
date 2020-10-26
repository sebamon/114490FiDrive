<?php 
class estadotipos {
    private $idestadotipos;
    private $etdescripcion;
    private $etactivo;
    
   
    public function __construct(){
        
        $this->idestadotipos="";
        $this->etdescripcion="";
        $this->etactivo ="";
    }
    public function setear($idestadotipos, $etdescripcion, $etactivo)    {
        $this->setidestadotipos($idestadotipos);
        $this->setetdescripcion($etdescripcion);
        $this->setetactivo($etactivo);
    }

    
    public function getidestadotipos(){
        return $this->idestadotipos;
        
    }
    public function setidestadotipos($valor){
        $this->idestadotipos = $valor;
        
    }
    
    public function getetdescripcion(){
        return $this->etdescripcion;
        
    }
    public function setetdescripcion($valor){
        $this->etdescripcion = $valor;
        
    }
    public function getetactivo(){
        return $this->etactivo;
        
    }
    public function setetactivo($valor){
        $this->etactivo = $valor;
        
    }
    
    
    public function cargar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="SELECT * FROM estadotipos WHERE idestadotipos = ".$this->getidestadotipos();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res>-1){
                if($res>0){
                    $row = $base->Registro();
                    $this->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
                    
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
        $sql="INSERT INTO estadotipos (idestadotipos,etdescripcion,etactivo)  VALUES(";
        $sql.=$this->getidestadotipos().", '";
        $sql.=$this->getetdescripcion()."', ";
        $sql.=$this->getetactivo()."); ";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setidestadotipos($elid);
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
        $sql="UPDATE estadotipos SET ";
        $sql.="etdescripcion='".$this->getetdescripcion()."', ";
        $sql.="etactivo='".$this->getetactivo()."' ";
        $sql.="WHERE idestadotipos=".$this->getidestadotipos();
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
        $sql="DELETE FROM estadotipos WHERE idestadotipos=".$this->getidestadotipos();
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
        $sql="SELECT * FROM estadotipos ";
        if ($parametro!="") {
            $sql.='WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        if($res>-1){
            if($res>0){
                
                while ($row = $base->Registro()){
                    $obj= new estadotipos();
                    $obj->setear($row['idestadotipos'], $row['etdescripcion'], $row['etactivo']);
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