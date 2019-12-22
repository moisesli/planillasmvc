<?php
class Negocio_clsTipotrabajador{
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
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Contar_Registros($miempresa);
	}
	function Contar_Registros_Asistencia($elcodigo,$miperiodo){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Contar_Registros_Asistencia($elcodigo,$miperiodo);
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Mostrar_Registros($miinicio,$mifinal,$miempresa);
	}
	function Mostrar_Registros_Asistencia($inicial,$cantidad,$elcodigo,$miperiodo){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Mostrar_Registros_Asistencia($inicial,$cantidad,$elcodigo,$miperiodo);
	}	
	function getROW($vCodigo) {
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->getROW($vCodigo);
	}
	function Agregar($miempresa,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		$rpta=$oTipotrabajador->Agregar($miempresa,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo);
		return $rpta;
	}
	function Modificar($micodigo,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		$rpta=$oTipotrabajador->Modificar($micodigo,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		$rpta=$oTipotrabajador->Eliminar($vCodigo);
		return $rpta;
	}
	function Mostrar_Registros_Todos($miempresa){
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Mostrar_Registros_Todos($miempresa);
	}
// BUSCAR TIPO DE TRABAJADOR PARA LOS DIAS DE TRABAJO
	function Buscar_Tipo($miempresa,$laplanilla) {
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->Buscar_Tipo($miempresa,$laplanilla);
	}
	function buscartipo($tipotrabajador) {
		$oTipotrabajador=new Datos_clsTipotrabajador();
		return $oTipotrabajador->buscartipo($tipotrabajador);
	}
/////////////////////////////////////////////////////		
}
?>