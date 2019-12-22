<?php
class Negocio_clsAbono{
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
	function Contar_Registros(){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Contar_Registros();
	}
	function Contar_Registros_Tregistro(){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Contar_Registros_Tregistro();
	}
	function Contar_Registros_Plame(){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Contar_Registros_Plame();
	}		
	function Mostrar_Registros($miinicio,$mifinal){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Mostrar_Registros($miinicio,$mifinal);
	}
	function Mostrar_Registros_Tregistro($miinicio,$mifinal){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Mostrar_Registros_Tregistro($miinicio,$mifinal);
	}	
	function Mostrar_Registros_Plame($miinicio,$mifinal){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Mostrar_Registros_Plame($miinicio,$mifinal);
	}		
	function Mostrar_Todos(){
		$oAbono=new Datos_clsAbono();
		return $oAbono->Mostrar_Todos();
	}		
	function getROW($vCodigo) {
		$oAbono=new Datos_clsAbono();
		return $oAbono->getROW($vCodigo);
	}
	function Agregar($miafp){
		$oAbono=new Datos_clsAbono();
		$rpta=$oAbono->Agregar($miafp);
		return $rpta;
	}
	function Modificar($vCodigo,$miafp){
		$oAbono=new Datos_clsAbono();
		$rpta=$oAbono->Modificar($vCodigo,$miafp);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oAbono=new Datos_clsAbono();
		$rpta=$oAbono->Eliminar($vCodigo);
		return $rpta;
	}			
}
?>