<?php
class Negocio_clsDescuento{
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
	function Contar_Registros($laplanila){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Contar_Registros($laplanila);
	}
	function Contar_Registros_Planilla($laplanila){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Contar_Registros_Planilla($laplanila);
	}	
	function Mostrar_Registros($miinicio,$mifinal,$laplanila){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Mostrar_Registros($miinicio,$mifinal,$laplanila);
	}
	function Mostrar_Registros_Planilla($miinicio,$mifinal,$laplanila){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Mostrar_Registros_Planilla($miinicio,$mifinal,$laplanila);
	}	
	function Mostrar_Registros_Todos($laplanila){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Mostrar_Registros_Todos($laplanila);
	}		
	function Mostrar_Trabajadores_Descuento($miempresa,$mitipo){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Mostrar_Trabajadores_Descuento($miempresa,$mitipo);
	}	
	function Mostrar_Trabajadores_Descuento1($miempresa,$mitipo){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Mostrar_Trabajadores_Descuento1($miempresa,$mitipo);
	}	
	
	function Agregar_Trabajador($laplanila,$micodtrabajador,$midias){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Agregar_Trabajador($laplanila,$micodtrabajador,$midias);
	}
	function Contar_Clave($laclave,$miempresa){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Contar_Clave($laclave,$miempresa);
	}		
	function Buscar_Clave($laclave,$miempresa){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Buscar_Clave($laclave,$miempresa);
	}
	function Agregar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur,$lahora){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Agregar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur,$lahora);
	}	
	function Contar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Contar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur);
	}
	function Procesar_Asistencia($miempresa,$codtrabajador,$lafecha){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Procesar_Asistencia($miempresa,$codtrabajador,$lafecha);
	}
	function Contar_Asistencia_Descuento($miempresa,$codtrabajador,$lafecha){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Contar_Asistencia_Descuento($miempresa,$codtrabajador,$lafecha);
	}	
	function Agregar_Descuento($laplanilla,$codtrabajador,$numfalta,$totaltardanza){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Agregar_Descuento($laplanilla,$codtrabajador,$numfalta,$totaltardanza);
	}
	function getROW($vCodigo){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->getROW($vCodigo);
	}	
	function Modificar_Descuento($micodigo,$txtdias,$txtfaltas,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Modificar_Descuento($micodigo,$txtdias,$txtfaltas,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17);
	}	
	function Buscar_Descuento($laplanilla,$codtrabajador){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Buscar_Descuento($laplanilla,$codtrabajador);
	}						
	function SumarIngresos($laplanila,$codtrabajador){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->SumarIngresos($laplanila,$codtrabajador);
	}						
	function SumarIngresos1($laplanila,$codtrabajador){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->SumarIngresos1($laplanila,$codtrabajador);
	}						
	
	function SumarDescuentos($laplanila,$codtrabajador){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->SumarDescuentos($laplanila,$codtrabajador);
	}						
	function Buscar_Descuento1($laplanilla,$codtrabajador){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Buscar_Descuento1($laplanilla,$codtrabajador);
	}						
	function ActualizarQuinta($laplanilla,$codtrabajador,$valorquinta){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->ActualizarQuinta($laplanilla,$codtrabajador,$valorquinta);
	}						
	function ActualizarCafae($laplanilla,$codtrabajador,$totalcafae){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->ActualizarCafae($laplanilla,$codtrabajador,$totalcafae);
	}						
	function ActualizarIngreso1($laplanilla,$codtrabajador,$miingreso1){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->ActualizarIngreso1($laplanilla,$codtrabajador,$miingreso1);
	}						
	function Buscarhoramarcada($miempresa,$codtrabajador,$fecha,$miperiodo,$elmes,$tur){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Buscarhoramarcada($miempresa,$codtrabajador,$fecha,$miperiodo,$elmes,$tur);
	}
	function Modificar_Asistencia($elcodasiste,$lahora){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Modificar_Asistencia($elcodasiste,$lahora);
	}	
	function ActualizarAsistencia($micodasistencia,$lahora,$txtmotivo,$txtdetalle){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->ActualizarAsistencia($micodasistencia,$lahora,$txtmotivo,$txtdetalle);
	}						
	function Actualizarfalta($micodasiste){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Actualizarfalta($micodasiste);
	}						
	function BusscarControl($miperiodo,$elmes,$elcodigo){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->BusscarControl($miperiodo,$elmes,$elcodigo);
	}
	function Actualizarfalta2($micodasiste,$horatrabajo){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->Actualizarfalta2($micodasiste,$horatrabajo);
	}						
	function ActualizarDescuentoFaltas($laplanila,$codtrabajador,$desdia,$destardanza,$candia){
		$oDescuento=new Datos_clsDescuento();
		return $oDescuento->ActualizarDescuentoFaltas($laplanila,$codtrabajador,$desdia,$destardanza,$candia);
	}
	
}
?>