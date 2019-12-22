<?php
class Negocio_clsConfiguracion{
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
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->Contar_Registros($miempresa,$miperiodo);
	}
	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo);
	}
	function getROW($vCodigo) {
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->getROW($vCodigo);
	}
	function Agregar($miempresa,$miperiodo){
		$oConfiguracion=new Datos_clsConfiguracion();
		$rpta=$oConfiguracion->Agregar($miempresa,$miperiodo);
		return $rpta;
	}
	function Modificar($elcodigo,$txtunidad,$txtentidad,$txtruc,$txtdireccion,$txtemail,$txttelefono,$txtsueldo,$txtasignacion,$txtcts,$txtminuto,$txtuit,$txtquinta){
		$oConfiguracion=new Datos_clsConfiguracion();
		$rpta=$oConfiguracion->Modificar($elcodigo,$txtunidad,$txtentidad,$txtruc,$txtdireccion,$txtemail,$txttelefono,$txtsueldo,$txtasignacion,$txtcts,$txtminuto,$txtuit,$txtquinta);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oConfiguracion=new Datos_clsConfiguracion();
		$rpta=$oConfiguracion->Eliminar($vCodigo);
		return $rpta;
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->Mostrar_Registros_Mes();
	}
	function Buscar_Entidad($miempresa,$miperiodo) {
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->Buscar_Entidad($miempresa,$miperiodo);
	}
	function Buscar_aporteempleador($miempresa,$miperiodo){
		$oConfiguracion=new Datos_clsConfiguracion();
		return $oConfiguracion->Buscar_aporteempleador($miempresa,$miperiodo);
	}
		
}
?>