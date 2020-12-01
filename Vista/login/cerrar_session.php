<?php 
include_once("../estructura/cabeceraBT.php");


if($mySession->isLog())
{
    $mySession->cerrarSesion();       
    header ("location: http://localhost/114490fidrive/vista/login/login.php");
        exit;
}
include_once("../estructura/menuBT.php");
include_once("../estructura/pieBT.php");

?>