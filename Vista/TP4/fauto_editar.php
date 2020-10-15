<?php

include_once '../../configuracion.php';
$objAbmTabla = new AbmAuto();
$datos = data_submitted();
$obj =NULL;
if (isset($datos['Patente'])){
    $listaTabla = $objAbmTabla->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//ES" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Ejemplo</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h3>Auto</h3>
<?php if ($obj!=null){?>
<form method="post" action="accion/abmAuto.php">
	<label>ID</label><br/>
	<input id="Patente:" readonly name ="Patente" width="80" type="text" value="<?php echo $obj->getPatente()?>"><br/>
	<label>Marca</label><br/>
	<input type="text"  id="Marca" name="Marca" value='<?php echo $obj->getMarca()?>'><br/>
	<label>Modelo</label><br/>
	<input type="text"  id="Modelo" name="Modelo" value='<?php echo $obj->getModelo()?>'><br/>
	<label>Dni Dueño</label><br/>
	<input type="text"  id="DniDuenio" name="DniDuenio" value='<?php echo $obj->getDniDuenio()?>'><br/>

	<input id="accion" name ="accion" value="editar" type="hidden">
	<input type="submit">
</form>
<?php }else {
    
    echo "<p>No se encontro la clave que desea modificar";
}?>
<br><br>
<a href="VerAutos.php">Volver</a>
</body>
</html>