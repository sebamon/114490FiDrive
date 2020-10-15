<?php

include_once "../../configuracion.php";
$objAbmTabla = new AbmAuto();

$listaTabla = $objAbmTabla->buscar(null);

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ver Autos</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>ABM - Autos</h3>
<!-- <a href="ftabla_nuevo.php">nuevo</a> -->
<table border="1">
<?php	

 if( count($listaTabla)>0){
    foreach ($listaTabla as $objTabla) { 
        
        echo '<tr><td style="width:500px;">'.$objTabla->getMarca().'</td>';
        echo '<td><a href="fauto_editar.php?Patente='.$objTabla->getPatente().'">editar</a></td>';
        //echo '<td><a href="accion/abmAuto.php?accion=borrar&id='.$objTabla->getId().'">borrar</a></td></tr>'; 
	}
}

?>
</table>
</body>
</html>