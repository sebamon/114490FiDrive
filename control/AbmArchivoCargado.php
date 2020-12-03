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

    /**
     * DEVUELVE EL OBJETO COMPARTIR CON FECHAS Y LO DEL FORMULARIO
     * @param array $param
     * @return archivocargado
     */
    public function cargarObjetoCompartir($param){ // DEVUELVE EL OBJETO COMPARTIR CON FECHAS Y LO DEL FORMULARIO
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setidarchivocargado($param['idarchivocargado']);
            $obj->cargar();
            $obj->setaccantidaddescarga($param['cantidad_descargas']);
            $obj->setusuario($objUsuario);
            $obj->setacfechainiciocompartir($hoy = date("Y-m-d H:i:s"));
            $nuevafecha=date("Y-m-d",strtotime($obj->getacfechainiciocompartir()."+ ".$param['cantidad_dias']." days")); 
            $obj->setacefechafincompartir($nuevafecha);
            if(isset($param['txtpassword']))
            $obj->setacprotegidoclave($param['txtpassword']);
            $obj->setaclinkacceso($param['link']);
            //$obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $objUsuario, '/archivos/'.$param['acnombre'].'.'.$param['extension'], null, null, null, null, null);
        }
        return $obj;
    }

    private function cargarObjetoDesCompartir($param){ // DEVUELVE EL OBJETO COMPARTIR CON FECHAS Y LO DEL FORMULARIO
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            $obj->setidarchivocargado($param['idarchivocargado']);
            $obj->cargar();
            $obj->setusuario($objUsuario);
            //$obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $objUsuario, '/archivos/'.$param['acnombre'].'.'.$param['extension'], null, null, null, null, null);
        }
        return $obj;
    }
  /*  private function cargarObjetoCompleto($param){//NUNCA TENGO TODOS LOS ATRIBUTOS CUANDO CARGO EL OBJETO
        $obj = null;
           
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $obj->setear($param['idarchivocargado'], $param['acnombre'], $param['acdescripcion'], $param['acicono'], $param['usuario'], $param['aclinkacceso'], $param['accantidaddescarga'], $param['accantidadusada'], $param['acfechainiciocompartir'], $param['acfechainiciofincompartir'], $param['acprotegidoclave']);
        }
        return $obj;
    }*/
    
    /**
     * Espera como parametro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return archivocargado
     */
    public function cargarObjetoConClave($param){
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
    
    public function seteadosCamposClaves($param){//NO SE BIEN QUE HACE
        $resp = false;
        if (isset($param['idarchivocargado']))
            $resp = true;
        return $resp;
    }
    
    /**
     * 
     * @param array $param
     */
    public function alta($param){//NECESITA REVISION
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
   /* public function baja($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->eliminar()){
                $resp = true;
            }
        }
        
        return $resp;
    }
    */
    /**
     * permite modificar un objeto
     * @param array $param
     * @return boolean
     */
    public function Compartir($param){
        //echo "Estoy en Compartir un archivo tengo los DATOS DEL FORMULARIO EN UN ARRAY, en esto viene EL ID DEL ARCHIVOCARGADO";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoCompartir($param);
            if($elObjtTabla!=null and $elObjtTabla->AsignarDatosCompartir()){//Aca me modifica la base y me asigna los valores de compartir (dias, clave etc)
                $resp = true;
                
                $AbmEstado = new AbmArchivoCargadoEstado();
                $estadoActual = new archivocargadoestado();
                $estadoNuevo = new archivocargadoestado();

                $EstadoTipo = new estadotipos();
                if($param['accion']=='compartir'){
                    $EstadoTipo->setidestadotipos(2);
                }
                if($param['accion']=='descompartir'){
                    $EstadoTipo->setidestadotipos(3);
                }
                 //ASIGNO QUE EL ESTADO ES COMPARTIDO
                $EstadoTipo->cargar();//CARGO LA DESCRIPCION PARA OBTENER EL OBJETO COMPLETO 
                
                $estadoActual=$AbmEstado->cargarUltimoEstado($param); //aca validar si no es null
                if(isset($estadoActual))//true si encuentra el ultimo estado
                {
                $estadoActual->setearFechaFin(); //cambia en la base, toma la hora de la base de datos
                
                // ARMAR EL OBJETO ESTADO NUEVO
                if($param['accion']=="compartir")
                $estadoNuevo->seteoNuevo($elObjtTabla,$EstadoTipo,$elObjtTabla->getusuario(),'Compartido Personalizable',date("Y-m-d"));

                if($param['accion']=="descompartir")
                $estadoNuevo->seteoNuevo($elObjtTabla,$EstadoTipo,$elObjtTabla->getusuario(),$param['motivo'],date("Y-m-d"));
                
                $estadoNuevo->insertarEstado();
                }

                else {
                    $resp=false;
                }
                
              
            //    $estado->CambiarEstado($elObjtTabla,$-);
                //crear nueva instancia en archivocargadoestado
                
            }
        }
        return $resp;
    }

    public function DesCompartirEliminar($param){
        //echo "Estoy en DesCompartir un archivo tengo los DATOS DEL FORMULARIO EN UN ARRAY, en esto viene EL ID DEL ARCHIVOCARGADO";
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            
            //recupero el archivo
            $archivo = new archivocargado();
            $archivo->setidarchivocargado($param['idarchivocargado']);
            $archivo->cargar();

            $AbmEstado = new AbmArchivoCargadoEstado();
            $estadoActual = new archivocargadoestado();
            $estadoNuevo = new archivocargadoestado();
            $EstadoTipo = new estadotipos();
                if($param['accion']=='descompartir')
                    $EstadoTipo->setidestadotipos(3);
                if($param['accion']=='eliminar')
                    $EstadoTipo->setidestadotipos(4);
                
                 //ASIGNO QUE EL ESTADO ES COMPARTIDO
                $EstadoTipo->cargar();//CARGO LA DESCRIPCION PARA OBTENER EL OBJETO COMPLETO 
                
                $estadoActual=$AbmEstado->cargarUltimoEstado($param); //aca validar si no es null
                if(isset($estadoActual))//true si encuentra el ultimo estado
                {
                $estadoActual->setearFechaFin(); //cambia en la base, toma la hora de la base de datos
                
                // ARMAR EL OBJETO ESTADO NUEVO
                if($param['accion']=="descompartir")
                $estadoNuevo->seteoNuevo($archivo,$EstadoTipo,$archivo->getusuario(),$param['motivo'],date("Y-m-d"));

                if($param['accion']=="eliminar")
                $estadoNuevo->seteoNuevo($elObjtTabla,$EstadoTipo,$elObjtTabla->getusuario(),$param['motivo'],date("Y-m-d"));
                
                $estadoNuevo->insertarEstado();
                }

                else {
                    $resp=false;
                }
                
              
            //    $estado->CambiarEstado($elObjtTabla,$-);
                //crear nueva instancia en archivocargadoestado
                
            }
            return $resp;
        }
       
    

    public function ActualizarAmarchivo($param)
    {
        $obj = null;
           $resp='El Archivo no pudo ser modificado';
        if( array_key_exists('idarchivocargado',$param)){
            $obj = new archivocargado();
            $objUsuario = new usuario();
            $objUsuario->setidusuario($param['usuario']);
            $objUsuario->cargar();
            if(!isset($param['acdescripcion']))
            {
                $param['acdescripcion']=null;
            } 
            if(!isset($param['acicono']))
            {
                $param['acicono']=null;
            }
            if(!isset($param['link']))
            {
                $param['link']=null;
            }
            $obj->setear($param['idarchivocargado'],$param['acnombre'],$param['acdescripcion'],$param['acicono'],$objUsuario,$param['link'],null,null,null,null,null);
            $obj->modificar();
            $resp='Se Modifico el Archivo';
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
    
    // public function NuevoAmarchivo($param)
    // {
    //     $nuevo = new archivocargado();
    //     $usuario = new usuario();
    //     $objEstado = new estadotipos();
    //     $objArchivoCargadoEstado = new archivocargadoestado();
    //     $objEstado->setidestadotipos(1);
    //     $usuario->setidusuario($param['usuario']);
    //     $usuario->cargar();
    //     $nuevo->seteocorto($param['acnombre'],$param['acdescripcion'],$param['acicono'],$usuario);
    //     $nuevo->insertarNuevo();
    //     $objArchivoCargadoEstado->seteoNuevo($nuevo,$objEstado,$usuario,'Archivo Cargado por el Sistema',date("Y-m-d"));
    //     $objArchivoCargadoEstado->insertarNuevo();


    //     //insertar en archivocargadoestado
    // }
    public function CambiarEstado($archivo, $estado)
    {
        $newArchivoCargado = new archivocargadoestado();
        $estado->estadoFin();

    }


}
?>