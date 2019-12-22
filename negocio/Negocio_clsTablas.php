<?php
class Negocio_clsTablas{
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
// TABLA DOCUMENTO
	function Mostrar_Documento(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Documento();
	}
// TABLA SEXO
	function Mostrar_Sexo(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Sexo();
	}		
// TABLA NACIONALIDAD
	function Mostrar_Nacionalidad(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Nacionalidad();
	}
	function Agregar_Nacionalidad($minacion){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Agregar_Nacionalidad($minacion);
	}	
// TABLA ACTIVO
	function Mostrar_Activo(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Activo();
	}	
// TABLA EDUCACION
	function Mostrar_Educacion(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Educacion();
	}
// TABLA TIPO DE TRABAJADOR
	function Mostrar_Tipotrabajador(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Tipotrabajador();
	}	
// TABLA SINO
	function Mostrar_Sino(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Sino();
	}
// TABLA VIAS
	function Mostrar_Vias(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Vias();
	}
// TABLA ZONAS
	function Mostrar_Zonas(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Zonas();
	}	
// TABLA REGIMEN LABORAL
	function Mostrar_Regimenlaboral(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Regimenlaboral();
	}	
// TABLA OCUPACION
	function Mostrar_Ocupacion(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Ocupacion();
	}	
// TABLA TIPO CONTRATO
	function Mostrar_Tipocontrato(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Tipocontrato();
	}
// TABLA PERIODICIDDAD
	function Mostrar_Periocidad(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Periocidad();
	}	
// TABLA SITUCION LABORAL
	function Mostrar_Situacion(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Situacion();
	}	
// TABLA SITUCION ESPECIAL
	function Mostrar_Situacionespecial(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Situacionespecial();
	}	
// TABLA TIPO DE PAGO
	function Mostrar_Tipopago(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Tipopago();
	}
// TABLA CATEGORIA OCUPACIONES
	function Mostrar_CategoriaOcupacional(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_CategoriaOcupacional();
	}	
// TABLA CONVENIOS
	function Mostrar_Convenios(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Convenios();
	}
// TABLA INSTITUTO
	function Mostrar_Instituto(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Instituto();
	}
// TABLA CARRERA
	function Mostrar_Carrera($lapro){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Carrera($lapro);
	}																	
	function Mostrar_Cargo(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Cargo();
	}
	function Mostrar_Registros_Periodos(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Registros_Periodos();
	}
	function BuscarDocumento($documento){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarDocumento($documento);
	}																	
	function BuscarEmpleados($documento){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarEmpleados($documento);
	}																	
	function BuscarMes($documento){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarMes($documento);
	}																	
	function BuscarTipotrabajador($documento){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarTipotrabajador($documento);
	}																	
	function MostrarEscalafon($elcodigo,$laopcion){
		$oTablas=new Datos_clsTablas();
		return $oTablas->MostrarEscalafon($elcodigo,$laopcion);
	}
	function Mostrar_Meses(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Meses();
	}		
	function Mostrar_Asistencia($elcodigo,$elmes){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Asistencia($elcodigo,$elmes);
	}
	function BuscarHorario($micod){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarHorario($micod);
	}																	
	function Mostrar_Justifica(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Justifica();
	}
	function ContarControl($miperiodo,$elmes,$elcodigo){
		$oTablas=new Datos_clsTablas();
		return $oTablas->ContarControl($miperiodo,$elmes,$elcodigo);
	}
	function AgregarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin){
		$oTablas=new Datos_clsTablas();
		return $oTablas->AgregarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin);
	}	
	function ModificarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin){
		$oTablas=new Datos_clsTablas();
		return $oTablas->ModificarControl($miperiodo,$elmes,$elcodigo,$totdias,$totalhoras,$totalminutos,$desdia,$deshora,$desmin);
	}	
	function Ponertardanza($codtra,$horas,$miminuto){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Ponertardanza($codtra,$horas,$miminuto);
	}	
	function Mostrar_Trabajadores(){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Mostrar_Trabajadores();
	}
	function BuscarJustifica($micod){
		$oTablas=new Datos_clsTablas();
		return $oTablas->BuscarJustifica($micod);
	}
	function Buscarmesnumero($elmesnumero){
		$oTablas=new Datos_clsTablas();
		return $oTablas->Buscarmesnumero($elmesnumero);
	}																	
	
}
?>