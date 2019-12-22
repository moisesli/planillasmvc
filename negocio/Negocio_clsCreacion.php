<?php
class Negocio_clsCreacion{
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
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Contar_Registros($miempresa,$miperiodo);
	}
	function Contar_Registros1($miempresa,$miperiodo){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Contar_Registros1($miempresa,$miperiodo);
	}	
	function Contar_Registros_Planilla($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Contar_Registros_Planilla($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero);
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo);
	}
	function Mostrar_Registros1($miinicio,$mifinal,$miempresa,$miperiodo){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Mostrar_Registros1($miinicio,$mifinal,$miempresa,$miperiodo);
	}	
	function Mostrar_Todos($miempresa){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Mostrar_Todos($miempresa);
	}	
	function getROW($vCodigo) {
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->getROW($vCodigo);
	}
	function Agregar($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10
					
	,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17
					 
					){
		$oCreacion=new Datos_clsCreacion();
		$rpta=$oCreacion->Agregar($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10
								 
		,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17						 
								 
								 );
		return $rpta;
	}
	function Modificar($vCodigo,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17){
		$oCreacion=new Datos_clsCreacion();
		$rpta=$oCreacion->Modificar($vCodigo,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17);
		return $rpta;
	}	
	function Eliminar($vCodigo){
		$oCreacion=new Datos_clsCreacion();
		$rpta=$oCreacion->Eliminar($vCodigo);
		return $rpta;
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Mostrar_Registros_Mes();
	}
	function Buscar_Mes($elmes){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Buscar_Mes($elmes);
	}
	function Contar_Dia($eldia,$miempresa){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Contar_Dia($eldia,$miempresa);
	}		
	function Contar_Registros1trabajador($micodusu){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Contar_Registros1trabajador($micodusu);
	}	
	function Mostrar_Registros1trabajador($miinicio,$mifinal,$micodusu){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->Mostrar_Registros1trabajador($miinicio,$mifinal,$micodusu);
	}	
	function BuscarPlanillacreada($elmes){
		$oCreacion=new Datos_clsCreacion();
		return $oCreacion->BuscarPlanillacreada($elmes);
	}
	
}
?>