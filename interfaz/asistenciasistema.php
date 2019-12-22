<?php

	include("../config.php");
	require_once(LOGICA."/negocio.php");	

    $laplanila=$_GET['micodigo'];
	$miperiodo=$_GET['elperiodo'];
	$elmes=$_GET['elmes'];

					  	$olistado=new Negocio_clsDescuento();
						$rslistado=$olistado->Mostrar_Registros(0,1000,$laplanila);			
						while($rowusuario=$rslistado->fetch_array())
						{
							$codtrabajador=$rowusuario['codtrabajador'];
							
							$rslistadoss=$olistado->BusscarControl($miperiodo,$elmes,$codtrabajador);			
							$desdia=$rslistadoss['desdia'];
							$destardanza=$rslistadoss['deshor']+$rslistadoss['desmin'];
							
							$candia=$rslistadoss['dia'];
							
							$intError=$olistado->ActualizarDescuentoFaltas($laplanila,$codtrabajador,$desdia,$destardanza,$candia);
						}

	

	header("location: descuentoproceso.php?micodigo=$laplanila");

?>		
