function CheckPassword()
{
    var $pass;
    var $check;
    $pass=document.getElementById('txtpassword');
    $check=document.getElementById('pass');

    if ($check.checked)
    {
        
        $pass.style.visibility='visible';
        $pass.disabled=false;
       
   
    }  
    else{
       $pass.disabled=true;

    }

};
function FortalezaPassword()
{
    var $tieneLetras=false;
    var $tieneNumeros=false;
    var $tieneSimbolos=false;
    var $cantidadCaracteres=0;
    
    var $fortaleza=null;
    var $expresionNumeros=/[0-9]/;
    var $expresionLetra= /[a-zA-Z ]/;
    var $expresionSimbolo=/[!"#$%&'()*+,\-./:;<=>?@[\]^_`{|}~]/;
    $pass=document.getElementById('txtpassword').value;
    $cantidadCaracteres=$pass.length;
  
    // for(var i=0;i<$cantidadCaracteres;i++)
    // {
      //  var caracter=$pass.charAt(i);
      //  $nuevo=$expresionLetra.test($pass);
        if ($expresionNumeros.test($pass))
        $tieneNumeros=true;
        if ($expresionLetra.test($pass))
        $tieneLetras=true;
        if($expresionSimbolo.test($pass))
        $tieneSimbolos=true;

    // }
    if($cantidadCaracteres<=6)
    {
        $fortaleza='Debil';
    }
    else
    {
        $fortaleza='Debil';
        if(($tieneNumeros)&&($tieneLetras))
        {
            $fortaleza='Media';
        }
        if(($tieneSimbolos)&&($tieneNumeros)&&($tieneLetras))
        {
                $fortaleza='Fuerte';
        }
    }
  
    document.getElementById("labelstrengpass").innerHTML =$fortaleza;


 
}
function SeleccionarArchivo(valor)
{
    var nombre;
    
    document.getElementById("ruta").value=valor;
    nombre=valor.split('/');
    document.getElementById("seleccion").value=nombre[3];
}
function ArchivoSeleccionado()
{
    alert("algo");
    var seleccion=document.getElementById('seleccion').value;
    var botonModificar=document.getElementById('btn_modificar');
    var botonCompartir=document.getElementById('btn_compartir');
    if(seleccion)
    {
        botonModificar.disabled=false;
        botonCompartir.disabled=false;
    }
    else{
        botonModificar.disabled=true;
        botonCompartir.disabled=true;
    }
}

function GenerarHash()
{
    $nombre=document.getElementById('nombre').value;
    $dias=document.getElementById('cantidad_dias').value;
    $descargas=document.getElementById('cantidad_descargas').value;
    $hash='';
    if(($dias==0) & ($descargas==0))
    {
        $nombre+=$nombre+'9007199254740991';
        $hash=md5($nombre);
    }
    else
    {
        $nombre+=$dias+$descargas;
        $hash=md5($nombre);
    }
    document.getElementById('link').value=$hash;
    return $hash;
}
// function SeleccionarCarpeta(valor)
// {
//     var nombre;
//     var raiz='../../archivos/';
//     document.getElementById("ruta").value=raiz+valor;
//     nombre=valor.split('/');
//     document.getElementById("seleccion").value=nombre[3];
// }
function NuevaCarpeta()
{
    document.getElementById("accion").value='nuevacarpeta';
}
function ModificarArchivo()
{
    document.getElementById("am").value='modificararchivo';
    CapturarArchivo();
}
function CompartirArchivo()
{
    document.getElementById("am").value='compartirarchivo';
    CapturarArchivo();
}

function NuevoArchivo()
{
    document.getElementById("accion").value='nuevoarchivo';
}
function AccionHash()
{
    document.getElementById("accion").value='nuevohash';
}
function CapturarArchivo(){

    $accion=document.getElementById('am').value;
    $ruta=document.getElementById('seleccion');
    //echo ($ruta.value);
    if($accion=='modificararchivo'){
    $nuevaruta='../tpe/amarchivo.php?clave=1&parametro='+$ruta.value;
    }
    else
    {
        if($accion=='compartirarchivo'){
            $nuevaruta='../tpe/compartirarchivo.php?parametro='+$ruta.value;
        }
    }
    //echo ($nuevaruta);
    window.open($nuevaruta);
    window.close(this);

    
    //windows.location.href=$nuevaruta;
//    window.location.href=amarchivo.php?parametro=$ruta;
}


function getFileExtension(filename) {
    return filename.slice((filename.lastIndexOf('.') - 1 >>> 0) + 2);
  };
  function setRadioOff()
  {
      document.getElementById('radioImagen').checked=false;
      document.getElementById('radioDoc').checked=false;
      document.getElementById('radioZip').checked=false;
      document.getElementById('radioPdf').checked=false;
      document.getElementById('radioXls').checked=false;
  }
function SugerirIcono()
{
    var $nombre;
    var $extension;
    $nombre=document.getElementById('archivo');
    /*punto=nombre.lastIndexOf(".");
    extension=indexOf(punto,nombre.lengt());*/
    $ruta=$nombre.value.split('.');
    $extension=getFileExtension($nombre.value);
    $archivo=$ruta[0].split("\\");

    switch($extension)
    {
        case ('jpg'): document.getElementById('radioImagen').checked=true;break;
        case ('png'): document.getElementById('radioImagen').checked=true;break;
        case ('gif'): document.getElementById('radioImagen').checked=true;break;
        case ('txt'): document.getElementById('radioDoc').checked=true;break;
        case ('doc'): document.getElementById('radioDoc').checked=true;break;
        case ('docx'):document.getElementById('radioDoc').checked=true;break;
        case ('zip'): document.getElementById('radioZip').checked=true;break;
        case ('rar'): document.getElementById('radioZip').checked=true;break;
        case ('pdf'): document.getElementById('radioPdf').checked=true;break;
        case ('xls'): document.getElementById('radioXls').checked=true;break;
        case ('xlsx'): document.getElementById('radioXls').checked=true;break;
        default: setRadioOff();

    }
    document.getElementById('nombre').value=$archivo[2];

}
 
function ListarArchivos()
{
    var $directorio='../archivos/';
    var $arc;
    var $archivos = array();
    $archivos = scandir($directorio,1);
  /*  foreach($archivos as $key=>$clave)
    {
        $arc=$directorio.$1archivo;
        echo $arc;
    }*/
}
/*function ListarArchivos2()
{
$ruta="../../archivos/";
 
$directorio = opendir($ruta); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        echo $archivo . "<br />";
    }
}
}
/*
$('#txtpassword').keyup(function(e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
    var enoughRegex = new RegExp("(?=.{6,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
            $('#passstrength').html('Más caracteres.');
    } else if (strongRegex.test($(this).val())) {
            $('#passstrength').className = 'ok';
            $('#passstrength').html('Fuerte!');
    } else if (mediumRegex.test($(this).val())) {
            $('#passstrength').className = 'alert';
            $('#passstrength').html('Media!');
    } else {
            $('#passstrength').className = 'error';
            $('#passstrength').html('Débil!');
    }
    return true;
});
*/
