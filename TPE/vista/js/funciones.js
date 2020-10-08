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
function SeleccionarArchivo(valor)
{
    var nombre;
    
    document.getElementById("ruta").value=valor;
    nombre=valor.split('/');
    document.getElementById("seleccion").value=nombre[3];
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
    document.getElementById("accion").value='modificararchivo';
}
function NuevoArchivo()
{
    document.getElementById("accion").value='nuevoarchivo';
}
function AccionHash()
{
    document.getElementById("accion").value='nuevohash';
}
function FortalezaPassword()
{
    $pass=document.getElementById('txtpassword');
    if($pass.value.length()>6)
    {
        echo ('Fuerte');
    }
    else{
        echo ('Debil');
    }
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
    $nombre=document.getElementById('nombre');
    /*punto=nombre.lastIndexOf(".");
    extension=indexOf(punto,nombre.lengt());*/
    $extension=getFileExtension($nombre.value);
    
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
