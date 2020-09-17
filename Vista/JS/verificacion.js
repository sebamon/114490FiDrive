
function VerificarEdad()
{
    var verificar=true;
    var edad = document.getElementById("edad");
    
    if(isNaN(edad.value))
        verificar=false;
        else{
            if((edad.value<=0) || (edad.value>110))
            {
                verificar=false;
            }
        }
  
    return verificar;
}

