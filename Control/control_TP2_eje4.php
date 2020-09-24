<?php
class control_TP2_eje4
{
	public function AgregarPelicula($datos)
	{
		$titulo=$datos["titulo"];
		$actores=$datos["actores"];
		$director=$datos["director"];
		$guion=$datos["guion"];
		$produccion=$datos["produccion"];
		$anio=$datos["anio"];
		$nacionalidad=$datos["nacionalidad"];
		$genero=$datos["genero"];
		$duracion=$datos["duracion"];
		//$restriccion=$datos["restriccion"];
		$sinopsis=$datos["sinopsis"];
		

		$resultado='Titulo: '.$titulo.'\n';
		$resultado+='Actores: '.$actores.'\n';

		return $resultado;




	}
}
?>