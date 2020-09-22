<?php
class control_eje1
{
	public function CalcularPositivo($dato)
	{
		$numero=$dato['numero'];
		
		if ($numero==0) 
		{
			$resultado='Cero';
		}
		else
		{
			if($numero>0)
			{
				$resultado='Positivo';
			}
			else
			{
				$resultado='Negativo';
			}	
		}
		return $resultado;
	}
}
?>