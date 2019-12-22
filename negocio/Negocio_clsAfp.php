<?php
class Negocio_clsAfp{
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
		$oAfp=new Datos_clsAfp();
		return $oAfp->Contar_Registros($miempresa);
	}
	function Contar_Registros_Aportes($micodigo,$miperiodo){
		$oAfp=new Datos_clsAfp();
		return $oAfp->Contar_Registros_Aportes($micodigo,$miperiodo);
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$oAfp=new Datos_clsAfp();
		return $oAfp->Mostrar_Registros($miinicio,$mifinal,$miempresa);
	}
	function Mostrar_Todos($miempresa){
		$oAfp=new Datos_clsAfp();
		return $oAfp->Mostrar_Todos($miempresa);
	}	
	function Mostrar_Registros_Aportes($miinicio,$mifinal,$micodigo,$miperiodo){
		$oAfp=new Datos_clsAfp();
		return $oAfp->Mostrar_Registros_Aportes($miinicio,$mifinal,$micodigo,$miperiodo);
	}	
	function getROW($vCodigo) {
		$oAfp=new Datos_clsAfp();
		return $oAfp->getROW($vCodigo);
	}
	function Agregar($miafp,$miempresa){
		$oAfp=new Datos_clsAfp();
		$rpta=$oAfp->Agregar($miafp,$miempresa);
		return $rpta;
	}
	function Modificar($vCodigo,$miafp){
		$oAfp=new Datos_clsAfp();
		$rpta=$oAfp->Modificar($vCodigo,$miafp);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oAfp=new Datos_clsAfp();
		$rpta=$oAfp->Eliminar($vCodigo);
		return $rpta;
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$oAfp=new Datos_clsAfp();
		return $oAfp->Mostrar_Registros_Mes();
	}
// AGRAGR APORTES
	function Agregar_Aporte($micodigo,$miperiodo,$txtmes,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo){
		$oAfp=new Datos_clsAfp();
		$rpta=$oAfp->Agregar_Aporte($micodigo,$miperiodo,$txtmes,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo);
		return $rpta;
	}	
	function getROW_Aporte($vCodigo) {
		$oAfp=new Datos_clsAfp();
		return $oAfp->getROW_Aporte($vCodigo);
	}	
	function Modificar_Aporte($elcodigo,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo){
		$oAfp=new Datos_clsAfp();
		$rpta=$oAfp->Modificar_Aporte($elcodigo,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo);
		return $rpta;
	}
	function Buscar_Afpcodigo($miempresa,$miafp) {
		$oAfp=new Datos_clsAfp();
		return $oAfp->Buscar_Afpcodigo($miempresa,$miafp);
	}	
	function Buscar_Aporte($codafp,$miperiodo,$mimes) {
		$oAfp=new Datos_clsAfp();
		return $oAfp->Buscar_Aporte($codafp,$miperiodo,$mimes);
	}				
}
?>