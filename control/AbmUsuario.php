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
            if(isset($param['usclave'])){
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usmail'], $param['usclave'], 1, 0);
        }
        else {
            $obj->setear($param['idusuario'], $param['usnombre'], $param['usapellido'], $param['uslogin'], $param['usmail'], null, 1, 0);
        }
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
           if(isset($param['rol']))
           {
             $nuevoParametro = array('idusuario'=>$elObjtTabla->getidusuario(),'idrol'=>$param['rol']);
           }
           else
           {
               $nuevoParametro= array('idusuario'=>$elObjtTabla->getidusuario(),'idrol'=>2);
            }
           $abmusuariorol->alta($nuevoParametro);

        }
        else{
            //$resp='El Usuario ya Existe';
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
    }public function HDUsuario($param){
        $resp = false;
        if ($this->seteadosCamposClaves($param)){
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla!=null and $elObjtTabla->CambiarEstado($param['activo'])){
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
                $abmusuariorol= new AbmUsuarioRol();
                if(isset($param['rol']))
                {
                  $nuevoParametro = array('idusuario'=>$elObjtTabla->getidusuario(),'idrol'=>$param['rol']);
                  $abmusuariorol->modificacion($nuevoParametro);
                }
                
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
    public function recuperar_pass($param)
    {
        $resp=false;
        $unUsuario = new usuario();
        $unUsuario->setusmail($param['email']);
        if($unUsuario->ExisteEmail()){
            $unUsuario->setusclave(md5($param['pass']));
            if($unUsuario->resetearPassword())
            {
                $resp=true;
                $mail = new PHPMailer();
        
                $mail->isSMTP();

                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            
                $mail->Host = 'smtp.gmail.com';

                $mail->Port = 587;
                

                $mail->SMTPAuth = true;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            
                $mail->Username = 'sebastian.mon@est.fi.uncoma.edu.ar'; //ACA VA LA DIRECCION DE CORREO

                $mail->Password = '34397372';  //ACA VA LA CONTRASEÑA
            
                $mail->setFrom('sebastian.mon@est.fi.uncoma.edu.ar', 'FiDrive');
            
                $mail->addReplyTo('sebastian.mon@est.fi.uncoma.edu.ar', 'FiDrive');
            
                $mail->addAddress($param['email'], 'Usuario'); //Esta es la direccion que viene del formulario
                
                $mail->Subject = 'Recuperar de Password'; // EL asunto viene del formulario


                $mail->Body='El Password se ha reseteado, su nueva contraseña es: '.$param['pass']; //EL CUERPO VIENE DEL FORMULARIO
            
                $mail->AltBody = 'This is a plain-text message body';
            
                if (!$mail->send()) {
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                    $resp=false;
                } else {
                    echo 'Message sent!';
                    $resp=true;
                }


            }

        }
        return $resp;
    }
    
    
}
?>