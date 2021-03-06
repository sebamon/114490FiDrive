<?php 
class archivocargadoestado {
    private $idarchivocargadoestado;
    private $estadotipo;
    private $acedescripcion;
    private $usuario;
    private $acefechaingreso;
    private $acefechafin;
    private $archivocargado;
    private $mensajeoperacion;
   
    public function __construct(){
        
        $this->idarchivocargadoestado="";
        $this->estadotipo=new estadotipos();
        $this->acedescripcion ="";
        $this->usuario =new usuario();
        $this->acefechaingreso ="";
        $this->acefechafin ="";
        $this->archivocargado = new archivocargado();
        $this->mensajeoperacion ="";

    }
    public function setear($idarchivocargadoestado, $idestadotipos,$acedescripcion,$idusuario,$acefechaingreso,$acefechafin,$archivocargado)    {
        $this->setidarchivocargadoestado($idarchivocargadoestado);
        $this->setestadotipo($idestadotipos);
        $this->setacedescripcion($acedescripcion);
        $this->setusuario($idusuario);
        $this->setacefechaingreso($acefechaingreso);
        $this->setacefechafin($acefechafin);
        $this->setarchivocargado($archivocargado);
    }
    public function seteoNuevo($archivo,$estado,$usuario,$descripcion,$fechaingreso)
    {
        $this->setarchivocargado($archivo);
        $this->setestadotipo($estado);
        $this->setusuario($usuario);
        $this->setacedescripcion($descripcion);
        $this->setacefechaingreso($fechaingreso);
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
    public function getmensajeoperacion(){
        return $this->mensajeoperacion;
        
    }
    public function setmensajeoperacion($valor){
        $this->mensajeoperacion = $valor;
        
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
    public function NuevoEstado()
    {
        $resp=false;
        $base=new BaseDatos();
        $estadoAnterior = new archivocargadoestado();
        $estadoAnterior->setarchivocargado($archivo);
        $estadoAnterior->setacefechafin(date("Y-m-d H:i:s"));
        $sql="insert into archivocargadoestado(idestadotipos,idusuario,idarchivocargado) values(";
        $sql.=$archivo->getidarchivocargadoestado().",";
        $sql.=$archivo->getusuario()->getidusuario().",";
        $sql.=$archivo->getarchivocargado()->getidarchivocargado().");";

    }
    
    public function insertar(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargadoestado(idestadotipos,idusuario,idarchivocargado)  VALUES(";
        $sql.="1,";
        $sql.=$this->getusuario()->getidusuario().",";
        $sql.=$this->getarchivocargado()->getidarchivocargado().");";

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
    public function insertarEstado(){
        $resp = false;
        $base=new BaseDatos();
        $sql="INSERT INTO archivocargadoestado(idestadotipos,idusuario,idarchivocargado,acedescripcion,acefechaingreso)  VALUES(";
        $sql.=$this->getestadotipo()->getidestadotipos().",";
        $sql.=$this->getusuario()->getidusuario().",";
        $sql.=$this->getarchivocargado()->getidarchivocargado().",'";
        $sql.=$this->getacedescripcion()."',CURRENT_TIMESTAMP);";
        

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
                    $objA->cargar();
                    $obj->setear($row['idarchivocargadoestado'], $objE,$row['acedescripcion'],$objP,$row['acefechaingreso'],$row['acefechafin'],$objA);
                    array_push($arreglo, $obj);
                }
               
            }
            
        } else {
         //   $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $arreglo;
    }
    public static function listarUltimo($parametro){
        $obj=null;
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
                    $objA->cargar();
                    $obj->setear($row['idarchivocargadoestado'], $objE,$row['acedescripcion'],$objP,$row['acefechaingreso'],$row['acefechafin'],$objA);
                   
                }
               
            }
            
        } else {
         //   $this->setmensajeoperacion("Tabla->listar: ".$base->getError());
        }
 
        return $obj;
    }
    public function setearFechaFin()
    {
        $resp=false;
        $base= new BaseDatos();
        $sql="UPDATE archivocargadoestado set ";
        $sql.="acefechafin = CURRENT_TIMESTAMP where idarchivocargadoestado=".$this->getidarchivocargadoestado().";";
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
    
}

?>
