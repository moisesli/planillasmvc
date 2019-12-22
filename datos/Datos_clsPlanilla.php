<?php
class Datos_clsPlanilla{
	public $pCodigo;

	function Agregar($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$codtrabajador,$diastrabajados,$elcargo,$elsueldo,$totalingreso1,$totalingreso2,$totalingreso3,$totalingreso4,$totalingreso5,$totalingreso6,$totalingreso7,$totalingreso8,$totalingreso9,$totalingreso10,$totalingreso11,$totalingreso12,$totalingreso13,$totalingreso14,$totalingreso15,$totalingreso16,$totalingreso17,$totalingreso18,$totalingreso19,$totalingreso20,$totalingreso21,$totalingreso22,$totalingreso23,$totalingreso24,$signatotal,$nombreafp,$afp1,$afp2,$afp3,$totalonp,$totalessalud,$totalsenati,$totalscrtsalud,$totalscrtpension,$totalies,$totalipssvida,$totalquinta,$totalfaltas,$totaldscto1,$totaldscto2,$totaldscto3,$totaldscto4,$totaldscto5,$totaldscto6,$totaldscto7,$totaldscto8,$totaldscto9,$totaldscto10,$totaldscto11,$totaldscto12,$totaldscto13,$totaldscto14,$totaldscto15,$totaldscto16,$totaldscto17,$totalcts){
		
		$oConexion= new Datos_clsConexion();
		$strSQL="insert planilla (codempresa,codplanilla,periodo,planilla,mes,tipo,numero,codtrabajador,cargo,dias,ingreso1,ingreso2,ingreso3,ingreso4,ingreso5,ingreso6,ingreso7,ingreso8,ingreso9,ingreso10,ingreso11,ingreso12,ingreso13,ingreso14,ingreso15,ingreso16,ingreso17,ingreso18,ingreso19,ingreso20,ingreso21,ingreso22,ingreso23,ingreso24,asignacion,nomafp,afp1,afp2,afp3,onp,essalud,senati,scrtsalud,scrtpension,ies,ipssvida,quinta,descuento1,descuento2,descuento3,descuento4,descuento5,descuento6,descuento7,descuento8,descuento9,descuento10,descuento11,descuento12,descuento13,descuento14,descuento15,descuento16,descuento17,cts)	values('$miempresa','$laplanilla','$elperiodoplanilla','$nomplanilla','$elmesplanilla','$eltipoplanilla','$elnumeroplanilla','$codtrabajador','$elcargo','$diastrabajados','$totalingreso1','$totalingreso2','$totalingreso3','$totalingreso4','$signatotal','$totalingreso6','$totalingreso7','$totalingreso8','$totalingreso9','$totalingreso10','$totalingreso11','$totalingreso12','$totalingreso13','$totalingreso14','$totalingreso15','$totalingreso16','$totalingreso17','$totalingreso18','$totalingreso19','$totalingreso20','$totalingreso21','$totalingreso22','$totalingreso23','$totalingreso24','$signatotal','$nombreafp','$afp1','$afp2','$afp3','$totalonp','$totalessalud','$totalsenati','$totalscrtsalud','$totalscrtpension','$totalies','$totalipssvida','$totalquinta','$totaldscto1','$totaldscto2','$totaldscto3','$totaldscto4','$totaldscto5','$totaldscto6','$totaldscto7','$totaldscto8','$totaldscto9','$totaldscto10','$totaldscto11','$totaldscto12','$totaldscto13','$totaldscto14','$totaldscto15','$totaldscto16','$totaldscto17','$totalcts')";
		
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		$strSQL1="update creacion set procesada='1' where codigo=".intval($laplanilla);
		$rpta=$oConexion->Ejecutar_SQL($strSQL1);		
		return $rpta;		
	}
	function Agregar_Judicial($miempresa,$laplanilla,$elperiodoplanilla,$nomplanilla,$elmesplanilla,$eltipoplanilla,$elnumeroplanilla,$apetrabajador,$elsueldo){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert planillajudicial (codigo,codempresa,codplanilla,periodo,planilla,mes,tipo,numero,apellidos,ingreso1) values('','$miempresa','$laplanilla','$elperiodoplanilla','$nomplanilla','$elmesplanilla','$eltipoplanilla','$elnumeroplanilla','$apetrabajador','$elsueldo')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		$strSQL1="update creacion set procesada='1' where codigo=".intval($laplanilla);
		$rpta=$oConexion->Ejecutar_SQL($strSQL1);		
		return $rpta;		
	}	
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from planilla where codplanilla=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function Buscar_Planilla($laplanila) {
		$vConsulta="select * from creacion where codigo=".intval($laplanila);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function Mostrar_Registros_Todos($laplanila){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanila' order by apellidos,apellidos2,nombres";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos_Trabajadores_Planilla($laplanila){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres,b.cupps,b.numdocu from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanila' and b.afp<>'' order by apellidos,apellidos2,nombres";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos1($laplanila){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres,b.coddocu,b.numdocu,b.cupps,b.tipo as tipopla,b.fini,b.ffin,b.banco,b.cuenta from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanila' order by apellidos,apellidos2,nombres";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos2($laplanilla,$codtrabajador){
		$vConsulta="select a.*,b.apellidos,b.apellidos2,b.nombres,b.coddocu,b.numdocu,b.cupps,b.tipo as tipopla,b.fini,b.ffin,b.banco,b.cuenta from planilla a INNER JOIN trabajador b ON a.codtrabajador=b.codigo where a.codplanilla='$laplanilla' and a.codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Todos_Trabajador($codtrabajador){
		$vConsulta="select * from planilla where codtrabajador='$codtrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Todos_Judiciales($laplanila){	
		$vConsulta="select * from planillajudicial where codplanilla='$laplanila' order by apellidos";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Eliminar_Judicial($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from planillajudicial where codplanilla=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}							
	function BuscarConcepto($miempresa,$miperiodo) {
		$vConsulta="select * from estructura where codempresa='$miempresa' and periodo='$miperiodo'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function AgregarConcepto($miempresa,$miperiodo,$txtingreso1,$txtingreso2,$txtingreso3,$txtingreso4,$txtingreso5,$txtingreso6,$txtingreso7,$txtingreso8,$txtingreso9,$txtingreso10,$txtingreso11,$txtingreso12,$txtingreso13,$txtingreso14,$txtingreso15,$txtingreso16,$txtingreso17,$txtingreso18,$txtingreso19,$txtingreso20,$txtingreso21,$txtingreso22,$txtingreso23,$txtingreso24,$txtafp1,$txtafp2,$txtafp3,$txtonp,$txties,$txtippsvida,$txtquinta,$txtdescuento1,$txtdescuento2,$txtdescuento3,$txtdescuento4,$txtdescuento5,$txtdescuento6,$txtdescuento7,$txtdescuento8,$txtdescuento9,$txtdescuento10,$txtdescuento11,$txtdescuento12,$txtdescuento13,$txtdescuento14,$txtdescuento15,$txtdescuento16,$txtdescuento17,$txtessalud,$txtsenati,$txtscrtsalud,$txtscrtpension,$txtcts){
		$oConexion= new Datos_clsConexion();
		$strSQL="update estructura set ingreso1='$txtingreso1',ingreso2='$txtingreso2',ingreso3='$txtingreso3',ingreso4='$txtingreso4',ingreso5='$txtingreso5',ingreso6='$txtingreso6',ingreso7='$txtingreso7',ingreso8='$txtingreso8',ingreso9='$txtingreso9',ingreso10='$txtingreso10',ingreso11='$txtingreso11',ingreso12='$txtingreso12',ingreso13='$txtingreso13',ingreso14='$txtingreso14',ingreso15='$txtingreso15',ingreso16='$txtingreso16',ingreso17='$txtingreso17',ingreso18='$txtingreso18',ingreso19='$txtingreso19',ingreso20='$txtingreso20',ingreso21='$txtingreso21',ingreso22='$txtingreso22',ingreso23='$txtingreso23',ingreso24='$txtingreso24',afp1='$txtafp1',afp2='$txtafp2',afp3='$txtafp3',onp='$txtonp',ies='$txties',ipssvida='$txtippsvida',quinta='$txtquinta',descuento1='$txtdescuento1',descuento2='$txtdescuento2',descuento3='$txtdescuento3',descuento4='$txtdescuento4',descuento5='$txtdescuento5',descuento6='$txtdescuento6',descuento7='$txtdescuento7',descuento8='$txtdescuento8',descuento9='$txtdescuento9',descuento10='$txtdescuento10',descuento11='$txtdescuento11',descuento12='$txtdescuento12',descuento13='$txtdescuento13',descuento14='$txtdescuento14',descuento15='$txtdescuento15',descuento16='$txtdescuento16',descuento17='$txtdescuento17',essalud='$txtessalud',senati='$txtsenati',scrtsalud='$txtscrtsalud',scrtpension='$txtscrtpension',cts='$txtcts' where codempresa='$miempresa' and periodo='$miperiodo'";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		return $rpta;		
	}	
	function BuscarCreacion($micodigo) {
		$vConsulta="select * from creacion where codigo=".intval($micodigo);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function Buscar_UltimaPlanilla() {
		$vConsulta="select * from creacion where procesada='1' order by codigo desc limit 1";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function Buscar_Planillas($elcodplanilla){
		$vConsulta="select sum(ingreso1+ingreso2+ingreso3+ingreso4+ingreso5+ingreso6+ingreso7+ingreso8+ingreso9+ingreso10+ingreso11+ingreso12+ingreso13+ingreso14+ingreso15+ingreso16+ingreso17+ingreso18+ingreso19+ingreso20+ingreso21+ingreso22+ingreso23+ingreso24) as totalingresos from planilla where codplanilla=".intval($elcodplanilla);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}		
	function Listarcontrol($elperiodo,$elmes){	
		$vConsulta="select sum(desdia) as totaldia,sum(deshor) as tothor,sum(desmin) as totmin from control where periodo='$elperiodo' and mes='$elmes'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	
}
?>