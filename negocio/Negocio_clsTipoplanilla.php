<?php
class Negocio_clsTipoplanilla{
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
	function Contar_Registros($miarchi,$miempresa){
		$oTipoplan=new Datos_clsTipoplanilla();
		return $oTipoplan->Contar_Registros($miarchi,$miempresa);
	}
	function Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa){
		$oTipoplan=new Datos_clsTipoplanilla();
		return $oTipoplan->Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa);
	}
	function getROW($vCodigo) {
		$oTipoplan=new Datos_clsTipoplanilla();
		return $oTipoplan->getROW($vCodigo);
	}
	function Agregar($mitipoplanilla,$miinicial,$miempresa,$midescuento){
		$oTipoplan=new Datos_clsTipoplanilla();
		$rpta=$oTipoplan->Agregar($mitipoplanilla,$miinicial,$miempresa,$midescuento);
		return $rpta;
	}
	function Modificar($vCodigo,$mitipoplanilla,$miinicial,$midescuento){
		$oTipoplan=new Datos_clsTipoplanilla();
		$rpta=$oTipoplan->Modificar($vCodigo,$mitipoplanilla,$miinicial,$midescuento);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oTipoplan=new Datos_clsTipoplanilla();
		$rpta=$oTipoplan->Eliminar($vCodigo);
		return $rpta;
	}
	function Mostrar_Registros_Todos($miempresa){
		$oTipoplan=new Datos_clsTipoplanilla();
		return $oTipoplan->Mostrar_Registros_Todos($miempresa);
	}
	function Buscar_Tipoplanilla($laplanilla,$miempresa) {
		$oTipoplan=new Datos_clsTipoplanilla();
		return $oTipoplan->Buscar_Tipoplanilla($laplanilla,$miempresa);
	}		
}
?>