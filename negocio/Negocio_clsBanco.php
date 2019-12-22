<?php
class Negocio_clsBanco{
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
		$oBanco=new Datos_clsBanco();
		return $oBanco->Contar_Registros($miempresa);
	}
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$oBanco=new Datos_clsBanco();
		return $oBanco->Mostrar_Registros($miinicio,$mifinal,$miempresa);
	}
	function Mostrar_Todos($miempresa){
		$oBanco=new Datos_clsBanco();
		return $oBanco->Mostrar_Todos($miempresa);
	}	
	function getROW($vCodigo) {
		$oBanco=new Datos_clsBanco();
		return $oBanco->getROW($vCodigo);
	}
	function Agregar($miempresa,$txtbanco){
		$oBanco=new Datos_clsBanco();
		$rpta=$oBanco->Agregar($miempresa,$txtbanco);
		return $rpta;
	}
	function Modificar($micodigo,$txtbanco){
		$oBanco=new Datos_clsBanco();
		$rpta=$oBanco->Modificar($micodigo,$txtbanco);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oBanco=new Datos_clsBanco();
		$rpta=$oBanco->Eliminar($vCodigo);
		return $rpta;
	}
	function AgregarJustifca($txtbanco){
		$oBanco=new Datos_clsBanco();
		$rpta=$oBanco->AgregarJustifca($txtbanco);
		return $rpta;
	}
	function ModificarJustifca($micodigo,$txtbanco){
		$oBanco=new Datos_clsBanco();
		$rpta=$oBanco->ModificarJustifca($micodigo,$txtbanco);
		return $rpta;
	}	
	
}
?>