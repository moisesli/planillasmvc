<?php
class Datos_clsTipotrabajador{
	public $pCodigo;

	function Contar_Registros($miempresa) {
		$vConsulta="select count(*) as total from tipotrabajador where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}
	function Contar_Registros_Asistencia($elcodigo,$miperiodo) {
		$vConsulta="select count(*) as total from asistencia where codtrabajador='$elcodigo' and periodo='$miperiodo'";		
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Mostrar_Registros($miinicio,$mifinal,$miempresa){
		$vConsulta="select * from tipotrabajador where codempresa='$miempresa' LIMIT ".$miinicio.",".$mifinal;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}
	function Mostrar_Registros_Asistencia($inicial,$cantidad,$elcodigo,$miperiodo){
		$vConsulta="select * from asistencia where codtrabajador='$elcodigo' and periodo='$miperiodo' LIMIT ".$inicial.",".$cantidad;
		//echo $vConsulta;
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
	function getROW($vCodigo) {
		$vConsulta="select * from tipotrabajador where codigo=".intval($vCodigo);
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function Agregar($miempresa,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo){
		$oConexion= new Datos_clsConexion();
		$strSQL="insert tipotrabajador (codigo,codempresa,nombre,entradam,entradat,dias,inicial,trabajo) values('','$miempresa','$txttipo','$txtentradam','$txtentradat','$txtdias','$txtinicial','$txttrabajo')";
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Modificar($micodigo,$txttipo,$txtentradam,$txtentradat,$txtdias,$txtinicial,$txttrabajo){
		$oConexion= new Datos_clsConexion();
		$strSQL="update tipotrabajador set nombre='$txttipo', entradam='$txtentradam', entradat='$txtentradat', dias='$txtdias',inicial='$txtinicial',trabajo='$txttrabajo' where codigo=".intval($micodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
		return $rpta;
	}
	function Eliminar($vCodigo){
		$oConexion= new Datos_clsConexion();	
		$strSQL="delete from tipotrabajador where codigo=".intval($vCodigo);
		$rpta=$oConexion->Ejecutar_SQL($strSQL);
	}
	function Mostrar_Registros_Todos($miempresa){
		$vConsulta="select nombre from tipotrabajador where codempresa='$miempresa'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		return $rs;
	}	
// BUSCAR EL TIPO TRABAJADOR PARA LOS DIAS DE TRABAJO
	function Buscar_Tipo($miempresa,$laplanilla) {
		$vConsulta="select * from tipotrabajador where codempresa='$miempresa' and nombre='$laplanilla'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
	function buscartipo($tipotrabajador) {
		$vConsulta="select * from tipotrabajador where nombre='$tipotrabajador'";
		$oConexion= new Datos_clsConexion();
		$rs=$oConexion->Ejecutar_Consulta($vConsulta);
		if ($rs->num_rows>0)
			return $rs->fetch_array();
		else
			return false;
	}	
/////////////////////////////////////////////////////		
}
?>