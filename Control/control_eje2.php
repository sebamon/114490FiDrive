<?php
class control_eje2
{
	public function SumarHoras($dato)
	{

		$horas=0;
		
		$arreglo = array($dato["lunes"], $dato["martes"], $dato["miercoles"], $dato["jueves"], $dato["viernes"]);
		foreach($arreglo as $dias)
		{
			$horas+=$dias;
		}
		 
		return $horas;

		




	}
}
?>