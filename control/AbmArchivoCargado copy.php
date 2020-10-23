<?php
class AbmArchivoCargado{

    // Funcion Subir Archivo
    public function UploadFile($dato)
    {
        $resultado=null;
        $nombre=$dato['acnombre'];
        $dir = '../../archivos/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $dir . basename($_FILES["archivo"]["name"]);

        //recupero extension
        $extension=explode('.',$_FILES['archivo']['name']);
        $extension=$extension[1];
        // Comprobamos que no se hayan producido errores
        if ($_FILES['archivo']["error"] <= 0) 
        {
           
            $resultado.= "Nombre: " . $_FILES['archivo']['name'] . "<br />";
            $resultado.= "Tipo: " . $_FILES['archivo']['type'] . "<br />";
            $resultado.= "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
            $resultado.= "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";

            //Renombramos el archivo.
            $_FILES['archivo']['name']=$nombre.'.'.$extension;

            // Intentamos copiar el archivo al servidor.
            if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name']))
            {
                $resultado.= 'ERROR: no se pudo cargar el archivo ';
            }else
            $resultado.= "El archivo ".$_FILES['archivo']['name'].' se ha copiado con Éxito <br />';
        }else
            {
                $resultado.= "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
            }
            return $resultado;
            
        
}

    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return archivocargado
     */
    private function cargarObjeto($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $objUsuario, '/archivos/'.$param['acnombre'].'.'.$param['extension'], null, null, null, null, null);
        }
        return $obj;
    }
    private function cargarObjetoCompartir($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setidarchivocargado($param['idarchivocargado']);
            $obj->cargar();
            $obj->setaccantidaddescarga($param['cantidad_descargas']);
            $nuevafecha=date("Y-m-d",strtotime($obj->getacfechainiciocompartir()."+ ".$param['cantidad_dias']." days")); 
            $obj->setacefechafincompartir($nuevafecha);
            //$obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $objUsuario, '/archivos/'.$param['acnombre'].'.'.$param['extension'], null, null, null, null, null);
        }
        return $obj;
    }
    private function cargarObjetoCompleto($param){
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $param['usuario'], $param['aclinkacceso'], $param['accantidaddescarga'], $param['accantidadusada'], $param['acfechainiciocompartir'], $param['acfechainiciofincompartir'], $param['acprotegidoclave']);
        }
        return $obj;
    }
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return archivocargado
     */
    private function cargarObjetoConClave($param){
        $obj = null;
        
        if( isset($param['idarchivocargado']) ){
            $obj = new archivocargado();
            $obj->setear($param['idarchivocargado'], null, null, null, null, null, null, null, null, null, null);
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
        if (isset($param['idarchivocargado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){
        $resp = false;
        $param['idarchivocargado'] =null;
        $elObjtTabla = $this->cargarObjeto($param);
//        verEstructura($elObjtTabla);
        if ($elObjtTabla!=null and $elObjtTabla->insertarNuevo()){
            $ACE = new AbmArchivoCargadoEstado();
            $AEstado = new archivocargadoestado();
            $AEstado->setarchivocargado($elObjtTabla);
            $AEstado->setusuario($elObjtTabla->getusuario());
            $ACE->altaConObjeto($AEstado);

            
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
            $elObjtTabla = $this->cargarObjetoCompartir($param);
            if($elObjtTabla!=null and $elObjtTabla->modificar()){
                $resp = true;
            }
        }
        return $resp;
    }
    public function ActualizarAmarchivo($param)
    {
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setear($param['idarchivocargado'],$param['acnombre'],$param['acdescripcion'],$param['acicono'],$objUsuario,null,null,null,null,null,null);

    }
    
    /**
     * permite buscar un objeto
     * @param array $param
     * @return boolean
     */
    public function buscar($param){
        $where = " true ";
        if ($param<>NULL){
            if  (isset($param['idarchivocargado']))
                $where.=" and idarchivocargado =".$param['idarchivocargado'];
            if  (isset($param['acnombre']))
                 $where.=" and acnombre ='".$param['acnombre']."'";
            if  (isset($param['acdescripcion']))
            $where.=" and acdescripcion ='".$param['acdescripcion']."'";
            if  (isset($param['acicono']))
            $where.=" and acicono ='".$param['acicono']."'";
            // if  (isset($param['idusuario']))
            // $where.=" and idusuario ='".$param['idusuario']."'";
            if  (isset($param['accantidaddescarga']))
            $where.=" and accantidaddescarga ='".$param['accantidaddescarga']."'";
            if  (isset($param['accantidadusada']))
            $where.=" and accantidadusada ='".$param['accantidadusada']."'";
            if  (isset($param['acfechainiciocompartir']))
            $where.=" and acfechainiciocompartir ='".$param['acfechainiciocompartir']."'";
            if  (isset($param['acfechafincompartir']))
            $where.=" and acfechafincompartir ='".$param['acfechafincompartir']."'";
            if  (isset($param['acprotegidoclave']))
            $where.=" and acprotegidoclave ='".$param['acprotegidoclave']."'";

        }
        $arreglo = archivocargado::listar($where);  
        return $arreglo;
            
            
      
        
    }
    
}
?>