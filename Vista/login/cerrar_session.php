<?php 
include_once("../estructura/cabeceraBT.php");


if($mySession->isLog())
{
    $mySession->cerrarSesion();       
    header ($INICIO);
        exit;
}
include_once("../estructura/menuBT.php");
include_once("../estructura/pieBT.php");

?>