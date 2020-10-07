<?php

class control_amarchivo{
    public function UploadFile()
    {
        $dir = '../../upload/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $dir . basename($_FILES["archivo"]["name"]);
        // Comprobamos que no se hayan producido errores
        if ($_FILES['archivo']["error"] <= 0) 
        {
            echo "Nombre: " . $_FILES['archivo']['name'] . "<br />";
            echo "Tipo: " . $_FILES['archivo']['type'] . "<br />";
            echo "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
            echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";

            //Renombramos el archivo.
            $_FILES['archivo']['name']="1234.png";

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
    $directorio = '../../archivos/'.$nombre;
    if (!file_exists($directorio)) {
        mkdir($directorio);
        }
        else
        {
            echo 'El directorio ya existe';
        }
    }
   
function listFiles($directorio){ //La función recibira como parametro un directorio
    if (is_dir($directorio)) { //Comprobamos que sea un directorio Valido
        if ($dir = opendir($directorio)) {//Abrimos el directorio

            echo '<ul>'; //Abrimos una lista HTML para mostrar los archivos

            while (($archivo = readdir($dir)) !== false){ //Comenzamos a leer archivo por archivo

                if ($archivo != '.' && $archivo != '..'){//Omitimos los archivos del sistema . y ..

                    $nuevaRuta = $directorio.$archivo;//'/';//Creamos unaruta con la ruta anterior y el nombre del archivo actual 

                    echo '<li>'; //Abrimos un elemento de lista 
                    echo '<b>'.$nuevaRuta.'</b>';
                        if (is_dir($nuevaRuta)) { //Si la ruta que creamos es un directorio entonces:
                            echo 'Carpeta: '.$nuevaRuta.$archivo;
                            //echo '<b> Carpeta:'.$nuevaRuta.$nuevaRuta'</b>'; //Imprimimos la ruta completa resaltandola en negrita
                              listFiles($nuevaRuta);//Volvemos a llamar a este metodo para que explore ese directorio.

                        } else { //si no es un directorio:
                            echo '<a href='.$nuevaRuta.$archivo.'>'.$archivo.'</a>';
                            echo 'Archivo: '.$archivo; //simplemente imprimimos el nombre del archivo actual
                        }

                    '</li>'; //Cerramos el item actual y se inicia la llamada al siguiente archivo

                }

            }//finaliza While
            echo '</ul>';//Se cierra la lista

            closedir($dir);//Se cierra el archivo
        }
    }else{//Finaliza el If de la linea 12, si no es un directorio valido, muestra el siguiente mensaje
        echo 'No Existe el directorio';
    }				
}//Fin de la Función	


// function SeleccionarArchivo($valor)
// {
// document.getElementById("seleccion")=$valor;
// return;

// }
function mostrarArchivos(){
$directorio = '../../archivos';
if ($dir = opendir($directorio)){
    while ($archivo = readdir($dir)) {
        if ($archivo != '.' && $archivo != '..'){
            //este div es para darle caché y que se vea bien en todos los dispositivos. son clases del nuevo bootstrap -> framewrok css
            echo "<div class='col-sm-3 col-xs-12'>";
            
            if(is_dir($dir.'/'.$archivo))
            {
                echo "Carpeta: <strong>$archivo</strong><br />";
            }
           
               // echo "Archivo: <strong>$archivo</strong><br />";
              //  echo 'Archivo: <a href="'.$directorio.'/'.$archivo.' onClick("SeleccionarArchivo()")">'.$archivo.'</a>';
             //   echo "Archivo: <input type='button' onClick='SeleccionarArchivo(".$archivo.")' value='".$archivo."'>";
                echo "Archivo: <input type='button' id='".$archivo."'onClick='SeleccionarArchivo(value)' value='".$archivo."'>";
            echo "</div>";
        }
    }
}
}

}
?>