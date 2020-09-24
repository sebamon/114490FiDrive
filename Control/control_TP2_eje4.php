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
		if (isset($datos['radioEdad']) )
		{
		$restriccion=$datos["radioEdad"];
		}
		else
		$restriccion=null;
		$sinopsis=$datos["sinopsis"];
		

		$resultado='</br>Titulo: '.$titulo.'</br>';
		$resultado.='Actores: '.$actores.'.</br>';
		$resultado.='Director: '.$director.'</br>';
		$resultado.='Guion: '.$guion.'</br>';
		$resultado.='Produccion: '.$produccion.'</br>';
		$resultado.='Año: '.$anio.'</br>';
		$resultado.='Nacionalidad: '.$nacionalidad.'</br>';
		$resultado.='Duracion: '.$genero.'</br>';
		switch($restriccion)
		{
			case ('ATP') : $resultado.='Restriccion: Apta para Todo Publico </br>';break;
			case ('Mas7') : $resultado.='Restriccion: Mayores de 7 Años</br>';break;
			case ('Mas18') : $resultado.='Restriccion: Mayores de 18 Años</br>';
		}
		// $resultado.='Restriccion: '.$restriccion.'</br>';
		$resultado.='Sinopsis: '.$sinopsis.'</br>';
		return $resultado;




	}
}
?>