<?php
class Negocio_clsUsuario{
	public $pCodigo;
	public $pApellidos;
	public $pUsuario;
	public $pClave;
	public $pTipo;
	
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
	function Verificar_Usuario($usuario, $clave){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Verificar_Usuario($usuario, $clave);
		return $rpta;
	}
	function Contar_Registros($miarchi,$miempresa){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Contar_Registros($miarchi,$miempresa);
	}
	function Contar_Registros_Menu(){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Contar_Registros_Menu();
	}			
	function Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros($miinicio,$mifinal,$miarchi,$miempresa);
	}
	function Mostrar_Registros_Menu($miinicio,$mifinal,$opcion){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros_Menu($miinicio,$mifinal,$opcion);
	}	
	function Mostrar_Registros_Tipo(){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros_Tipo();
	}
	function Mostrar_Registros_Usuario($micodarea){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros_Usuario($micodarea);
	}
	function Mostrar_Registros_Usuario1($miterminal){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros_Usuario1($miterminal);
	}
	function Mostrar_Registros_Usuario1111($miterminal,$miusuario){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Mostrar_Registros_Usuario1111($miterminal,$miusuario);
	}				
	function getROW($vCodigo) {
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->getROW($vCodigo);
	}
	function getROWEnlace($vCodigo) {
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->getROWEnlace($vCodigo);
	}
	function getROW_Submenu($vCodigo) {
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->getROW_Submenu($vCodigo);
	}	
	function Ver_Imprimir($vCodigo) {
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Ver_Imprimir($vCodigo);
	}	
	
	function Agregar($miperiodo,$miempresa){
		$oUsuario=new Datos_clsUsuario();
		$oUsuario->pApellidos=$this->pApellidos;
		$oUsuario->pUsuario=$this->pUsuario;
		$oUsuario->pClave=$this->pClave;
		$oUsuario->pTipo=$this->pTipo;
		$rpta=$oUsuario->Agregar($miperiodo,$miempresa);
		return $rpta;
	}
	function Agregar1(){
		$oUsuario=new Datos_clsUsuario();
		$rpta1=$oUsuario->Existe($this->pDni);
		if ($rpta1>0)
			{	
				$rpta=101;
				return $rpta;
			}	
			else
			{				
			$oUsuario->pApellidos=$this->pApellidos;
			$oUsuario->pUsuario=$this->pUsuario;
			$oUsuario->pClave=$this->pClave;
			$oUsuario->pArea=$this->pArea;
			$oUsuario->pTipo=$this->pTipo;
			$oUsuario->pEmail=$this->pEmail;
			$oUsuario->pVigencia=$this->pVigencia;
			$oUsuario->pEstado=$this->pEstado;
			$oUsuario->pObserva=$this->pObserva;
			$oUsuario->pDni=$this->pDni;
			$oUsuario->pEmpresa=$this->pEmpresa;
			$oUsuario->pTerminal=$this->pTerminal;
			$rpta=$oUsuario->Agregar1();
			return $rpta;
			}
	}	
	function Agregarusuariomenu($codusuario,$codmenu,$codsubmenu){
		$oUsuario=new Datos_clsUsuario();	
		$rpta=$oUsuario->Agregarusuariomenu($codusuario,$codmenu,$codsubmenu);
		return $rpta;
	}	
	function Modificar($vCodigo){
		$oUsuario=new Datos_clsUsuario();
		$oUsuario->pApellidos=$this->pApellidos;
		$oUsuario->pUsuario=$this->pUsuario;
		$oUsuario->pClave=$this->pClave;
		$oUsuario->pTipo=$this->pTipo;

		$rpta=$oUsuario->Modificar($vCodigo);
		return $rpta;
	}	
	function Modificarusuario($vCodigo){
		$oUsuario=new Datos_clsUsuario();
		$oUsuario->pClave=$this->pClave;
		$rpta=$oUsuario->Modificarusuario($vCodigo);
		return $rpta;
	}	
	function Corregir_Datos_Enlace($micodigo,$mienlace){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Corregir_Datos_Enlace($micodigo,$mienlace);
		return $rpta;
	}		
	function Modificar_Imprimir($vCodigo,$tipo){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Modificar_Imprimir($vCodigo,$tipo);
		return $rpta;
	}	
	
	function Eliminar($vCodigo){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Eliminar($vCodigo);
		return $rpta;
	}
	function Eliminarusuariomenu($vCodigo){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Eliminarusuariomenu($vCodigo);
		return $rpta;
	}			
	function Cambiarclave($vCodigo,$cClave){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Cambiarclave($vCodigo,$cClave);
		return $rpta;
	}	
	function Existe($vDetalle){
		$oUsuario=new Datos_clsUsuario();
		return $oUsuario->Existe($vDetalle);
	}	
// TRABAJADOR
	function Verificar_Usuariot($usuario, $clave){
		$oUsuario=new Datos_clsUsuario();
		$rpta=$oUsuario->Verificar_Usuariot($usuario, $clave);
		return $rpta;
	}
	
}
?>