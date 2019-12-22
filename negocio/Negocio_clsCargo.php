<?php
class Negocio_clsCargo{
	public $pCodigo;
	
	public $arrErrores=array();
	function __construct(){
		$this->arrErrores=array(
			100 => "Error al actualizar el registro.",
			101 => "El usuario ingresado ya existe.",
			999 => "No se puede eliminar el registro por estar vinculado con otros datos."
		);
	}
	function Mensaje_Error($vCodigo){
		return $this->arrErrores[intval($vCodigo)];
	}
	function Contar_Registros($miempresa){
		$oCargo=new Datos_clsCargo();
		return $oCargo->Contar_Registros($miempresa);
	}
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$oCargo=new Datos_clsCargo();
		return $oCargo->Mostrar_Registros($miinicio,$mifinal,$miempresa);
	}
	function getROW($vCodigo) {
		$oCargo=new Datos_clsCargo();
		return $oCargo->getROW($vCodigo);
	}
	function Agregar($miempresa,$txtbanco){
		$oCargo=new Datos_clsCargo();
		$rpta=$oCargo->Agregar($miempresa,$txtbanco);
		return $rpta;
	}
	function Modificar($micodigo,$txtbanco){
		$oCargo=new Datos_clsCargo();
		$rpta=$oCargo->Modificar($micodigo,$txtbanco);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oCargo=new Datos_clsCargo();
		$rpta=$oCargo->Eliminar($vCodigo);
		return $rpta;
	}
}
?>