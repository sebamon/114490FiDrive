function CheckPassword()
{
    var pass;
    var check;
    pass=document.getElementById('txtcontraseña');
    check=document.getElementById('contraseña');

    if (check.checked)
    {
        
        pass.style.visibility='visible';
        pass.disabled=false;
       
   
    }  
    else{
        pass.disabled=true;

    }

}