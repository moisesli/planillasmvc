<?php
class Negocio_clsPlanilla{
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

	function Agregar($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$codtrabajador,$diastrabajados,$elcargo,$elsueldo,$totalingreso1,$totalingreso2,$totalingreso3,$totalingreso4,$totalingreso5,$totalingreso6,$totalingreso7,$totalingreso8,$totalingreso9,$totalingreso10,$totalingreso11,$totalingreso12,$totalingreso13,$totalingreso14,$totalingreso15,$totalingreso16,$totalingreso17,$totalingreso18,$totalingreso19,$totalingreso20,$totalingreso21,$totalingreso22,$totalingreso23,$totalingreso24,$signatotal,$nombreafp,$afp1,$afp2,$afp3,$totalonp,$totalessalud,$totalsenati,$totalscrtsalud,$totalscrtpension,$totalies,$totalipssvida,$totalquinta,$totalfaltas,$totaldscto1,$totaldscto2,$totaldscto3,$totaldscto4,$totaldscto5,$totaldscto6,$totaldscto7,$totaldscto8,$totaldscto9,$totaldscto10,$totaldscto11,$totaldscto12,$totaldscto13,$totaldscto14,$totaldscto15,$totaldscto16,$totaldscto17,$totalcts){
		$oPlanilla=new Datos_clsPlanilla();
		return $oPlanilla->Agregar($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$codtrabajador,$diastrabajados,$elcargo,$elsueldo,$totalingreso1,$totalingreso2,$totalingreso3,$totalingreso4,$totalingreso5,$totalingreso6,$totalingreso7,$totalingreso8,$totalingreso9,$totalingreso10,$totalingreso11,$totalingreso12,$totalingreso13,$totalingreso14,$totalingreso15,$totalingreso16,$totalingreso17,$totalingreso18,$totalingreso19,$totalingreso20,$totalingreso21,$totalingreso22,$totalingreso23,$totalingreso24,$signatotal,$nombreafp,$afp1,$afp2,$afp3,$totalonp,$totalessalud,$totalsenati,$totalscrtsalud,$totalscrtpension,$totalies,$totalipssvida,$totalquinta,$totalfaltas,$totaldscto1,$totaldscto2,$totaldscto3,$totaldscto4,$totaldscto5,$totaldscto6,$totaldscto7,$totaldscto8,$totaldscto9,$totaldscto10,$totaldscto11,$totaldscto12,$totaldscto13,$totaldscto14,$totaldscto15,$totaldscto16,$totaldscto17,$totalcts);
	}
	function Agregar_Judicial($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$apetrabajador,$elsueldo){
		$oPlanilla=new Datos_clsPlanilla();
		return $oPlanilla->Agregar_Judicial($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$apetrabajador,$elsueldo);
	}		
	function Eliminar($vCodigo){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Eliminar($vCodigo);
		return $rpta;
	}	
	function Buscar_Planilla($laplanila){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Buscar_Planilla($laplanila);
		return $rpta;
	}		
	function Mostrar_Registros_Todos($laplanila){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos($laplanila);
		return $rpta;
	}
	function Mostrar_Registros_Todos_Trabajadores_Planilla($laplanila){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos_Trabajadores_Planilla($laplanila);
		return $rpta;
	}	
	function Mostrar_Registros_Todos1($laplanila){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos1($laplanila);
		return $rpta;
	}
	function Mostrar_Registros_Todos2($laplanilla,$codtrabajador){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos2($laplanilla,$codtrabajador);
		return $rpta;
	}	
	function Mostrar_Registros_Todos_Trabajador($codtrabajador){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos_Trabajador($codtrabajador);
		return $rpta;
	}	
	function Mostrar_Registros_Todos_Judiciales($laplanila){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Mostrar_Registros_Todos_Judiciales($laplanila);
		return $rpta;
	}	
	function Eliminar_Judicial($vCodigo){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Eliminar_Judicial($vCodigo);
		return $rpta;
	}				
	function BuscarConcepto($miempresa,$miperiodo){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->BuscarConcepto($miempresa,$miperiodo);
		return $rpta;
	}		
	function AgregarConcepto($miempresa,$miperiodo,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txties,$txtippsvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txtcts){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->AgregarConcepto($miempresa,$miperiodo,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txties,$txtippsvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txtcts);
		return $rpta;
	}		
	function BuscarCreacion($micodigo){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->BuscarCreacion($micodigo);
		return $rpta;
	}		
	function Buscar_UltimaPlanilla(){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Buscar_UltimaPlanilla();
		return $rpta;
	}		
	function Buscar_Planillas($elcodplanilla){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Buscar_Planillas($elcodplanilla);
		return $rpta;
	}		
	function Listarcontrol($elperiodo,$elmes){
		$oPlanilla=new Datos_clsPlanilla();
		$rpta=$oPlanilla->Listarcontrol($elperiodo,$elmes);
		return $rpta;
	}
	
}
?>