<?php
class Datos_clsDescuento{
	public $pCodigo;

	function Contar_Registros($laplanila) {
		$vConsulta="select count(*) as total from descuento where codplanilla='$laplanila'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros_Planilla($laplanila) {
		$vConsulta="select count(*) as total from planilla where codplanilla='$laplanila'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Registros($miinicio,$mifinal,$laplanila){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres from descuento a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanila' and activo='S' order by apellidos,apellidos2,nombres LIMIT ".$miinicio.",".$mifinal;
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Planilla($miinicio,$mifinal,$laplanila){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanila' order by apellidos,apellidos2,nombres LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos($laplanila){
		$vConsulta="select * from descuento where codplanilla='$laplanila'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}		
	function Mostrar_Trabajadores_Descuento($miempresa,$mitipo){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and tipo='$mitipo' and activo='S' order by apellidos,nombres";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Trabajadores_Descuento1($miempresa,$mitipo){
		$vConsulta="select * from trabajador where codempresa='$miempresa' and tipo='$mitipo' and activo='S' and vacaciones='S' order by apellidos,nombres";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	
	function Agregar_Trabajador($laplanila,$micodtrabajador,$midias){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert descuento (codigo,codplanilla,codtrabajador,dias) values('','$laplanila','$micodtrabajador','$midias')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	function Contar_Clave($laclave,$miempresa) {
		$vConsulta="select count(*) as total from trabajador where codempresa='$miempresa' and clave='$laclave' and activo='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Clave($laclave,$miempresa) {
		$vConsulta="select * from trabajador where codempresa='$miempresa' and clave='$laclave' and activo='S'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur,$lahora){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert asistencia (codigo,codempresa,codtrabajador,fecha,periodo,mes,turno,hora) values('','$miempresa','$codtrabajador','$lafecha','$miperiodo','$elmes','$tur','$lahora')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	function Contar_Asistencia($miempresa,$codtrabajador,$lafecha,$miperiodo,$elmes,$tur) {
		$vConsulta="select count(*) as total from asistencia where codempresa='$miempresa' and codtrabajador='$codtrabajador' and fecha='$lafecha' and periodo='$miperiodo' and mes='$elmes' and turno='$tur'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Procesar_Asistencia($miempresa,$codtrabajador,$lafecha){
		$vConsulta="select * from asistencia where codempresa='$miempresa' and fecha='$lafecha' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Contar_Asistencia_Descuento($miempresa,$codtrabajador,$lafecha) {
		$vConsulta="select count(*) as total from asistencia where codempresa='$miempresa' and fecha='$lafecha' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Agregar_Descuento($laplanilla,$codtrabajador,$numfalta,$totaltardanza){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set falta='$numfalta', tardanza='$totaltardanza' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function getROW($vCodigo) {
		$vConsulta="select * from descuento where codigo=".intval($vCodigo);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Modificar_Descuento($micodigo,$txtdias,$txtfaltas,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set dias='$txtdias',falta='$txtfaltas', ingreso1='$txtingreso1', ingreso2='$txtingreso2', ingreso3='$txtingreso3', ingreso4='$txtingreso4', ingreso5='$txtingreso5', ingreso6='$txtingreso6', ingreso7='$txtingreso7', ingreso8='$txtingreso8', ingreso9='$txtingreso9', ingreso10='$txtingreso10', ingreso11='$txtingreso11', ingreso12='$txtingreso12', ingreso13='$txtingreso13', ingreso14='$txtingreso14', ingreso15='$txtingreso15', ingreso16='$txtingreso16', ingreso17='$txtingreso17', ingreso18='$txtingreso18', ingreso19='$txtingreso19', ingreso20='$txtingreso20', ingreso21='$txtingreso21', ingreso22='$txtingreso22', ingreso23='$txtingreso23', ingreso24='$txtingreso24', ies='$txties', essaludvida='$txtipssvida', quinta='$txtquinta', descuento1='$txtdescuento1', descuento2='$txtdescuento2', descuento3='$txtdescuento3', descuento4='$txtdescuento4', descuento5='$txtdescuento5', descuento6='$txtdescuento6', descuento7='$txtdescuento7', descuento8='$txtdescuento8', descuento9='$txtdescuento9', descuento10='$txtdescuento10', descuento11='$txtdescuento11', descuento12='$txtdescuento12', descuento13='$txtdescuento13', descuento14='$txtdescuento14', descuento15='$txtdescuento15', descuento16='$txtdescuento16', descuento17='$txtdescuento17' where codigo='$micodigo'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Buscar_Descuento($laplanilla,$codtrabajador) {
		$vConsulta="select * from descuento where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}														
	function SumarIngresos($laplanila,$codtrabajador) {
		$vConsulta="select sum(ingreso2) as mitotal from descuento where codplanilla='$laplanila' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}														
	function SumarIngresos1($laplanila,$codtrabajador) {
		$vConsulta="select sum(ingreso1+ingreso2+ingreso3+ingreso4+ingreso5+ingreso6+ingreso7+ingreso8+ingreso9+ingreso10+ingreso11+ingreso12+ingreso13+ingreso14+ingreso15+ingreso16+ingreso17+ingreso18+ingreso19+ingreso20+ingreso21+ingreso22+ingreso23+ingreso24) as mitotal from descuento where codplanilla='$laplanila' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}														
	
	function SumarDescuentos($laplanila,$codtrabajador) {
		$vConsulta="select sum(ies+essaludvida+quinta+descuento1+descuento2+descuento3+descuento4+descuento5+descuento6+descuento7+descuento8+descuento9+descuento10+descuento11+descuento12+descuento13+descuento14+descuento15+descuento16+descuento17) as mitotal from descuento where codplanilla='$laplanila' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}			
	function Buscar_Descuento1($laplanilla,$codtrabajador) {
		$vConsulta="select count(*) as mitotal from descuento where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}														
	function ActualizarQuinta($laplanilla,$codtrabajador,$valorquinta){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set quinta='$valorquinta' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		$strSQL="update planilla set quinta='$valorquinta' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function ActualizarCafae($laplanilla,$codtrabajador,$totalcafae){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set descuento2='$totalcafae' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		$strSQL="update planilla set descuento2='$totalcafae' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function ActualizarIngreso1($laplanilla,$codtrabajador,$miingreso1){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set ingreso1='$miingreso1' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		$strSQL="update planilla set ingreso1='$miingreso1' where codplanilla='$laplanilla' and codtrabajador='$codtrabajador'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Buscarhoramarcada($miempresa,$codtrabajador,$fecha,$miperiodo,$elmes,$tur){
		$vConsulta="select * from asistencia where codempresa='$miempresa' and codtrabajador='$codtrabajador' and fecha='$fecha' and periodo='$miperiodo' and mes='$elmes' and turno='$tur'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Modificar_Asistencia($elcodasiste,$lahora){
		$oConexion= new Datos_clsConexion();
		$strSQL="update asistencia set hora='$lahora' where codigo='$elcodasiste'";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	function ActualizarAsistencia($micodasistencia,$lahora,$txtmotivo,$txtdetalle){
		$oConexion= new Datos_clsConexion();
		if ($txtmotivo)
		{
			$falta=0;
			$justi=1;
		}
		else
		{
			$falta=0;
			$justi=0;
		}
		$strSQL="update asistencia set hora='$lahora',justifica='$txtmotivo',detalle='$txtdetalle',falta='$falta',justificacion='$justi' where codigo='$micodasistencia'";		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		return $rpta;
	}
	function Actualizarfalta($micodasiste){
		$oConexion= new Datos_clsConexion();
		$strSQL="update asistencia set falta='1',justificacion='0',justifica='',detalle='',hora='' where codigo='$micodasiste'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		return $rpta;
	}
	function BusscarControl($miperiodo,$elmes,$elcodigo){
		$vConsulta="select * from control where codtrabajador='$elcodigo' and periodo='$miperiodo' and mes='$elmes'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Actualizarfalta2($micodasiste,$horatrabajo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update asistencia set falta='1',justificacion='0',justifica='',detalle='',hora='',horatarde='$horatrabajo' where codigo='$micodasiste'";
		//echo $strSQL;
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		return $rpta;
	}
	function ActualizarDescuentoFaltas($laplanila,$codtrabajador,$desdia,$destardanza,$candia){
		$oConexion= new Datos_clsConexion();
		$strSQL="update descuento set descuento1='$desdia',descuento2='$destardanza',falta='$candia' where codplanilla='$laplanila' and codtrabajador='$codtrabajador'";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	
}
?>