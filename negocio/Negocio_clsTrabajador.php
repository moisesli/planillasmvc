<?php
class Negocio_clsTrabajador{
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
	function Contar_Registros($mibusca,$labusca,$miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Contar_Registros($mibusca,$labusca,$miempresa);
	}
	function Mostrar_Registros($miinicio,$mifinal,$mibusca,$labusca,$miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Mostrar_Registros($miinicio,$mifinal,$mibusca,$labusca,$miempresa);
	}
	function getROW($vCodigo) {
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->getROW($vCodigo);
	}
	function Agregar($miempresa,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Agregar($miempresa,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca);
		return $rpta;
	}
	function Modificar($vCodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Modificar($vCodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$mifoto,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca);
		return $rpta;
	}	
	function Modificar1($micodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Modificar1($micodigo,$txtapellidos,$txtapellidos2,$txtnombres,$txtcoddocu,$txtnundoc,$txtdireccion,$txtsexo,$txtfecnaci,$txtnacionalidad,$txtemail,$txteducacion,$txtactivo,$txttipotrabajador,$txtnuncontratto,$txtfecini,$txtfecfin,$txtcargo,$txtsueldo,$txtautogenerado,$txtasigna,$txtonp,$txtafp,$txtcupss,$txtbanco,$txtcuenta,$txtapellidosjudicial,$txtsueldojudicial,$txtapellidosjudicial1,$txtsueldojudicial1,$txtusuario,$txtclave,$txtessalud,$txtdomiciliado,$txtvia,$txtnomvia,$txtnumvia,$txtinterior,$txtzona,$txtnomzona,$txtreferencia,$txtubigeo,$txtregimenlaboral,$txtocupacion,$txtdiscapacidad,$txttipocontrato,$txtregimenalternativo,$txtjornadamaxima,$txthorario,$txtdindicato,$txtperiodicidad,$txtsituacion,$txtrenta,$txtsituacione,$txttipopago,$txtcategoria,$txtconvenio,$txtinstituto,$txtcarrera,$txtano,$txtflujo,$txtscrt,$txtcts,$txtcafae,$txtescolar,$txtvaca,$fuentes_id,$actividades_id);
		return $rpta;
	}		
	function Eliminar($vCodigo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Eliminar($vCodigo);
		return $rpta;
	}
	function Mostrar_Registros_Todos($miempresa,$mitipo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Todos($miempresa,$mitipo);
		return $rpta;
	}
	function Mostrar_Registros_Todos1($miempresa,$mitipo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Todos1($miempresa,$mitipo);
		return $rpta;
	}
	
	function Mostrar_Registros_Todos_Judicial($miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Todos_Judicial($miempresa);
		return $rpta;
	}	
	function Mostrar_Registros_Todos_Todos($miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Todos_Todos($miempresa);
		return $rpta;
	}	
	function Buscar_Documento($midocumento){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Buscar_Documento($midocumento);
		return $rpta;
	}		
	function Buscar_Sexo($misexo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Buscar_Sexo($misexo);
		return $rpta;
	}
	function Mostrar_Registros_Todos_Todos_Pensionista($miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Todos_Todos_Pensionista($miempresa);
		return $rpta;
	}	
	function Buscar_Regimen($laafp){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Buscar_Regimen($laafp);
		return $rpta;
	}					
	function ContarHorario($codtrabajador){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->ContarHorario($codtrabajador);
	}
	function Contar_Contratosvencidos($mimes){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Contar_Contratosvencidos($mimes);
	}
	function Buscar_Mes($mimes){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Buscar_Mes($mimes);
	}
	function AgregarEscalafon($codtra,$laopcion,$detalle,$descripcion,$observa){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->AgregarEscalafon($codtra,$laopcion,$detalle,$descripcion,$observa);
	}
	function EliminarEscalafon($vCodigo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->EliminarEscalafon($vCodigo);
		return $rpta;
	}
	
	function AgregarHorario($codtrabajador){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->AgregarHorario($codtrabajador);
	}
	function BuscarHorario($micodigo){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->BuscarHorario($micodigo);
		return $rpta;
	}						
	function Modificar_Horario($elcodigo,$lunese,$lunes_e,$luness,$lunes_s,$martese,$martes_e,$martess,$martes_s,$miercolese,$miercoles_e,$miercoless,$miercoles_s,$juevese,$jueves_e,$juevess,$jueves_s,$viernese,$viernes_e,$vierness,$viernes_s,$sabadoe,$sabado_e,$sabados,$sabado_s,$domingoe,$domingo_e,$domingos,$domingo_s){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Modificar_Horario($elcodigo,$lunese,$lunes_e,$luness,$lunes_s,$martese,$martes_e,$martess,$martes_s,$miercolese,$miercoles_e,$miercoless,$miercoles_s,$juevese,$jueves_e,$juevess,$jueves_s,$viernese,$viernes_e,$vierness,$viernes_s,$sabadoe,$sabado_e,$sabados,$sabado_s,$domingoe,$domingo_e,$domingos,$domingo_s);
	}
	function Mostrar_Registros_Apertura(){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Apertura();
		return $rpta;
	}
	function Contarapertura($txtfecha){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Contarapertura($txtfecha);
	}
	function AgregarAperura($txtfecha,$midia){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->AgregarAperura($txtfecha,$midia);
	}
	function Mostrar_Registros_Lista($miempresa){
		$oTrabajador=new Datos_clsTrabajador();
		$rpta=$oTrabajador->Mostrar_Registros_Lista($miempresa);
		return $rpta;
	}	
	function Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turno,$midia,$horas){
		$oTrabajador=new Datos_clsTrabajador();
		return $oTrabajador->Agregarasiste($miempresa,$codtrabajador,$fecha,$miano,$mimes,$turno,$midia,$horas);
	}
	
}
?>