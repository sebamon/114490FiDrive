<?php

class control_amarchivo{
    public function UploadFile()
    {
        $dir = '../../upload/'; // Definimos Directorio donde se guarda el archivo
        $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
        // Comprobamos que no se hayan producido errores
        if ($_FILES['archivo']["error"] <= 0) 
        {
            echo "Nombre: " . $_FILES['archivo']['name'] . "<br />";
            echo "Tipo: " . $_FILES['archivo']['type'] . "<br />";
            echo "Tamaño: " . ($_FILES['archivo']["size"] / 1024) . " kB<br />";
            echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name']." <br />";
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
}
?>