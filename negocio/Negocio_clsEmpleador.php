<?php
class Negocio_clsEmpleador{
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
	function Contar_Registros($miempresa,$miperiodo){
		$oEmpleador=new Datos_clsEmpleador();
		return $oEmpleador->Contar_Registros($miempresa,$miperiodo);
	}
	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$oEmpleador=new Datos_clsEmpleador();
		return $oEmpleador->Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo);
	}
	function getROW($vCodigo) {
		$oEmpleador=new Datos_clsEmpleador();
		return $oEmpleador->getROW($vCodigo);
	}
	function Agregar($miempresa,$miperiodo,$mimes){
		$oEmpleador=new Datos_clsEmpleador();
		$rpta=$oEmpleador->Agregar($miempresa,$miperiodo,$mimes);
		return $rpta;
	}
	function Modificar($elcodigo,$txtessalud,$txtonp,$txtesscas,$txtsolcas,$txtmaxcas,$txtsenati,$txtscrtsalud,$txtscrtpension){
		$oEmpleador=new Datos_clsEmpleador();
		$rpta=$oEmpleador->Modificar($elcodigo,$txtessalud,$txtonp,$txtesscas,$txtsolcas,$txtmaxcas,$txtsenati,$txtscrtsalud,$txtscrtpension);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oEmpleador=new Datos_clsEmpleador();
		$rpta=$oEmpleador->Eliminar($vCodigo);
		return $rpta;
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$oEmpleador=new Datos_clsEmpleador();
		return $oEmpleador->Mostrar_Registros_Mes();
	}	
	function Buscar_Aporte($miempresa,$miperiodo,$mimes) {
		$oEmpleador=new Datos_clsEmpleador();
		return $oEmpleador->Buscar_Aporte($miempresa,$miperiodo,$mimes);
	}	
}
?>