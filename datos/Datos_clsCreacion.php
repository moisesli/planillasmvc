<?php
class Datos_clsCreacion{
	public $pCodigo;

	function Contar_Registros($miempresa,$miperiodo) {
		$vConsulta="select count(*) as total from creacion where codempresa='$miempresa' and periodo='$miperiodo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros1($miempresa,$miperiodo) {
		$vConsulta="select count(*) as total from creacion where codempresa='$miempresa' and periodo='$miperiodo' and procesada='1'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Contar_Registros_Planilla($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero) {
		$vConsulta="select count(*) as total from creacion where codempresa='$miempresa' and periodo='$miperiodo' and planilla='$txtplanilla' and mes='$txtmes' and tipo='$txttipo' and numero='$txtnumero'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$vConsulta="select * from creacion where codempresa='$miempresa' and periodo='$miperiodo' order by codigo LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros1($miinicio,$mifinal,$miempresa,$miperiodo){
		$vConsulta="select * from creacion where codempresa='$miempresa' and periodo='$miperiodo' and procesada='1' order by codigo LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Todos($miempresa){
		$vConsulta="select nombre from creacion where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function getROW($vCodigo) {
		$vConsulta="select * from creacion where codigo=".intval($vCodigo);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$miperiodo,$txtplanilla,$txtmes,$txttipo,$txtnumero,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10
					
	,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17				
					
					){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert creacion (codigo,codempresa,periodo,planilla,mes,tipo,numero,ingreso1,ok1,ingreso2,ok2,ingreso3,ok3,ingreso4,ok4,ingreso5,ok5,ingreso6,ok6,afp1,afp2,afp3,onp,essalud,senati,scrtsalud,scrtpension,ies,ipssvida,quinta,descuento1,descuento2,descuento3,descuento4,descuento5,cts,descuento6,descuento7,fini,ffin,ingreso7,ok7,ingreso8,ok8,ingreso9,ok9,ingreso10,ok10
		,ingreso11,ok11,ingreso12,ok12,ingreso13,ok13,ingreso14,ok14,ingreso15,ok15,ingreso16,ok16,ingreso17,ok17,ingreso18,ok18,ingreso19,ok19,ingreso20,ok20,ingreso21,ok21,ingreso22,ok22,ingreso23,ok23,ingreso24,ok24
		
		,descuento8,descuento9,descuento10,descuento11,descuento12,descuento13,descuento14,descuento15,descuento16,descuento17
		) values('','$miempresa','$miperiodo','$txtplanilla','$txtmes','$txttipo','$txtnumero','$txtingreso1','$txtok1','$txtingreso2','$txtok2','$txtingreso3','$txtok3','$txtingreso4','$txtok4','$txtingreso5','$txtok5','$txtasigna','$txtok6','$txtafp1','$txtafp2','$txtafp3','$txtonp','$txtessalud','$txtsenati','$txtscrtsalud','$txtscrtpension','$txties','$txtipssvida','$txtquinta','$txtdescuento1','$txtdescuento2','$txtdescuento3','$txtdescuento4','$txtdescuento5','$txtcts','$txtdescuento6','$txtdescuento7','$txtfechaini','$txtfechafin','$txtingreso7','$txtok7','$txtingreso8','$txtok8','$txtingreso9','$txtok9','$txtingreso10','$txtok10'
		
		,'$txtingreso11','$txtok11','$txtingreso12','$txtok12','$txtingreso13','$txtok13','$txtingreso14','$txtok14','$txtingreso15','$txtok15','$txtingreso16','$txtok16','$txtingreso17','$txtok17','$txtingreso18','$txtok18','$txtingreso19','$txtok19','$txtingreso20','$txtok20','$txtingreso21','$txtok21','$txtingreso22','$txtok22','$txtingreso23','$txtok23','$txtingreso24','$txtok24'
		
		,'$txtdescuento8','$txtdescuento9','$txtdescuento10','$txtdescuento11','$txtdescuento12','$txtdescuento13','$txtdescuento14','$txtdescuento15','$txtdescuento16','$txtdescuento17'
		
		
		)";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}
	function Modificar($codigo,$txtingreso1,$txtok1,$txtingreso2,$txtok2,$txtingreso3,$txtok3,$txtingreso4,$txtok4,$txtingreso5,$txtok5,$txtasigna,$txtok6,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txties,$txtipssvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtcts,$txtdescuento6,$txtdescuento7,$txtfechaini,$txtfechafin,$txtingreso7,$txtok7,$txtingreso8,$txtok8,$txtingreso9,$txtok9,$txtingreso10,$txtok10,$txtingreso11,$txtok11,$txtingreso12,$txtok12,$txtingreso13,$txtok13,$txtingreso14,$txtok14,$txtingreso15,$txtok15,$txtingreso16,$txtok16,$txtingreso17,$txtok17,$txtingreso18,$txtok18,$txtingreso19,$txtok19,$txtingreso20,$txtok20,$txtingreso21,$txtok21,$txtingreso22,$txtok22,$txtingreso23,$txtok23,$txtingreso24,$txtok24,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17){
		$oConexion= new Datos_clsConexion();
		$strSQL="update creacion set ingreso1='$txtingreso1', ok1='$txtok1', ingreso2='$txtingreso2', ok2='$txtok2', ingreso3='$txtingreso3', ok3='$txtok3', ingreso4='$txtingreso4', ok4='$txtok4', ingreso5='$txtingreso5', ok5='$txtok5', ingreso6='$txtasigna', ok6='$txtok6', afp1='$txtafp1', afp2='$txtafp2', afp3='$txtafp3', onp='$txtonp', essalud='$txtessalud', senati='$txtsenati', scrtsalud='$txtscrtsalud', scrtpension='$txtscrtpension', ies='$txties', ipssvida='$txtipssvida', quinta='$txtquinta', descuento1='$txtdescuento1', descuento2='$txtdescuento2', descuento3='$txtdescuento3', descuento4='$txtdescuento4', descuento5='$txtdescuento5', cts='$txtcts', descuento6='$txtdescuento6', descuento7='$txtdescuento7', fini='$txtfechaini', ffin='$txtfechafin', ingreso7='$txtingreso7', ok7='$txtok7', ingreso8='$txtingreso8', ok8='$txtok8', ingreso9='$txtingreso9', ok9='$txtok9', ingreso10='$txtingreso10', ok10='$txtok10'
		
		,ingreso11='$txtingreso11',ok11='$txtok11',ingreso12='$txtingreso12',ok12='$txtok12',ingreso13='$txtingreso13',ok13='$txtok13',ingreso14='$txtingreso14',ok14='$txtok14',ingreso15='$txtingreso15',ok15='$txtok15',ingreso16='$txtingreso16',ok16='$txtok16',ingreso17='$txtingreso17',ok17='$txtok17',ingreso18='$txtingreso18',ok18='$txtok18',ingreso19='$txtingreso19',ok19='$txtok19',ingreso20='$txtingreso20',ok20='$txtok20',ingreso21='$txtingreso21',ok21='$txtok21',ingreso22='$txtingreso22',ok22='$txtok22',ingreso23='$txtingreso23',ok23='$txtok23',ingreso24='$txtingreso24',ok24='$txtok24'
		
		,descuento8='$txtdescuento8',descuento9='$txtdescuento9',descuento10='$txtdescuento10',descuento11='$txtdescuento11',descuento12='$txtdescuento12',descuento13='$txtdescuento13',descuento14='$txtdescuento14',descuento15='$txtdescuento15',descuento16='$txtdescuento16',descuento17='$txtdescuento17'
		
		where codigo=".intval($codigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from creacion where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		$strSQL="delete from planilla where codplanilla=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		$strSQL="delete from descuento where codplanilla=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);			
		
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$vConsulta="select nombre from meses";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Buscar_Mes($elmes){
		$vConsulta="select codigo from meses where nombre='$elmes'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Contar_Dia($eldia,$miempresa){
		$vConsulta="select count(*) as total from notrabajan where codempresa='$miempresa' and nombre='$eldia'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros1trabajador($micodusu) {
		$vConsulta="select count(*) as total from planilla where codtrabajador='$micodusu'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Registros1trabajador($miinicio,$mifinal,$micodusu){
		$vConsulta="select * from planilla where codtrabajador='$micodusu' order by codigo desc LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function BuscarPlanillacreada($elmes){
		$vConsulta="select * from creacion where codigo='$elmes'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	
}
?>