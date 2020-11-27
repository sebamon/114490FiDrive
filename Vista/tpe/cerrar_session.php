<?php 
include_once("../estructura/cabecera.php");

if(isset($_SESSION))
{
    $myLogin = new AbmLogin();
    $myLogin->cerrarSesion();    
    
}


?>