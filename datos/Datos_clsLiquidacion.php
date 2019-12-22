<?php
class Datos_clsLiquidacion{
	public $pCodigo;

	function Mostrar_Registros(){
		$vConsulta="select * from liquidacion";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function getROW($vCodigo) {
		$vConsulta="select * from liquidacion where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function AgregarLiquidacion($txtcodtra){
		$oConexion= new Datos_clsConexion();
		$mifecha=date('Y-m-d');
		$strSQL="insert liquidacion (codtrabajador,fecha) values('$txtcodtra','$mifecha')";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		$vCodigo=0;
		if($vRpta){
			$rs=$oConexion->Ejecutar_Consulta("select last_insert_id() as codigo");
			$row=$rs->fetch_array();
			$vCodigo=intval($row['codigo']);			
		}
		return $vCodigo;		
	}
	function AgregarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo){
		$oConexion= new Datos_clsConexion();
		$mifecha=date('Y-m-d');
		$strSQL="insert liquidatos (liquidacion,apellidos,dni,cargo,fechaini,fechafin,tiempo,faltas,motivo) values('$rscodliquidacion','$txtapellidos','$txtdni','$txtcargo','$txtfechaini','$txtfechafin','$txttiempo','$txtfalta','$txtmotivo')";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function AgregarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquicompu (liquidacion,sueldo,asignacion,comision,extras,otro,sexto,total,totalotro) values('$rscodliquidacion','$txtsueldo','$txtasignacion','$txtcomision','$txtextras','$txtotro','$txtsexto','$totalcompu','$totalcompuotro')";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function AgregarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquicts (liquidacion,meses,dias,montomes,montodia,total) values('$rscodliquidacion','$txtctsmes','$txtctsdia','$totalctsmes','$totalctsdia','$totalcts')";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	function AgregarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquivaca (liquidacion,tiempocom,diaspendiente,mesesefectivo,diasefectivos,montodiapen,montomespen,montodiaefec,total) values('$rscodliquidacion','$tiempocompu','$txtvacadiapen','$txtvacamesefec','$txtvacadiaefec','$txttotalvacadiapen','$txttotalmesefec','$txttotcavadiaefec','$totalvaca')";		
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function AgregarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquigrati (liquidacion,tiempo,mesefectivo,bonoley,montomes,montobono,total) values('$rscodliquidacion','$tiempograti','$txtgratimesefec','$txtgratibonopor','$totalgratimesefec','$totalgratibono','$totalgrati')";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	function AgregarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquiotro (liquidacion,vaca,quinta,remun,movil,total) values('$rscodliquidacion','$txtotro1','$txtotro2','$txtotro3','$txtotro4','$totalotros')";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function AgregarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquiessalud (liquidacion,essalud,montoessalud) values('$rscodliquidacion','$txtgratibonopor100','$totalesalud')";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function AgregarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert liquidcto (liquidacion,afp1,montoafp1,afp2,montoafp2,afp3,montoafp3,onp,montoonp,total	) values('$rscodliquidacion','$poraporte','$afp1','$porprima','$afp2','$aporteafpcomi','$afp3','$poronp','$totalonp','$totaldctoafp')";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	
	
	function Modificar($micodigo,$txtbanco){
		$oConexion= new Datos_clsConexion();
		$strSQL="update banco set nombre='$txtbanco' where codigo=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from banco where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}	
	
	function Buscar_Liquidatos($elcodliquidacion) {
		$vConsulta="select * from liquidatos where liquidacion=".intval($elcodliquidacion);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquicompu($elcodliquidacion) {
		$vConsulta="select * from liquicompu where liquidacion=".intval($elcodliquidacion);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquicts($elcodliquidacion) {
		$vConsulta="select * from liquicts where liquidacion=".intval($elcodliquidacion);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquivaca($elcodliquidacion) {
		$vConsulta="select * from liquivaca where liquidacion=".intval($elcodliquidacion);
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquigrati($elcodliquidacion) {
		$vConsulta="select * from liquigrati where liquidacion=".intval($elcodliquidacion);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquiotro($elcodliquidacion) {
		$vConsulta="select * from liquiotro where liquidacion=".intval($elcodliquidacion);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquiessalud($elcodliquidacion) {
		$vConsulta="select * from liquiessalud where liquidacion=".intval($elcodliquidacion);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Liquiafp($elcodliquidacion) {
		$vConsulta="select * from liquidcto where liquidacion=".intval($elcodliquidacion	);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
// modificar
	
	function ModificarLiquidaciodatosn($rscodliquidacion,$txtapellidos,$txtdni,$txtcargo,$txtfechaini,$txtfechafin,$txttiempo,$txtfalta,$txtmotivo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquidatos set fechaini='$txtfechaini',fechafin='$txtfechafin',tiempo='$txttiempo',faltas='$txtfalta',motivo='$txtmotivo' where liquidacion='$rscodliquidacion'";		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function ModificarLiquidacioncompua($rscodliquidacion,$txtsueldo,$txtasignacion,$txtcomision,$txtextras,$txtotro,$txtsexto,$totalcompu,$totalcompuotro){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquicompu set comision='$txtcomision',extras='$txtextras',otro='$txtotro',sexto='$txtsexto',total='$totalcompu',totalotro='$totalcompuotro' where liquidacion='$rscodliquidacion'";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function ModificarLiquidacioncts($rscodliquidacion,$txtctsmes,$txtctsdia,$totalctsmes,$totalctsdia,$totalcts){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquicts set meses='$txtctsmes',dias='$txtctsdia',montomes='$totalctsmes',montodia='$totalctsdia',total='$totalcts' where liquidacion='$rscodliquidacion'";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	function ModificarLiquidacionvaca($rscodliquidacion,$tiempocompu,$txtvacadiapen,$txtvacamesefec,$txtvacadiaefec,$txttotalvacadiapen,$txttotalmesefec,$txttotcavadiaefec,$totalvaca){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquivaca set tiempocom='$tiempocompu',diaspendiente='$txtvacadiapen',mesesefectivo='$txtvacamesefec',diasefectivos='$txtvacadiaefec',montodiapen='$txttotalvacadiapen',montomespen='$txttotalmesefec',montodiaefec='$txttotcavadiaefec',total='$totalvaca' where liquidacion='$rscodliquidacion'";		
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function ModificarLiquidaciongrati($rscodliquidacion,$txtgratimesefec,$txtgratibonopor,$tiempograti,$totalgratimesefec,$totalgratibono,$totalgrati){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquigrati set tiempo='$tiempograti',mesefectivo='$txtgratimesefec',bonoley='$txtgratibonopor',montomes='$totalgratimesefec',montobono='$totalgratibono',total='$totalgrati' where liquidacion='$rscodliquidacion'";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	function ModificarLiquidacionotros($rscodliquidacion,$txtotro1,$txtotro2,$txtotro3,$txtotro4,$totalotros){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquiotro set vaca='$txtotro1',quinta='$txtotro2',remun='$txtotro3',movil='$txtotro4',total='$totalotros' where liquidacion='$rscodliquidacion'";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	function ModificarLiquidacionessalud($rscodliquidacion,$txtgratibonopor100,$totalesalud){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquiessalud set essalud='$txtgratibonopor100',montoessalud='$totalesalud' where liquidacion='$rscodliquidacion'";
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}
	
	function ModificarLiquidacionafp($rscodliquidacion,$poraporte,$afp1,$porprima,$afp2,$aporteafpcomi,$afp3,$poronp,$totalonp,$totaldctoafp){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquidcto set afp1='$poraporte',montoafp1='$afp1',afp2='$porprima',montoafp2='$afp2',afp3='$aporteafpcomi',montoafp3='$afp3',onp='$poronp',montoonp='$totalonp',total='$totaldctoafp' where liquidacion='$rscodliquidacion'";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	
	function Modificarliquidacion($rscodliquidacion,$totalcts,$totalvaca,$totalgrati,$totalotros,$totalesalud,$totaldctoafp,$totalneto){
		$oConexion= new Datos_clsConexion();
		$strSQL="update liquidacion set cts='$totalcts',vacaciones='$totalvaca',grati='$totalgrati',otros='$totalotros',essalud='$totalesalud',afp='$totaldctoafp',neto='$totalneto' where codigo='$rscodliquidacion'";
		//echo $strSQL;
		$vRpta=$oConexion->Ejecutar_SQL($strSQL);
		return $vRpta;		
	}

	
	function Eliminarliquidacion($micodigo){
		$oConexion= new Datos_clsConexion();	
		
		$strSQL="delete from liquidatos where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquicompu where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);

		$strSQL="delete from liquicts where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquivaca where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquigrati where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquiotro where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquidcto where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquiessalud where liquidacion=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL="delete from liquidacion where codigo=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}
	
}
?>