<?php
class AbmArchivoCargadoEstado{
    //Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto

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
            $_FILES['archivo']['name']=$nombre;

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
        $where = " acefechafin IS NULL ";
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
            $where.=" and idarchivocargado ='".$param['idarchivocargado']."'";
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


    public function NuevoAmarchivo($param)
    {
        $resp=false;

        $usuario = new usuario();
        $usuario->setidusuario($param['usuario']);
        $usuario->cargar();

        $nuevo = new archivocargado();
        $nuevo->seteocorto($param['acnombre'],$param['acdescripcion'],$param['acicono'],$usuario);
        
        

        $objEstado = new estadotipos();
        $objEstado->setidestadotipos(1);//seteo valor Cargado

        $objArchivoCargadoEstado = new archivocargadoestado();
        
        if($nuevo->insertarNuevo()){//Inserto en archivocargado los primeros valores

        $objArchivoCargadoEstado->seteoNuevo($nuevo,$objEstado,$usuario,'Archivo Cargado por el Sistema',date("Y-m-d"));
        $resp=$objArchivoCargadoEstado->insertarEstado();
        }
        if($resp==true)
        {
            $resp='El Archivo fue Cargado Correctamente';
        }
        else {
            $resp='No se pudo Cargar el Archivo';
        }
        return $resp;
        //insertar en archivocargadoestado
    }

    public function NuevoEstado($param){
        //echo "Estoy en Compartir un archivo tengo los DATOS DEL FORMULARIO EN UN ARRAY, en esto viene EL ID DEL ARCHIVOCARGADO";
        $resp = false;
        $abmArchivo = new AbmArchivoCargado();
        $archivo = new archivocargado();
        
        //$archivo=$abmArchivo->seteadosCamposClaves($param);

        if ($abmArchivo->seteadosCamposClaves($param)){
            
            if($param['accion']=='nuevo')
            {
                $archivo = $abmArchivo->cargarObjetoCompartir($param); // Cargo en un objeto los demas datos del archivo
            }
            else {
                $archivo->setidarchivocargado($param['idarchivocargado']);
                $archivo->cargar();
                if($param['accion']=='compartir'){
                
                $archivo = $abmArchivo->cargarObjetoCompartir($param);
                $archivo->setaclinkacceso($param['link']);
                $archivo->AsignarDatosCompartir();
               // $abmArchivo->ActualizarAmarchivo($param);
            }
        }
            if($archivo!=null){
                $resp = true;
                
               
                $estadoActual = new archivocargadoestado();
                $estadoNuevo = new archivocargadoestado();

                $EstadoTipo = new estadotipos();

                if($param['accion']=='nuevo')
                {
                    $archivo->AsignarDatosCompartir();
                    $EstadoTipo->setidestadotipos(1);
                }

                if($param['accion']=='compartir'){
                    $EstadoTipo->setidestadotipos(2);
                    $estadoNuevo->seteoNuevo($archivo,$EstadoTipo,$archivo->getusuario(),'Compartido Personalizable',date("Y-m-d"));
                    $resp='El Archivo cambio a Estado:Compartido';
                }
                if($param['accion']=='descompartir'){
                    $EstadoTipo->setidestadotipos(3);
                    $estadoNuevo->seteoNuevo($archivo,$EstadoTipo,$archivo->getusuario(),$param['motivo'],date("Y-m-d"));
                    $resp='El Archivo cambio a Estado:No Compartido';
                }
                if($param['accion']=='eliminar'){
                    $EstadoTipo->setidestadotipos(4);
                    $estadoNuevo->seteoNuevo($archivo,$EstadoTipo,$archivo->getusuario(),$param['motivo'],date("Y-m-d"));
                    $resp='El Archivo cambio a Estado:Eliminado';
                }
                 //ASIGNO QUE EL ESTADO ES COMPARTIDO
                //$EstadoTipo->cargar();//CARGO LA DESCRIPCION PARA OBTENER EL OBJETO COMPLETO 
                
                if($param['accion']!='nuevo')
                {
                    $estadoActual=$this->cargarUltimoEstado($param); //aca validar si no es null
                    if(isset($estadoActual))//true si encuentra el ultimo estado
                    {
                        $estadoActual->setearFechaFin(); //cambia en la base, toma la hora de la base de datos
                    }
                    else {
                        $resp='No se encontro Ultimo Estado';
                    }
                     
                }             
                $estadoNuevo->insertarEstado();
                
                
            }
        }
        return $resp;
    }
}
?>