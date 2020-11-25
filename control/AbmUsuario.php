<?php
class AbmUsuario{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return usuario
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idusuario',$param)){
            $obj = new usuario();
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usmail'], $param['usclave'], $param['usactivo'], $param['usdeshabilitado']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return usuario
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idusuario']) ){
            $obj = new usuario();
            $obj->setear($param['idusuario'], null,null,null,null,null,null,null);
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
        if (isset($param['idusuario']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idusuario'] =null;
        $param['usactivo'] =1;
        $param['usdeshabilitado'] =null;
        
        $elObjtTabla = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertar()){
           // $resp = 'El Usuario '.$elObjtTabla->getuslogin().' fue creado con Exito';
           $resp=true;
           $abmusuariorol= new AbmUsuarioRol();
           $nuevoParametro= array('idusuario'=>$elObjtTabla->getidusuario(),'idrol'=>2);
           $abmusuariorol->alta($nuevoParametro);

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
            if  (isset($param['idusuario']))
                $where.=" and idusuario =".$param['idusuario'];
            if  (isset($param['usnombre']))
                 $where.=" and usnombre ='".$param['usnombre']."'";
                 if  (isset($param['usapellido']))
                 $where.=" and usapellido ='".$param['usapellido']."'";
                 if  (isset($param['uslogin']))
                 $where.=" and uslogin ='".$param['uslogin']."'";
                 if  (isset($param['usactivo']))
                 $where.=" and usactivo ='".$param['usactivo']."'";

        }
        $arreglo = usuario::listar($where);  
        return $arreglo;
            
            
      
        
    }
     /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    
    
}
?>