<?php
class Datos_clsEmpleador{
	public $pCodigo;

	function Contar_Registros($miempresa,$miperiodo) {
		$vConsulta="select count(*) as total from empleador where codempresa='$miempresa' and periodo='$miperiodo'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}

	function Mostrar_Registros($miinicio,$mifinal,$miempresa,$miperiodo){
		$vConsulta="select * from empleador where codempresa='$miempresa' and periodo='$miperiodo' order by codigo LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}

	function getROW($vCodigo) {
		$vConsulta="select * from empleador where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$miperiodo,$mimes){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert empleador (codigo,codempresa,periodo,mes) values('','$miempresa','$miperiodo','$mimes')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $strSQL;		
	}
	function Modificar($elcodigo,$txtessalud,$txtonp,$txtesscas,$txtsolcas,$txtmaxcas,$txtsenati,$txtscrtsalud,$txtscrtpension){
		$oConexion= new Datos_clsConexion();
		$strSQL="update empleador set essalud='$txtessalud', onp='$txtonp', esscas='$txtesscas', solcas='$txtsolcas', maxcas='$txtmaxcas', senati='$txtsenati', scrtsalud='$txtscrtsalud', scrtpension='$txtscrtpension' where codigo=".intval($elcodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from empleador where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}
// MOSTRAR LOS MESES
	function Mostrar_Registros_Mes(){
		$vConsulta="select nombre from meses";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function Buscar_Aporte($miempresa,$miperiodo,$mimes) {
		$vConsulta="select * from empleador where codempresa='$miempresa' and periodo='$miperiodo' and mes='$mimes'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}						
}
?>