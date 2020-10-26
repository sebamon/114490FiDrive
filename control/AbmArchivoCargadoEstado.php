<?php
class AbmArchivoCargadoEstado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return archivocargadoestado
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargadoestado',$param)){
            $obj = new archivocargadoestado();
            $obj->setear($param['idarchivocargadoestado'], $param['idestadotipos'], $param['acedescripcion'], $param['idusuario'], $param['acefechaingreso'], $param['acefechafin'], $param['idarchivocargado']);
        }
        return $obj;
    }
    private function cargarObjetoNuevo($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargadoestado',$param)){
            $obj = new archivocargadoestado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setear($param['idarchivocargadoestado'], 1, null, $objUsuario, null, null, $param['idarchivocargado']);

        }
        return $obj;
    }

    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return archivocargadoestado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargadoestado']) ){
            $obj = new archivocargadoestado();
            $obj->setear($param['idarchivocargadoestado'], null);
        }
        return $obj;
    }
    
    
    /**
     * Corrobora que dentro del arreglo asociativo estan seteados los campos claves
     * @param array $param
     * @return boolean
     */
    
    private function seteadosCamposClaves($param){
        $resp = false;
        if (isset($param['idarchivocargadoestado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idarchivocargadoestado'] =null;
        $elObjtTabla = $this->cargarObjetoNuevo($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    public function altaConObjeto($param){
        $resp = false;
        $param->setidarchivocargadoestado(null);
      //  $elObjtTabla = $this->cargarObjetoNuevo($param);
//        verEstructura($elObjtTabla);
        if ($param->insertar()){
            $resp = true;
        }
        return $resp;
        
    }
    /**
     * permite eliminar un objeto 
     * @param array $param
     * @return boolean
     */
    public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function modificacion($param){
        //echo "Estoy en modificacion";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjeto($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idarchivocargadoestado']))
                $where.=" and idarchivocargadoestado =".$param['idarchivocargadoestado'];
            if  (isset($param['idestadotipos']))
                 $where.=" and idestadotipos ='".$param['idestadotipos']."'";
            if  (isset($param['acedescripcion']))
            $where.=" and acedescripcion ='".$param['acedescripcion']."'";
            if  (isset($param['idusuario']))
            $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['acefechaingreso']))
            $where.=" and acefechaingreso ='".$param['acefechaingreso']."'";
            if  (isset($param['idarchivocargado']))
            $where.=" acefechafin=null and idarchivocargado ='".$param['idarchivocargado']."'";
        }
        $arreglo = archivocargadoestado::listar($where);  
        return $arreglo;
            
            
      
        
    }
    public function cargarUltimoEstado($param)
    {
        $obj = null;
        $where = " acefechafin IS NULL and idarchivocargado=".$param['idarchivocargado'];
        $obj= archivocargadoestado::listarUltimo($where);
        
        
        return $obj;
    }
    
}
?>