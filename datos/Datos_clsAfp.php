<?php
class Datos_clsAfp{
	public $pCodigo;

	function Contar_Registros($miempresa) {
		$vConsulta="select count(*) as total from afp where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros_Aportes($micodigo,$miperiodo) {
		$vConsulta="select count(*) as total from afpaporte where codafp='$micodigo' and periodo='$miperiodo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$vConsulta="select * from afp where codempresa='$miempresa' LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Todos($miempresa){
		$vConsulta="select nombre from afp where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Mostrar_Registros_Aportes($miinicio,$mifinal,$micodigo,$miperiodo){
		$vConsulta="select * from afpaporte where codafp='$micodigo' and periodo='$miperiodo' order by codigo LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function getROW($vCodigo) {
		$vConsulta="select * from afp where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miafp,$miempresa){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert afp (codigo,nombre,codempresa) values('','$miafp','$miempresa')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);		
		$vCodigo=0;
		if($rpta){
			$rs=$oConexion->Ejecutar_Consulta("select last_insert_id() as codigo");
			$row=$rs->fetch_array();
			$vCodigo=intval($row['codigo']);										
		}
		return $vCodigo;		
	}
	function Modificar($codigo,$miafp){
		$oConexion= new Datos_clsConexion();
		$strSQL="update afp set nombre='$miafp' where codigo=".intval($codigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from afp where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		
		$strSQL1="delete from afpaporte where codafp=".intval($vCodigo);
		$rpta1=$oConexion->Ejecutar_SQL($strSQL1);
		
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$vConsulta="select nombre from meses";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Agregar_Aporte($micodigo,$miperiodo,$txtmes,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert afpaporte (codigo,codafp,periodo,mes,aporte,prima,comision,tope,flujo) values('','$micodigo','$miperiodo','$txtmes','$txtaporte','$txtprima','$txtcomision','$txttope','$txtflujo')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}	
	function getROW_Aporte($vCodigo) {
		$vConsulta="select * from afpaporte where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Modificar_Aporte($elcodigo,$txtaporte,$txtprima,$txtcomision,$txttope,$txtflujo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update afpaporte set aporte='$txtaporte', prima='$txtprima', comision='$txtcomision' ,tope='$txttope',flujo='$txtflujo' where codigo=".intval($elcodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Buscar_Afpcodigo($miempresa,$miafp) {
		$vConsulta="select * from afp where codempresa='$miempresa' and nombre='$miafp'";
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Buscar_Aporte($codafp,$miperiodo,$mimes) {
		$vConsulta="select * from afpaporte where codafp='$codafp' and periodo='$miperiodo' and mes='$mimes'";
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