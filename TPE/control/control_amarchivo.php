<?php

class control_amarchivo{
    public function UploadFile($dato)
    {
        $nombre=$dato['nombre'];
        $dir = '../../archivos/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $dir . basename($_FILES["archivo"]["name"]);
        // Comprobamos que no se hayan producido errores
        if ($_FILES['archivo']["error"] <= 0) 
        {
            echo "Nombre: " . $_FILES['archivo']['name'] . "<br />";
            echo "Tipo: " . $_FILES['archivo']['type'] . "<br />";
            echo "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
            echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";

            //Renombramos el archivo.
            $_FILES['archivo']['name']=$nombre;

            // Intentamos copiar el archivo al servidor.
            if (!copy($_FILES['archivo']['tmp_name'], $dir.$_FILES['archivo']['name']))
            {
                echo 'ERROR: no se pudo cargar el archivo ';
            }else
                echo "El archivo ".$_FILES['archivo']['name'].' se ha copiado con Éxito <br />';
        }else
            {
            echo "ERROR: no se pudo cargar el archivo. No se pudo acceder al archivo Temporal";
            }
        
}
function GenerarHash($datos)
{
    $nombre=$datos["nombre"];
    $dias=$datos["cantidad_dias"];
    $descargas=$datos["cantidad_descargas"];
    $hash=$nombre;
    if(($dias==0) & ($dias==0))
    {
        $hash.='9007199254740991';
        $hash=hash('md5',$hash,false);
    }
    else
    {
        $nombre.=$dias.$descargas;
        echo hash('md5',$nombre,false);
    }
    return $hash;
}
function CrearCarpeta($datos){

    $nombre = $datos["carpeta"];
    $ruta = $datos["ruta"];
   // echo $datos["ruta"];

    $directorio = $ruta.'/'.$nombre;
    if (!file_exists($directorio)) {
        mkdir($directorio);
        }
        else
        {
            echo 'El directorio ya existe';
        }
}
function mostrarCarpetas($dir){

    $listarCarpeta=null;
    $listarArchivo=null;
    $directorio = opendir($dir);
    while(false !== ($archivo =readdir($directorio))){
        if (is_dir($dir.'/'.$archivo)){
            $listarCarpeta.="Carpeta: <input type='button' id='".$archivo."'onClick='SeleccionarArchivo(value)' value='".$archivo."/'>";   
            //mostrarArchivos($dir.'/'.$archivo.'/');          
        }
        else
        {
            echo $dir.'/'.$archivo;
           // mostrarArchivos($dir.'/'.$archivo);
        }

}
closedir($directorio);
echo $listarCarpeta;
}
function mostrarArchivos($dir){
$listarArchivo=null;    
//$listarCarpeta=null;
$directorio = opendir($dir);
while(false !== ($archivo =readdir($directorio))){
   //echo $dir.'/'.$archivo;
   if ($archivo != '.' && $archivo != '..'){         
        
   // $nuevadir=$dir.'/'.$archivo;
        if (is_dir($dir.'/'.$archivo)){
        $listarCarpeta.="Carpeta: <input type='button' id='".$archivo."'onClick='SeleccionarArchivo(value)' value='".$archivo."/'>";
       // mostrarArchivos($nuevadir); INTENTO DE RECURSIVIDAD PARA MOSTRAR SUBCARPETAS
       // echo $dir.'/'.$archivo;
       // echo $nuevadir;
       echo 'entro';
    }
        else
        $listarArchivo.="Archivo: <input type='button' id='".$dir.$archivo."'onClick='SeleccionarArchivo(id)' value='".$archivo."'>";
        
   
} 
}closedir($directorio);/*
echo "<div class='row'>";
echo "<div class='col'>";
echo $listarCarpeta;
echo '</div>';
echo "<div class='col'>";
echo $listarArchivo;
echo '</div>';
echo '</div>';*/
echo $listarCarpeta;
echo $listarArchivo;
//return $listarArchivo;
}
function mostrarArchivos2($dir){
    $listarArchivo=null;    
    $listarCarpeta=null;
    $directorio = opendir($dir);
    while(false !== ($archivo =readdir($directorio))){
       //echo $dir.'/'.$archivo;
       if ($archivo != '.' && $archivo != '..'){         
            
        $nuevadir=$dir.'/'.$archivo;
            if (is_dir($dir.'/'.$archivo)){
            $listarCarpeta.="Carpeta: <input type='button' id='".$archivo."'onClick='SeleccionarArchivo(value)' value='".$archivo."/'>";
           // mostrarArchivos($nuevadir); INTENTO DE RECURSIVIDAD PARA MOSTRAR SUBCARPETAS
           // echo $dir.'/'.$archivo;
           // echo $nuevadir;
           echo '+';
        }
            else
            $listarArchivo.="-Archivo: <input type='button' id='".$dir.'/'.$archivo."'onClick='SeleccionarArchivo(id)' value='".$archivo."'>";
            
       
    } 
    }closedir($directorio);
    echo "<div class='row'>";
    echo "<div class='col'>";
    echo $listarCarpeta;
    echo '</div>';
    echo "<div class='col'>";
    echo $listarArchivo;
    echo '</div>';
    echo '</div>';
    //echo $listarCarpeta;
    //echo $listarArchivo;
    //return $listarArchivo;
    }

}




?>